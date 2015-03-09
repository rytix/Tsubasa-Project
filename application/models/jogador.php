<?php

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
class Jogador extends Socio {

    private $goleiro;

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



}
