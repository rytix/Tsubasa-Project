<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inscricao extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuario_model');
        $this->load->model('Jogador_model');
        $this->load->model('Invoker_model');
        $this->load->library('session');
    }

    public function index() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::SOCIO);

        $data['title'] = 'Inscrição do Campeonato';
        $usuario = unserialize($this->session->userdata('usuario'));
        $data['query'] = $this->Invoker_model->get_campeonatosCategoriasSocio($usuario->getId());
        if (empty($data['query'])) {
            $data['vazio'] = 'vazio';
        }
        $this->load->view('inscricaoview', $data);
    }

    public function cadastroSocioCampeonato() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::SOCIO);

        $this->load->helper('form');
        $this->load->library('form_validation');
        $now = new DateTime();
        $usuario = unserialize($this->session->userdata('usuario'));
        $idadeSocio = $now->diff(date_create($usuario->getDataNascimento()))->y;
        $jogador = new Jogador_model();

        if (!empty($_POST['selecionar'])) {
            foreach ($_POST['selecionar'] as $selecionar) {
                $pieces = explode(":", $selecionar);
                $categoria = $this->Invoker_model->get_categoria($pieces[1]);
                $faixaIdade = FALSE;

                if (isset($_POST['goleiro']) AND $idadeSocio >= $categoria->getIdadeMinG() AND $idadeSocio <= $categoria->getIdadeMaxG()) {
                    $jogador->setGoleiro(TRUE);
                    $faixaIdade = TRUE;
                } elseif ($idadeSocio >= $categoria->getIdadeMinJ() && $idadeSocio <= $categoria->getIdadeMaxJ()) {
                    $jogador->setGoleiro(FALSE);
                    $faixaIdade = TRUE;
                } else {
                    $faixaIdade = FALSE;
                }

                if ($faixaIdade) {
                    $jogador->setSocio($usuario);
                    $jogador->setCampeonatoCategoria($this->Invoker_model->get_campeonatossCategoria($pieces[0], $pieces[1]));
                    $data_insert = array(
                        'goleiro' => $jogador->getGoleiro(),
                        'socioID' => $usuario->getId(),
                        'campeonatoID' => $pieces[0],
                        'categoriaID' => $pieces[1]
                    );
                    $this->Invoker_model->insert_jogador($data_insert);
                    $data['sucesso'] = 'Usuário cadastrado com sucesso';
                } else {
                    $data['falha'] = 'Falha ao cadastrar, usuário não está dentro da faixa de idade requerida';
                }
            }
            $data['title'] = 'Inscrição do Campeonato';
            $data['query'] = $this->Invoker_model->get_campeonatosCategoriasSocio($usuario->getId());
            if (empty($data['query'])) {
                $data['vazio'] = 'vazio';
            }
            $this->load->view('inscricaoview', $data);
        } else {
            $this->index();
        }
    }

}

?>