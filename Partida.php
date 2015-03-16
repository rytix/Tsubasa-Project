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
        $this->load->model('partida');
    }
    
    public function view(){
        $data['title']= 'Agendamento de Partida';
        $this->load->view('agendamentopartida');
                
    }

}
