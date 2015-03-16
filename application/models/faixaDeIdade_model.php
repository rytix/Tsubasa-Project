<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of faixaDeIdade
 *
 * @author 4276663
 */
class FaixaDeIdade_model {

    private $idadeMaximaGoleiro;
    private $idadeMaximaJogador;
    private $idadeMinimaGoleiro;
    private $idadeMinimaJogador;

    function __construct() {
        parent::__construct();
    }

    /**
     * 
     * @return int
     */
    public function getIdadeMaximaGoleiro() {
        return $this->idadeMaximaGoleiro;
    }

    /**
     * 
     * @return int
     */
    public function getIdadeMaximaJogador() {
        return $this->idadeMaximaJogador;
    }

    /**
     * 
     * @return int
     */
    public function getIdadeMinimaGoleiro() {
        return $this->idadeMinimaGoleiro;
    }

    /**
     * 
     * @return int
     */
    public function getIdadeMinimaJogador() {
        return $this->idadeMinimaJogador;
    }

    /**
     * 
     * @param int $idadeMaximaGoleiro
     * @return FaixaDeIdade
     */
    public function setIdadeMaximaGoleiro($idadeMaximaGoleiro) {
        if (FALSE === is_int($idadeMaximaGoleiro)) {
            $tipoEncontradoErro = gettype($idadeMaximaGoleiro);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($idadeMaximaGoleiro);
            }
            trigger_error('$idadeMaximaGoleiro precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->idadeMaximaGoleiro = $idadeMaximaGoleiro;
        return $this;
    }

    /**
     * 
     * @param int $idadeMaximaJogador
     * @return FaixaDeIdade
     */
    public function setIdadeMaximaJogador($idadeMaximaJogador) {
        if (FALSE === is_int($idadeMaximaJogador)) {
            $tipoEncontradoErro = gettype($idadeMaximaJogador);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($idadeMaximaJogador);
            }
            trigger_error('$idadeMaximaJogador precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->idadeMaximaJogador = $idadeMaximaJogador;
        return $this;
    }

    /**
     * 
     * @param int $idadeMinimaGoleiro
     * @return FaixaDeIdade
     */
    public function setIdadeMinimaGoleiro($idadeMinimaGoleiro) {
        if (FALSE === is_int($idadeMinimaGoleiro)) {
            $tipoEncontradoErro = gettype($idadeMinimaGoleiro);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($idadeMinimaGoleiro);
            }
            trigger_error('$idadeMinimaGoleiro precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->idadeMinimaGoleiro = $idadeMinimaGoleiro;
        return $this;
    }

    /**
     * 
     * @param int $idadeMinimaJogador
     * @return FaixaDeIdade
     */
    public function setIdadeMinimaJogador($idadeMinimaJogador) {
        if (FALSE === is_int($idadeMinimaJogador)) {
            $tipoEncontradoErro = gettype($idadeMinimaJogador);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($idadeMinimaJogador);
            }
            trigger_error('$idadeMinimaJogador precisa ser um int, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->idadeMinimaJogador = $idadeMinimaJogador;
        return $this;
    }

}
