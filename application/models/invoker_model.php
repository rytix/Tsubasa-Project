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
class invoker_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /* ------- Tabela Usuario -------- */

    /**
     * Verifica o Usuário e senha e retorna a instancia do Usuário.
     * @return socio_model|juiz_model|diretor_model|null o objeto correspondente
     * a aquele usuário ou null caso o usuário e senha forem incorretos.
     */
    public function get_user($usuario, $senha) {
        $query = $this->db->query("SELECT * FROM pessoa WHERE login = ? AND senha = ?", array($usuario, $senha));
        if ($query->num_rows() > 0) {
            $this->load->model('diretor_model');
            $this->load->model('juiz_model');
            $this->load->model('socio_model');
            $row = $query->row_array();
            $UsuarioObject;
            switch ($row['Tipo']) {
                case Usuario_model::DIRETOR :
                    $UsuarioObject = new Diretor_model();
                    break;
                case Usuario_model::JUIZ:
                    $UsuarioObject = new Juiz_model();
                    break;
                case Usuario_model::SOCIO:
                    $UsuarioObject = new Socio_model();
                    break;
                default:
                    return null;
            }
            $UsuarioObject->setLogin($row['login']);
            $UsuarioObject->setSenha($row['senha']);
            $UsuarioObject->setNome($row['nome']);
            return $UsuarioObject;
        } else {
            return null;
        }
    }

    /* ------- Tabela CampeonatoCategoria -------- */

    /**
     * Função que recebe um campeonato e retorna todos os campeonatosCategorias
     * Dentro dele.
     * 
     * @param type Campeonato_model
     * @return array<CampeonatoCategoria_model>
     */
    public function get_campeonatosCategoria($campeonato) {
        //TODO acesso a banco de dados
    }

    /* ------- Tabela Campeonato -------- */

    /**
     * Função que varre o banco de dados retornando um array com todos os campeonatos
     * existentes nele.
     * 
     * @return array<Campeonato_model>
     */
    public function get_campeonatos() {
        $this->load->model('campeonato_model');

        $query = $this->db->query("SELECT * FROM campeonato");
        $campeonatos = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $campeonatoDB) {
                $campeonato = new Campeonato_model();
                $campeonato->setAtivo($campeonatoDB->ativo);
                $campeonato->setId($campeonatoDB->campeonatoID);
                $campeonato->setNome($campeonatoDB->nome);
                array_push($campeonatos, $campeonato);
            }
        }
        return $campeonatos;
    }
    /**
     * Função que procura um campeonato por uma ID e retorna a instancia dele ou
     * null se não for encontrado.
     * 
     * @param int $id
     * @return Campeonato_model | NULL
     */
    public function get_campeonato($id) {
        $this->load->model('campeonato_model');

        $query = $this->db->query("SELECT * FROM campeonato WHERE campeonatoID = ?", $id);
        $campeonato;
        if ($query->num_rows() > 0) {
            $campeonatoDB = $query->row();
            $campeonato = new Campeonato_model();
            $campeonato->setAtivo($campeonatoDB->ativo);
            $campeonato->setId($campeonatoDB->campeonatoID);
            $campeonato->setNome($campeonatoDB->nome);
        }
        return $campeonato;
    }

}
