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
abstract class Usuario_model extends CI_Model {
    
    private $login;
    private $nome;
    private $senha;

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Verifica o Usuário e senha e retorna a instancia do Usuário.
     * @return socio_model|juiz_model|diretor_model|null o objeto correspondente
     * a aquele usuário ou null caso o usuário e senha forem incorretos.
     */
    public static function get_user($usuario, $senha)
    {
        $query = $this->db->query("SELECT * FROM pessoa WHERE login = ? AND senha = ?", array($usuario, $senha));
        die;
        if ($query->num_rows() > 0)
        {
            $row = $query->row_array();
            $UsuarioObject;
            switch($row['tipo']){
                case 1:
                    $UsuarioObject = new Diretor_model();
                    break;
                case 2:
                    $UsuarioObject = new Juiz_model();
                    break;
                case 3:
                    $UsuarioObject = new Socio_model();
                    break;
                default:
                    return null;
            }
            $UsuarioObject->setLogin($row['login']);
            $UsuarioObject->setSenha($row['senha']);
            $UsuarioObject->setSenha($row['nome']);
            return $UsuarioObject;
        }else{
            return null;
        }
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
