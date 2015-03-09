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
abstract class Usuario extends CI_Model {

    private $login;
    private $nome;
    private $senha;

    /**
     * 
     * @param String $login
     * @param String $nome
     * @param String $senha
     */
    function __construct($login, $nome, $senha)
    {
        parent::__construct();
        $this->setLogin($login);
        $this->setNome($nome);
        $this->setSenha($senha);
    }

    /**
     * 
     * @return String
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * 
     * @return String
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Não é um elogio
     * @return String 
     */
    public function getSenha()
    {
        return $this->senha;
    }
    /**
     * Questiona a distancia da variavel
     * @param String $login
     */
    private function setLogin($login)
    {
        if (FALSE === is_string($login))
        {
            $tipoEncontradoErro = gettype($login);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($login);
            }
            trigger_error('$login precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->login = $login;
    }

    private function setNome($nome)
    {
        if (FALSE === is_string($nome))
        {
            $tipoEncontradoErro = gettype($nome);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($nome);
            }
            trigger_error('$nome precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->nome = $nome;
    }

    private function setSenha($senha)
    {
        if (FALSE === is_string($senha))
        {
            $tipoEncontradoErro = gettype($senha);
            if ($tipoEncontradoErro == 'object')
            {
                $tipoEncontradoErro = get_class($senha);
            }
            trigger_error('$senha precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        $this->senha = $senha;
    }

}
