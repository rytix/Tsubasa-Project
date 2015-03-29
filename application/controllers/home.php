<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AcessControl extends CI_Controller {

    public function index()
    {
        $this->load->model('Diretor_model');
        $usuario = unserialize($this->session->userdata('usuario'));
        var_dump($usuario);
        if($usuario instanceof Socio_model){
            echo "Olá Sócio";
        }else if($usuario instanceof Juiz_model){
            echo "Olá Juiz";
        }else if($usuario instanceof Diretor_model){
            echo "Olá Diretor";
        }else{
            echo "Olá, você não deveria estar aqui";
        }
    }

}
