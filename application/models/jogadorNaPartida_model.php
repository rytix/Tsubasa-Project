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
class JogadorNaPartida_model extends Jogador_model {

    private $cartaoVermelho;
    private $nCartaoAzul;
    private $nFaltas;
    private $nGol;

    function __construct() {
        parent::__construct();
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
