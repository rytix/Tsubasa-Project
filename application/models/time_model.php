<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Time
 *
 * @author Paulo Eduardo Martins
 */
class Time_model extends CI_Model {

    private $id;
    private $nome;
    private $jogadores;
    private $campeonatoCategoria;
    

    function __construct() {
        parent::__construct();
        $this->jogadores = array();
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
     * @return array do tipo Jogador
     */
    public function getJogadores() {
        return $this->jogadores;
    }

    /**
     * 
     * @param String $nome
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
    }

    /**
     * 
     * @param array<Jogador> $jogadores
     */
    public function setJogadores($jogadores) {
        if (FALSE === is_string($jogadores)) {
            $tipoEncontradoErro = gettype($jogadores);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($jogadores);
            }
            trigger_error('$jogadores precisa ser um array, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        foreach ($jogadores as $value) {
            if (!$value instanceof Jogador) {
                $tipoEncontradoErro = gettype($value);
                if ($tipoEncontradoErro == 'object') {
                    $tipoEncontradoErro = get_class($value);
                }
                trigger_error('$jogadores precisa possuir somente Jogador, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
            }
        }
        
        $this->jogadores = $jogadores;
    }
    public function getId() {
        return $this->id;
    }

    public function getCampeonatoCategoria() {
        return $this->campeonatoCategoria;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setCampeonatoCategoria($campeonatoCategoria) {
        $this->campeonatoCategoria = $campeonatoCategoria;
    }


}
