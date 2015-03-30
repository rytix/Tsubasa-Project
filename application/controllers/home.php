<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    const CAMPEONATO = 'campeonatoID';
    const CATEGORIA = 'categoriaID';
    const TIME = 'timeID';
    const JOGADOR = 'jogadorID';
    const PARTIDA = 'partidaID';

    public function index() {
        $this->load->model('Diretor_model');
        $parameters = $this->getParameters();
        $selected = $this->getShowPosition($parameters);
        $dataObjects = $this->getData($selected, $parameters);
        $data['data'] = $dataObjects;
        $data['selected'] = $selected;
        $data['parameters'] = $parameters;
        $this->load->view('home_view.php',$data);
        $usuario = unserialize($this->session->userdata('usuario'));

        if ($usuario instanceof Socio_model) {
            //echo "Olá Sócio";
        } else if ($usuario instanceof Juiz_model) {
            //echo "Olá Juiz";
        } else if ($usuario instanceof Diretor_model) {
            //echo "Olá Diretor";
        } else {
            //echo "Olá, você não deveria estar aqui";
        }
    }

    private function getParameters() {
        $parameters = array();
        $campeonatoID = $this->input->get('campeonatoID', true);
        $categoriaID = $this->input->get('categoriaID', true);
        
        $timeID = $this->input->get('timeID', true);
        $jogadorID = $this->input->get('jogadorID', true);

        $partidaID = $this->input->get('partidaID', true);
        if ($campeonatoID) {
            array_push($parameters, $campeonatoID);
        } else {
            array_push($parameters, -1);
        }
        if ($categoriaID) {
            array_push($parameters, $categoriaID);
        } else {
            array_push($parameters, -1);
        }
        if ($timeID) {
            array_push($parameters, $timeID);
        } else {
            array_push($parameters, -1);
        }
        if ($jogadorID) {
            array_push($parameters, $jogadorID);
        } else {
            array_push($parameters, -1);
        }
        if ($partidaID) {
            array_push($parameters, $partidaID);
        } else {
            array_push($parameters, -1);
        }
        return $parameters;
    }

    private function getData($arrayPos, $array) {
        $invoker = new invoker_model();
        switch($arrayPos){
            case -1:
                return $invoker->get_campeonatos();
            case 0:
                $campeonatoCategorias = $invoker->get_campeonatoCategorias($array[0]); //Aqui vai ter os 2 botões
                $categorias = array();
                foreach ($campeonatoCategorias as $cc) {
                    array_push($categorias, $invoker->get_categoria($cc->getCategoriaID()));
                }
                return $categorias;
            case 1:
                $campcat = $invoker->get_campeonatocategoria($array[0], $array[1]);
                $times = $invoker->get_TimesPorCampCat($campcat);
                $partidas = $invoker->get_partidasPorCampCat($campcat);
                return array_merge($times,$partidas);
            case 2:
                return $invoker->get_jogadoresDeUmTime($invoker->get_time($array[2]));
            case 3:
                return $invoker->get_jogador($array[3]);
            case 4:
                return $invoker->get_partida($array[4]);
        }
    }

    private function getShowPosition($array) {
        if ($array[0] == -1) {
            return -1; // Não tenho campeonatos (mostrando todos camp)
        }
        if ($array[1] == -1) {
            return 0; // Tenho o camp mas não a cat (mostrando as cat)
        }
        if ($array[2] != -1) {
            if ($array[3] != -1) {
                return 3; //Tenho o camp,cat, escolhi ver o time e tenho o jogador
            } else {
                return 2; //Tenho o camp,cat, escolhi ver o time
            }
        }else if($array[4] != -1){
            return 4; // Camp,cat, partida
        }else{
            return 1; //Tenho o camp, cat  (mostra todos os times e partidas)
        }
    }

}
