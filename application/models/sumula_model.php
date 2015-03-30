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
    private $timeNaSumulaA;
    private $timeNaSumulaB;
    private $jogadoresNaSumula;

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
        $this->jogadoresNaSumula = array();
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
        return $this->timeNaSumulaA;
    }

    /**
     * 
     * @return TimeNaPartida
     */
    public function getTimeNaPartidaB() {
        return $this->timeNaSumulaB;
    }

    /**
     * 
     * @return Array<JogadorNaPartida>
     */
    public function getJogadoresNaPartida() {
        return $this->jogadoresNaSumula;
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
     * @param TimeNaPartida $timeNaSumulaA
     * @return Sumula
     */
    public function setTimeNaSumulaA(TimeNaSumula_model $timeNaSumulaA) {
        if (!$timeNaSumulaA instanceof TimeNaPartida) {
            $tipoEncontradoErro = gettype($timeNaSumulaA);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($timeNaSumulaA);
            }
            trigger_error('$timeNaPartidaA precisa ser um TimeNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->timeNaSumulaA = $timeNaSumulaA;
        return $this;
    }
    /**
     * 
     * @param TimeNaPartida $timeNaSumulaB
     * @return Sumula
     */
    public function setTimeNaSumulaB(TimeNaSumula_model $timeNaSumulaB) {
        if (!$timeNaSumulaB instanceof TimeNaPartida) {
            $tipoEncontradoErro = gettype($timeNaSumulaB);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($timeNaSumulaB);
            }
            trigger_error('$timeNaPartidaB precisa ser um TimeNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->timeNaSumulaB = $timeNaSumulaB;
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
     * @param array<JogadorNaPartida> $jogadoresNaSumula
     * @return Sumula
     */
    public function setJogadoresNaSumula(JogadorNaSumula_model $jogadoresNaSumula) {
        if (FALSE === is_string($jogadoresNaSumula)) {
            $tipoEncontradoErro = gettype($jogadoresNaSumula);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($jogadoresNaSumula);
            }
            trigger_error('$jogadoresNaPartida precisa ser um array, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        foreach ($jogadoresNaSumula as $value) {
            if (!$value instanceof JogadorNaPartida) {
                $tipoEncontradoErro = gettype($value);
                if ($tipoEncontradoErro == 'object') {
                    $tipoEncontradoErro = get_class($value);
                }
                trigger_error('$jogadoresNaPartida precisa possuir somente JogadorNaPartida, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
            }
        }
        $this->jogadoresNaSumula = $jogadoresNaSumula;
        return $this;
    }

}
