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
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::JUIZ);

        $data['title'] = 'Cadastro de Sumula';
        $data['action'] = "index.php/campeonato/cadastrocampeonato";
        $usuario = serialize($this->session->userdata('usuario'));
        $campeonatos = array();
        $invoker = new invoker_model();
        $cc = $invoker->get_allCampeonatosCategoria();
        $partida = $invoker->get_partidacategoria(4, 1);
        //$times = $invoker->get_timesPorCampCat(); colocar objeto de campeonatocategoria
        $categoria = $invoker->get_categorias();
        //$data['times']= $times;
        $data['partidas'] = $partida;
        $data['campeonatocategoria'] = $cc;
        $data['categorias'] = $categoria;
        $this->load->view('cadastrasumula', $data);
    }

    public function cadastraSumula() {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<p class="text-danger">', '</p>');
        $this->form_validation->set_message('required', 'O campo %s deve ser preenchido');
        $this->form_validation->set_rules('campeonato', 'Campeonato', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('partida', 'Partida', 'required');
        $this->form_validation->set_rules('times', 'Times', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->novo();
        } else {
            $data_s['observacoes'] = $this->input->post('observacao');
            $invoker->insert_sumula($data_s);

            $data = array(
            );
        }
    }

    public function ajaxCampeonato($campeonatoId) {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::JUIZ);

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
