<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Juiz extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Invoker_model');
    }

    public function index() {
        $data['title'] = 'Cadastro de Juiz';
        $this->load->view('cadastrojuiz');
    }

    public function cadastrojuiz() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido');
        $this->form_validation->set_message('is_unique', 'O campo %s deve ser único');
        $this->form_validation->set_message('matches', 'A senha e a confirmação da senha não conferem');
        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('username', 'Usuário', 'required|is_unique[usuario.login]');
        $this->form_validation->set_rules('password', 'Senha', 'required|matches[password-clone]');
        $this->form_validation->set_rules('password-clone', 'Repetir Senha', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->index();
        } else {
            $data = array(
                'nome' => $this->input->post('nome'),
                'login' => $this->input->post('username'),
                'senha' => $this->input->post('password'),
                'tipo' => Usuario_model::JUIZ
            );
            $this->Invoker_model->insert_juiz($data);
            $situacao_cadastro = array();
            $situacao_cadastro['sucesso'] = 'Usuário cadastrado com sucesso';
            $this->load->view('cadastrojuiz', $situacao_cadastro);
        }
    }

}

?>