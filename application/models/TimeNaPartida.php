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

    /**
     * 
     * @param String $nome
     * @param array<Jogador> $jogadores
     * @param boolean $wo
     */
    public function __construct($nome, $jogadores, $wo)
    {
        parent::__construct($nome, $jogadores);
        $this->setWo($wo);
    }

    public function getWo()
    {
        return $this->wo;
    }

    private function setWo($wo)
    {
        if (FALSE === is_string($wo))
        {
            $tipoEncontradoErro = gettype($wo);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($wo);
            }
            trigger_error('$wo precisa ser um boolean, encontrado:' . $wo, E_USER_ERROR);
        }
        $this->wo = $wo;
    }

}
