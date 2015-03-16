<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class login extends CI_Controller {

    public function index()
    {
        $this->load->view('login_view.php');
    }

    public function autenticar()
    {
        $this->form_validation->set_rules('usuario', 'Usuário', 'required');
        $this->form_validation->set_rules('senha', 'Senha', 'required');
        if ($this->form_validation->run() !== false)
        {
            //Verificar login e criar sessão
            $usuario = $this->input->post('usuario',true);
            $senha = $this->input->post('senha',true);
            $this->load->model('usuario_model');
            $Usuario = Usuario_model::get_user($usuario, $senha);
            redirect('index.php/login', 'refresh');
        } else
        {
            $this->load->view('login_view.php');
            redirect('index.php/login', 'refresh');
        }
    }

}
