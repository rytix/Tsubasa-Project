<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Campeonatojuiz extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Campeonato_model');
    }

    public function lista() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::JUIZ);
        
        $invoker = new invoker_model();
        $data['title'] = 'Gerenciamento de Campeonato';
        $data['campeonatos'] = $invoker->get_campeonatojuiz(2);
        $this->load->view('listacampeonatojuiz', $data);
    }

}

?>