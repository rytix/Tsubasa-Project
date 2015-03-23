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
class Sumula_model extends CI_Model {

    private $id;
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
    public function __construct() {
        parent::__construct();
        $this->jogadoresNaPartida = array();
    }
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

        /**
    1 * 
     * @return String
     */
    public function getObservacoes() {
        return $this->observacoes;
    }

    /**
     * 
     * @return Partida
     */
    public function getPartida() {
        return $this->partida;
    }

    /**
     * 
     * @return TimeNaPartida
     */
    public function getTimeNaPartidaA() {
        return $this->timeNaPartidaA;
    }

    /**
     * 
     * @return TimeNaPartida
     */
    public function getTimeNaPartidaB() {
        return $this->timeNaPartidaB;
    }

    /**
     * 
     * @return Array<JogadorNaPartida>
     */
    public function getJogadoresNaPartida() {
        return $this->jogadoresNaPartida;
    }
    /**
     * 
     * @param Partida $partida
     * @return Sumula
     */
    public function setPartida(Partida $partida) {
        if (!$partida instanceof Partida) {
            $tipoEncontradoErro = gettype($partida);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($partida);
            }
            trigger_error('$partida precisa ser uma Partida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->partida = $partida;
        return $this;
    }
    /**
     * 
     * @param TimeNaPartida $timeNaPartidaA
     * @return Sumula
     */
    public function setTimeNaPartidaA(TimeNaPartida $timeNaPartidaA) {
        if (!$timeNaPartidaA instanceof TimeNaPartida) {
            $tipoEncontradoErro = gettype($timeNaPartidaA);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($timeNaPartidaA);
            }
            trigger_error('$timeNaPartidaA precisa ser um TimeNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->timeNaPartidaA = $timeNaPartidaA;
        return $this;
    }
    /**
     * 
     * @param TimeNaPartida $timeNaPartidaB
     * @return Sumula
     */
    public function setTimeNaPartidaB(TimeNaPartida $timeNaPartidaB) {
        if (!$timeNaPartidaB instanceof TimeNaPartida) {
            $tipoEncontradoErro = gettype($timeNaPartidaB);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($timeNaPartidaB);
            }
            trigger_error('$timeNaPartidaB precisa ser um TimeNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->timeNaPartidaB = $timeNaPartidaB;
        return $this;
    }
    /**
     * 
     * @param String $observacoes
     * @return Sumula
     */
    public function setObservacoes($observacoes) {
        if (FALSE === is_string($observacoes)) {
            $tipoEncontradoErro = gettype($observacoes);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($observacoes);
            }
            trigger_error('$observacoes precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->observacoes = $observacoes;
        return $this;
    }
    /**
     * 
     * @param array<JogadorNaPartida> $jogadoresNaPartida
     * @return Sumula
     */
    public function setJogadoresNaPartida(JogadorNaPartida_model $jogadoresNaPartida) {
        if (FALSE === is_string($jogadoresNaPartida)) {
            $tipoEncontradoErro = gettype($jogadoresNaPartida);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($jogadoresNaPartida);
            }
            trigger_error('$jogadoresNaPartida precisa ser um array, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        foreach ($jogadoresNaPartida as $value) {
            if (!$value instanceof JogadorNaPartida) {
                $tipoEncontradoErro = gettype($value);
                if ($tipoEncontradoErro == 'object') {
                    $tipoEncontradoErro = get_class($value);
                }
                trigger_error('$jogadoresNaPartida precisa possuir somente JogadorNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
            }
        }
        $this->jogadoresNaPartida = $jogadoresNaPartida;
        return $this;
    }

}
