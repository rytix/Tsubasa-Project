<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TimeNaPartida
 *
 * @author Paulo Eduardo Martins
 */
class TimeNaSumula_model extends CI_Model {

    private $wo;
    private $time;
    private $sumula;

    function __construct() {
        parent::__construct();
    }
    
    /**
     * 
     * @return boolean
     */
    public function getWo() {
        return $this->wo;
    }
    /**
     * 
     * @param boolean $wo
     */
    public function setWo($wo) {
        if (FALSE === is_string($wo)) {
            $tipoEncontradoErro = gettype($wo);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($wo);
            }
            trigger_error('$wo precisa ser um boolean, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->wo = $wo;
        return $this;
    }

    public function getTime() {
        return $this->time;
    }

    public function getSumula() {
        return $this->sumula;
    }

    public function setTime(Time_model $time) {
        $this->time = $time;
    }

    public function setSumula(Sumula_model $sumula) {
        $this->sumula = $sumula;
    }



}
