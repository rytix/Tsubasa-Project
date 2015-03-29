<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of JogadorNaPartida
 *
 * @author Paulo Eduardo Martins
 */
class JogadorNaSumula_model extends CI_Model {

    private $id;
    private $sumula;
    private $jogador;
    private $cartaoVermelho;
    private $nCartaoAzul;
    private $nFaltas;
    private $nGol;

    function __construct() {
        parent::__construct();
    }
    
    public function getId() {
        return $this->id;
    }

    public function getSumula() {
        return $this->sumula;
    }

    public function getJogador() {
        return $this->jogador;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setSumula(Sumula_model $sumula) {
        $this->sumula = $sumula;
    }

    public function setJogador(Jogador_model $jogador) {
        $this->jogador = $jogador;
    }
    
    /**
     * 
     * @return boolean
     */
    public function getCartaoVermelho() {
        return $this->cartaoVermelho;
    }
    /**
     * 
     * @return int
     */
    public function getNCartaoAzul() {
        return $this->nCartaoAzul;
    }
    /**
     * 
     * @return int
     */
    public function getNFaltas() {
        return $this->nFaltas;
    }
    /**
     * 
     * @return int
     */
    public function getNGol() {
        return $this->nGol;
    }
    /**
     * 
     * @param boolean $cartaoVermelho
     * @return JogadorNaPartida
     */
    public function setCartaoVermelho($cartaoVermelho) {
        if (FALSE === is_bool($cartaoVermelho)) {
            $tipoEncontradoErro = gettype($cartaoVermelho);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($cartaoVermelho);
            }
            trigger_error('$cartaoVermelho precisa ser um bool, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->cartaoVermelho = $cartaoVermelho;
    }
    /**
     * 
     * @param int $nCartaoAzul
     * @return JogadorNaPartida
     */
    public function setNCartaoAzul($nCartaoAzul) {
        if (FALSE === is_int($nCartaoAzul)) {
            $tipoEncontradoErro = gettype($nCartaoAzul);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($nCartaoAzul);
            }
            trigger_error('$nCartaoAzul precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->nCartaoAzul = $nCartaoAzul;
    }
    /**
     * 
     * @param int $nFaltas
     * @return JogadorNaPartida
     */
    public function setNFaltas($nFaltas) {
        if (FALSE === is_int($nFaltas)) {
            $tipoEncontradoErro = gettype($nFaltas);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($nFaltas);
            }
            trigger_error('$nFaltas precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->nFaltas = $nFaltas;
    }
    /**
     * 
     * @param int $nGol
     * @return JogadorNaPartida
     */
    public function setNGol($nGol) {
        if (FALSE === is_int($nGol)) {
            $tipoEncontradoErro = gettype($nGol);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($nGol);
            }
            trigger_error('$nGol precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->nGol = $nGol;
        return $this;
    }

}
