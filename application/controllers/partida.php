<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partida
 *
 * @author 4289714
 */
class Partida extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('partida_model');
    }

    public function view() {
        $data['title'] = 'Agendamento de Partida';
        $this->load->view('agendamentopartida');
    }

    public function cadastropartida() {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('campeonato', 'Campeonato', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('casa', 'Casa', 'required|matches[password-clone]');
        $this->form_validation->set_rules('visitante', 'Visitante', 'required');
        $this->form_validation->set_rules('datajogo', 'Data do Jogo', 'required');
        $this->form_validation->set_rules('horajogo', 'Hora do Jogo', 'required');
        $this->form_validation->set_rules('campo', 'Campo', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('cadastropartida');
        } else {
            $this->Juiz_model->insert_juiz();
            $situacao_cadastro = array();
            $situacao_cadastro['sucesso'] = 'Partida cadastrado com sucesso';
            $this->load->view('cadastrojuiz', $situacao_cadastro);
        }
    }

}
