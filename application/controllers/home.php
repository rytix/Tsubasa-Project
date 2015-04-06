<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    const CAMPEONATO = 'campeonatoID';
    const CATEGORIA = 'categoriaID';
    const TIME = 'timeID';
    const JOGADOR = 'jogadorID';
    const PARTIDA = 'partidaID';

    public function index()
    {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuarioExiste();

        $this->load->model('Diretor_model');
        $parameters = $this->getParameters();
        $selected = $this->getShowPosition($parameters);
        $dataObjects = $this->getData($selected, $parameters);
        $data['data'] = $dataObjects;
        $data['selected'] = $selected;
        $data['parameters'] = $parameters;
        $this->load->view('home_view.php', $data);
        $usuario = unserialize($this->session->userdata('usuario'));
    }

    private function getParameters()
    {
        $parameters = array();
        $campeonatoID = $this->input->get('campeonatoID', true);
        $categoriaID = $this->input->get('categoriaID', true);
        if ($campeonatoID)
        {
            array_push($parameters, $campeonatoID);
        } else
        {
            array_push($parameters, -1);
        }
        if ($categoriaID)
        {
            array_push($parameters, $categoriaID);
        } else
        {
            array_push($parameters, -1);
        }
        return $parameters;
    }

    private function getData($arrayPos, $array)
    {
        $invoker = new invoker_model();
        switch ($arrayPos) {
            case -1:
                return $invoker->get_campeonatos();
            case 0:
                $campeonatoCategorias = $invoker->get_campeonatoCategorias($array[0]); //Aqui vai ter os 2 botões
                $categorias = array();
                foreach ($campeonatoCategorias as $cc)
                {
                    array_push($categorias, $invoker->get_categoria($cc->getCategoriaID()));
                }
                return $categorias;
            case 1:
                $campcat = $invoker->get_campeonatocategoria($array[0], $array[1]);
                $times = $invoker->get_TimesPorCampCat($campcat);
                $partidas = $invoker->get_partidasPorCampCat($campcat);
                $data = array();
                $data['times'] = $times;
                $data['partidas'] = $partidas;
                $data['jogadores'] = array();
                foreach ($times as $time)
                {
                    $data['jogadores'] = array_merge($data['jogadores'], $invoker->get_jogadoresDeUmTime($time));
                }
                $data['destaques'] = $invoker->get_JogadoresDestaques();
                return $data;
        }
    }

    private function getShowPosition($array)
    {
        if ($array[0] == -1)
        {
            return -1; // Não tenho campeonatos (mostrando todos camp)
        }
        if ($array[1] == -1)
        {
            return 0; // Tenho o camp mas não a cat (mostrando as cat)
        }
        return 1; //Tenho o camp, cat  (mostra todos os times e partidas)
    }

}
