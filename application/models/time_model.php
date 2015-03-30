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
