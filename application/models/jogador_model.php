<?php

//use Socio_model;
//use Time_model;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Jogador
 *
 * @author Paulo Eduardo Martins
 */
class Jogador_model extends CI_Model {

    private $id;
    private $goleiro;
    private $time;
    private $socio;
    private $campeonatoCategoria;

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @param boolean $goleiro
     * @return Jogador
     */
    public function setGoleiro($goleiro) {
        if (FALSE === is_bool($goleiro))
        {
            $tipoEncontradoErro = gettype($goleiro);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($goleiro);
            }
            trigger_error('$goleiro precisa ser um bool, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->goleiro = $goleiro;
        return $this;
    }
    
    /**
     * 
     * @return boolean
     */
    public function getGoleiro() {
        return $this->goleiro;
    }
    
    public function getCampeonatoCategoria() {
        return $this->campeonatoCategoria;
    }

    public function setCampeonatoCategoria($campeonatoCategoria) {
        $this->campeonatoCategoria = $campeonatoCategoria;
    }

        
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

        
    public function getTime() {
        return $this->time;
    }

    public function getSocio() {
        return $this->socio;
    }

    public function setTime(Time_model $time) {
        $this->time = $time;
    }

    public function setSocio(Socio_model $socio) {
        $this->socio = $socio;
    }
}
