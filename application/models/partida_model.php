<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partida
 *
 * @author 4276663
 */
class Partida_model extends CI_Model {

    private $campo;
    private $data;
    private $nome;
    private $partidaAtiva;

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    /**
     * 
     * @return String
     */
    public function getCampo() {
        return $this->campo;
    }

    /**
     * 
     * @return \DateTime
     */
    public function getData() {
        return $this->data;
    }

    /**
     * 
     * @return String
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * 
     * @return boolean
     */
    public function getPartidaAtiva() {
        return $this->partidaAtiva;
    }

    /**
     * 
     * @param String $campo
     * @return Partida
     */
    public function setCampo($campo) {
        if (FALSE === is_string($campo)) {
            $tipoEncontradoErro = gettype($campo);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($campo);
            }
            trigger_error('$campo precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->campo = $campo;
        return $this;
    }

    /**
     * 
     * @param \DateTime $data
     * @return Partida
     */
    public function setData(\DateTime $data) {
        if ($data instanceof \DateTime) {
            $tipoEncontradoErro = gettype($data);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($data);
            }
            trigger_error('$data precisa ser um \DateTime, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->data = $data;
        return $this;
    }

    /**
     * 
     * @param String $nome
     * @return Partida
     */
    public function setNome($nome) {
        if (FALSE === is_string($nome)) {
            $tipoEncontradoErro = gettype($nome);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($nome);
            }
            trigger_error('$nome precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->nome = $nome;
        return $this;
    }

    /**
     * 
     * @param boolean $partidaAtiva
     * @return Partida
     */
    public function setPartidaAtiva($partidaAtiva) {
        if (FALSE === is_bool($partidaAtiva)) {
            $tipoEncontradoErro = gettype($partidaAtiva);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($partidaAtiva);
            }
            trigger_error('$partidaAtiva precisa ser um boolean, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->partidaAtiva = $partidaAtiva;
        return $this;
    }

    public function insert_agendamento() {
        $data = array(
            'campeonato' => $this->input->post('campeonato'),
            'categoria' => $this->input->post('categoria'),
            'casa' => $this->input->post('casa'),
            'visitante' => $this->input->post('visitante'),
            'data' => $this->input->post('data'),
            'horajogo' => $this->input->post('horajogo'),
            'campo' => $this->input->post('campo'))
        ;
    }
    
    

}
