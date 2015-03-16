<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of invoker_model
 *
 * @author 4276663
 */
class invoker_model extends CI_Model{
     /**
     * Verifica o Usuário e senha e retorna a instancia do Usuário.
     * @return socio_model|juiz_model|diretor_model|null o objeto correspondente
     * a aquele usuário ou null caso o usuário e senha forem incorretos.
     */
     public function __construct() {
         parent::__construct();
        $this->load->database();
        echo "aaa";
     }

     
    public function get_user($usuario, $senha)
    {
        $query = $this->db->query("SELECT * FROM pessoa WHERE login = ? AND senha = ?", array($usuario, $senha));
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
}
