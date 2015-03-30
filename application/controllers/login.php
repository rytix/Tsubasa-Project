<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('usuario', 'Usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run() !== false)
        {
            $this->load->model('invoker_model');
            $invoker = new invoker_model();
            //Verificar login e criar sessão
            $usuario = $this->input->post('usuario', true);
            $senha = $this->input->post('senha', true);
            $Usuario = $invoker->get_user($usuario, $senha);
            if ($Usuario != null)
            {
                $this->session->set_userdata('usuario',  serialize($Usuario));
                redirect('index.php/home', 'refresh');
            } else
            {
                $data = array();
                $data['falha'] = 'Usuário ou senha incorretos';
                $this->load->view('login_view.php', $data);
            }
        } else
        {
            $this->load->view('login_view.php');
        }
    }

}
