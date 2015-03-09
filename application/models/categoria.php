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
class Categoria extends CI_Model{
    private $nome;
    private $faixaDeIdade;
    
    function __construct() {
        parent::__construct();
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
     * @return FaixaDeIdade
     */
    public function getFaixaDeIdade() {
        return $this->faixaDeIdade;
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
    /**
     * 
     * @param FaixaDeIdade $faixaDeIdade
     * @return Categoria
     */
    public function setFaixaDeIdade(FaixaDeIdade $faixaDeIdade) {
        if ($faixaDeIdade instanceof FaixaDeIdade) {
            $tipoEncontradoErro = gettype($faixaDeIdade);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($faixaDeIdade);
            }
            trigger_error('$faixaDeIdade precisa ser uma FaixaDeIdade, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->faixaDeIdade = $faixaDeIdade;
        return $this;
    }



}
