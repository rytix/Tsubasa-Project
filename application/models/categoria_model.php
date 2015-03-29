<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria
 *
 * @author 4276663
 */
class Categoria_model extends CI_Model{
    const MASCULINO = 'MASCULINO';
    const FEMININO = 'FEMININO';
    const UNISEX = 'UNISEX';
    const IDADEILIMITADA = 999;
    
    private $nome;
    private $idadeMinJ;
    private $idadeMaxJ;
    private $idadeMaxG;
    private $idadeMinG;
    private $sexo;
    
    function __construct() {
        parent::__construct();
    }
    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexoPermitido) {
        $this->sexo = $sexoPermitido;
    }
    /**
     * 
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }
    /**
     * 
     * @param String $nome
     * @return Categoria
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
    public function getIdadeMinJ() {
        return $this->idadeMinJ;
    }

    public function getIdadeMaxJ() {
        return $this->idadeMaxJ;
    }

    public function getIdadeMaxG() {
        return $this->idadeMaxG;
    }

    public function getIdadeMinG() {
        return $this->idadeMinG;
    }

    public function setIdadeMinJ($idadeMinJ) {
        $this->idadeMinJ = $idadeMinJ;
    }

    public function setIdadeMaxJ($idadeMaxJ) {
        $this->idadeMaxJ = $idadeMaxJ;
    }

    public function setIdadeMaxG($idadeMaxG) {
        $this->idadeMaxG = $idadeMaxG;
    }

    public function setIdadeMinG($idadeMinG) {
        $this->idadeMinG = $idadeMinG;
    }





}
