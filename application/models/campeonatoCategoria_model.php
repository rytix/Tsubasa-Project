<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campeonatoCategoria
 *
 * @author 4289714
 */
class CampeonatoCategoria_model extends CI_Model {

    private $id;
    private $campeonato;
    private $categoria;

    public function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @return Categoria
     */
    public function getCategoria() {
        return $this->categoria;
    }
    /**
     * 
     * @return Campeonato
     */
    public function getCampeonato() {
        return $this->campeonato;
    }
    /**
     * 
     * @param Categoria $categoria
     * @return CampeonatoCategoria
     */
    public function setCategoria($categoria) {
        if ($categoria instanceof Categoria) {
            $tipoEncontradoErro = gettype($categoria);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($categoria);
            }
            trigger_error('$categoria precisa ser uma instancia de Categoria, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        
        $this->categoria = $categoria;
        return $this;
    }
    /**
     * 
     * @param Campeonato $campeonato
     * @return CampeonatoCategoria
     */
    public function setCampeonato($campeonato) {
        if ($campeonato instanceof Campeonato) {
            $tipoEncontradoErro = gettype($campeonato);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($campeonato);
            }
            trigger_error('$campeonato precisa ser uma instancia de Campeonato, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        
        $this->campeonato = $campeonato;
        return $this;
    }

}
