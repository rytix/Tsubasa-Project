<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Campeonato extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Campeonato_model');
    }
    
    public function lista() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::DIRETOR);
        
        $invoker = new invoker_model();
        $data['title'] = 'Listagem de Campeonato';
        $data['campeonatos'] = $invoker->get_allCampeonatosCategoria();
        $this->load->view('listacampeonato', $data);
    }

    public function geratime() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::DIRETOR);
        
        $this->load->model('time_model');
        $invoker = new invoker_model();
        $data['title'] = 'Listagem de Campeonato';
        $data['campeonatos'] = $invoker->get_allCampeonatosCategoria();
        $jogadores = $invoker->get_jogadores_semtime($this->input->get('campeonato'), $this->input->get('categoria'));
        $goleiros = $invoker->get_goleiros_semtime($this->input->get('campeonato'), $this->input->get('categoria'));

        $qtdTime = 0;
        if ((count($jogadores) + 1) / 12 > 11) {
            $qtdTime = 12;
        } elseif ((count($jogadores) + 1) / 8 > 11) {
            $qtdTime = 8;
        } elseif ((count($jogadores) + 1) / 4 > 11) {
            $qtdTime = 4;
        }
        $i = 1;
        $controle = 0;
        $cc = null;
        while ($i <= $qtdTime) {
            $cc = $jogadores[0]->getCampeonatoCategoria();
            $time = new Time_model();
            $time->setNome('Time ' . $i);
            $time->setCampeonatoCategoria($cc);
            $timeID = $invoker->insert_campeonato(array(
                'nome' => $time->getNome(),
                'campeonatoID' => $time->getCampeonatoCategoria()->getCampeonato()->getId(),
                'categoriaID' => $time->getCampeonatoCategoria()->getCategoria()->getId(),
            ));
            $goleiros[$i - 1]->setTime($invoker->get_time($timeID));
            $invoker->update_jogador($goleiros[$i - 1]->getId(), array('timeID' => $timeID));
            for ($j = $controle; $j < 11 + $controle; $j++) {
                $jogadores[$j]->setTime($invoker->get_time($timeID));
                $invoker->update_jogador($jogadores[$j]->getId(), array('timeID' => $timeID));
            }
            $i++;
            $controle+=10;
        }
        if (!is_null($cc)) {
            $invoker->update_campeonato($cc->getCampeonato()->getId(), array('ativo' => 1));
        }

        $this->load->view('listacampeonato', $data);
    }

    public function novo($id = null) {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::DIRETOR);
        
        $invoker = new invoker_model();
        $data['action'] = "index.php/campeonato/cadastrocampeonato";
        $data['title'] = 'Cadastro de Campeonato';
        $data['juizes'] = $invoker->get_juizes();
        $data['categorias'] = $invoker->get_categorias();

        $this->load->view('cadastrocampeonato', $data);
    }

    public function excluir() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::DIRETOR);
        
        $invoker = new invoker_model();
        $invoker->delete_campeonato($this->input->get('campeonato'), $this->input->get('categoria'));
        $data['title'] = 'Listagem de Campeonato';
        $data['campeonatos'] = $invoker->get_allCampeonatosCategoria();
        $this->load->view('listacampeonato', $data);
    }

    public function cadastrocampeonato() {
        $verificadorUsuario = new Verificador_usuarios_model();
        $verificadorUsuario->verificarUsuario(Usuario_model::DIRETOR);
        
        $this->load->model('invoker_model');
        $invoker = new invoker_model();
        $data['title'] = 'Cadastro de Campeonato';
        $data['action'] = "index.php/campeonato/cadastrocampeonato";

        $this->form_validation->set_rules('nome', 'Nome', 'required');
        $this->form_validation->set_rules('categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('juiz', 'Juiz', 'required');
        $this->form_validation->set_rules('data', 'Data do Campeonato', 'required');

        $data['juizes'] = $invoker->get_juizes();
        $data['categorias'] = $invoker->get_categorias();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('cadastrocampeonato', $data);
        } else {
            $post = array(
                'nome' => $this->input->post('nome'),
                'categorias' => $this->input->post('categoria'),
                'juiz' => $this->input->post('juiz'),
                'data' => $this->input->post('data'),
            );
            $invoker->insert_campeonato($post);
            $data = array();
            $data['title'] = 'Listagem de Campeonato';
            $data['campeonatos'] = $invoker->get_allCampeonatosCategoria();
            $data['sucesso'] = 'Campeonato cadastrado com sucesso';
            $this->load->view('listacampeonato', $data);
        }
    }

}

?>