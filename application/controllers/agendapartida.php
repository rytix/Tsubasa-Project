<?php

class agendapartida extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('partida');
    }
    
    public function view(){
        $data['title'] = 'Agendamento de Partida';
        $this->load->view('agendamentopartida');
    }
}
