<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class sumula extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('campeonatoCategoria_model');
    }

    public function novo() {
        $data['title'] = 'Cadastro de Sumula';
        $data['action'] = "index.php/campeonato/cadastrocampeonato";     
        $usuario = serialize($this->session->userdata('usuario'));
        $campeonatos = array();
        $invoker = new invoker_model();
        $cc = $invoker->get_allCampeonatosCategoria();
        $partida = $invoker->get_partidacategoria(4,1);
        //$times = $invoker->get_timesPorCampCat(); colocar objeto de campeonatocategoria
        $categoria = $invoker ->get_categorias();
        //$data['times']= $times;
        $data['partidas'] = $partida;
        $data['campeonatocategoria'] = $cc;
        $data['categorias'] = $categoria;
        $this->load->view('cadastrasumula', $data);
    }
    
    

}
