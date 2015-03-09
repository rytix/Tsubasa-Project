<?php

use Time;

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
class TimeNaPartida extends Time {

    private $wo;

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

}
