<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Time
 *
 * @author Paulo Eduardo Martins
 */
class Time {

    private $nome;
    private $Jogadores;

    /**
     * 
     * @param String $nome
     * @param Array<Jogador> $jogadores
     */
    function __construct($nome, $jogadores)
    {
        $this->setNome($nome);
        $this->setJogadores($jogadores);
    }

    function getNome()
    {
        return $this->nome;
    }

    function getJogadores()
    {
        return $this->Jogadores;
    }

    private function setNome($nome)
    {
        if (FALSE === is_string($nome))
        {
            trigger_error('$nome precisa ser uma string', E_USER_ERROR);
        }
        $this->nome = $nome;
    }

    private function setJogadores($jogadores)
    {
        if (FALSE === is_string($jogadores))
        {
            $tipoEncontradoErro = gettype($jogadores);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($jogadores);
            }
            trigger_error('$jogadores precisa ser um array, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        foreach ($jogadores as $value)
        {
            if (!$value instanceof Jogador)
            {
                $tipoEncontradoErro = gettype($value);
                if ($tipoEncontradoErro == 'object')
                {
                    $tipoEncontradoErro = get_class($value);
                }
                trigger_error('$jogadores precisa possuir somente Jogador, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
            }
        }
    }

}
