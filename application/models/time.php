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
class Time extends CI_Model {

    private $nome;
    private $Jogadores;

    function __construct() {
        parent::__construct();
        $this->Jogadores = array();
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
        return $this->Jogadores;
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
        
        $this->Jogadores = $jogadores;
    }

}
