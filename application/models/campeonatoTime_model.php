<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campeonatoTime
 *
 * @author 4289714
 */
class CampeonatoTime_model extends CI_Model {

    private $time;
    private $Campeonato;

    public function __construct() {
        parent::__construct();
    }
    /**
     * 
     * @return Time
     */
    public function getTime() {
        return $this->time;
    }
    /**
     * 
     * @return Campeonato
     */
    public function getCampeonato() {
        return $this->Campeonato;
    }
    /**
     * 
     * @param Time $time
     * @return CampeonatoTime
     */
    public function setTime(Time $time) {
        if ($time instanceof Time) {
            $tipoEncontradoErro = gettype($time);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($time);
            }
            trigger_error('$time precisa ser uma instancia de Time, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        
        $this->time = $time;
        return $this;
    }
    /**
     * 
     * @param Campeonato $campeonato
     * @return CampeonatoTime
     */
    public function setCampeonato(Campeonato $campeonato) {
        if ($campeonato instanceof Campeonato) {
            $tipoEncontradoErro = gettype($campeonato);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($campeonato);
            }
            trigger_error('$campeonato precisa ser uma instancia de Campeonato, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        
        $this->Campeonato = $campeonato;
        return $this;
    }

}
