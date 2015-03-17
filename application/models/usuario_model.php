<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Paulo Eduardo Martins
 */
class Usuario_model extends CI_Model {
    
    private $login;
    private $nome;
    private $senha;

    function __construct()
    {
        parent::__construct();
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
     * @return Usuario
     */
    public function setLogin($login)
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
        return $this;
    }

    /**
     * 
     * @param String $nome
     * @return Usuario
     */
    public function setNome($nome)
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
        return $this;
    }

    /**
     * 
     * @param String $senha
     * @return Usuario
     */
    public function setSenha($senha)
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
        return $this;
    }

}
