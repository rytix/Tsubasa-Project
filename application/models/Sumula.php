<?php

use Partida;
use TimeNaPartida;
use JogadorNaPartida;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sumula
 *
 * @author Paulo Eduardo Martins
 */
class Sumula {

    private $observacoes;
    private $partida;
    private $timeNaPartidaA;
    private $timeNaPartidaB;
    private $jogadoresNaPartida;

    /**
     * 
     * @param String $observacoes
     * @param Partida $partida
     * @param TimeNaPartida $timeNaPartidaA
     * @param TimeNaPartida $timeNaPartidaB
     * @param Array<JogadorNaPartida> $jogadoresNaPartida
     */
    function __construct(
    $observacoes, Partida $partida, TimeNaPartida $timeNaPartidaA, TimeNaPartida $timeNaPartidaB, $jogadoresNaPartida)
    {
        $this->setObservacoes($observacoes);
        $this->partida = $partida;
        $this->timeNaPartidaA = $timeNaPartidaA;
        $this->timeNaPartidaB = $timeNaPartidaB;
        $this->setJogadoresNaPartida($jogadoresNaPartida);
    }

    /**
     * 
     * @return String
     */
    function getObservacoes()
    {
        return $this->observacoes;
    }

    /**
     * 
     * @return Partida
     */
    function getPartida()
    {
        return $this->partida;
    }

    /**
     * 
     * @return TimeNaPartida
     */
    function getTimeNaPartidaA()
    {
        return $this->timeNaPartidaA;
    }

    /**
     * 
     * @return TimeNaPartida
     */
    function getTimeNaPartidaB()
    {
        return $this->timeNaPartidaB;
    }

    /**
     * 
     * @return Array<JogadorNaPartida>
     */
    function getJogadoresNaPartida()
    {
        return $this->jogadoresNaPartida;
    }

    private function setObservacoes($observacoes)
    {
        if (FALSE === is_string($observacoes))
        {
            $tipoEncontradoErro = gettype($observacoes);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($observacoes);
            }
            trigger_error('$observacoes precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->observacoes = $observacoes;
    }

    function setJogadoresNaPartida($jogadoresNaPartida)
    {
        if (FALSE === is_string($jogadoresNaPartida))
        {
            $tipoEncontradoErro = gettype($jogadoresNaPartida);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($jogadoresNaPartida);
            }
            trigger_error('$jogadoresNaPartida precisa ser um array, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        foreach ($jogadoresNaPartida as $value)
        {
            if (!$value instanceof JogadorNaPartida)
            {
                    $tipoEncontradoErro = gettype($value);
                    if ($tipoEncontradoErro == 'object')
                    {
                        $tipoEncontradoErro = get_class($value);
                    }
                    trigger_error('$jogadoresNaPartida precisa possuir somente JogadorNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
            }
        }
        $this->jogadoresNaPartida = $jogadoresNaPartida;
    }

}
