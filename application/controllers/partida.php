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
        $this->load->model('invoker_model');

    }
    
    public function agendamentopartida() {
        
        $data['title'] = 'Agendamento de Partida';
        $data['action'] = "index.php/partida/agendamentopartida";
        $campeonatos = array();
        $invoker = new invoker_model();
        $cc = $invoker->get_allCampeonatosCategoria();
        $usuario = unserialize($this->session->userdata('usuario'));
        $data['cc']=$cc;
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido');
        $this->form_validation->set_message('is_unique', 'O campo %s deve ser único');
        $this->form_validation->set_message('matches', 'A senha e a confirmação da senha não conferem');
        $this->form_validation->set_rules('campeonato', 'Campeonato', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('casa', 'Casa', 'required');
        $this->form_validation->set_rules('visitante', 'Visitante', 'required');
        $this->form_validation->set_rules('datajogo', 'Data do Jogo', 'required');
        $this->form_validation->set_rules('horajogo', 'Hora do Jogo', 'required');
        $this->form_validation->set_rules('campo', 'Campo', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('agendamentopartida',$data);
        } else {
            $this->partida_model->insert_partida();
            $situacao_cadastro = array();
            $situacao_cadastro['sucesso'] = 'Partida cadastrado com sucesso';
            $this->load->view('agendamentopartida', $situacao_cadastro);
        }
    }
    
    public function ajaxPartida($campeonatoId){
        $invoker = new invoker_model();
        $ccs = $invoker->get_campeonatoCategorias($campeonatoId);
        $categoriasJson = array();
        foreach ($ccs as $cc) {
            $categoriasJson[$cc->getCategoria()->getId()] = $cc->getCategoria()->getNome();
        }
        
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($categoriasJson));
    }
    


}
