<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller {

    public function index()
    {
        $this->load->model('Diretor_model');
        $campeonatoID = $this->input->get('campeonatoID', true);
        $categoriaID = $this->input->get('categoriaID', true);
        
        $timeID = $this->input->get('timeID',true);
        $jogadorID = $this->input->get('jogadorID',true);
        
        $partidaID = $this->input->get('partidaID',true);
        
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
