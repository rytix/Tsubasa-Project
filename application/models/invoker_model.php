<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

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
        $query = $this->db->query("SELECT * FROM usuario WHERE login = ? AND senha = ?", array($usuario, $senha));
        if ($query->num_rows() > 0) {
            $this->load->model('diretor_model');
            $this->load->model('juiz_model');
            $this->load->model('socio_model');
            $row = $query->row_array();
            $UsuarioObject;
            switch ($row['tipo']) {
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
            $UsuarioObject->setDataNascimento($row['dataNascimento']);
            $UsuarioObject->setSexo($row['sexo']);
            $UsuarioObject->setId($row['usuarioID']);
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
    public function get_campeonatoscategoria() {
        $this->load->model('campeonatocategoria_model');
        $query = $this->db->query("SELECT * FROM campeonatocategoria");
        $ccs = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $ccDB) {
                $cc = new CampeonatoCategoria_model();
                $campeonato = $this->get_campeonato($ccDB->campeonatoID);
                $categoria = $this->get_categoria($ccDB->categoriaID);
                $cc->setCampeonato($campeonato);
                $cc->setCategoria($categoria);
                array_push($ccs, $cc);
            }
        }
        return $ccs;
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
                $campeonato->setData($campeonatoDB->data);
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
        $campeonato = null;
        if ($query->num_rows() > 0) {
            $campeonatoDB = $query->row();
            $campeonato = new Campeonato_model();
            $campeonato->setAtivo($campeonatoDB->ativo);
            $campeonato->setId($campeonatoDB->campeonatoID);
            $campeonato->setNome($campeonatoDB->nome);
            $campeonato->setData($campeonatoDB->data);
        }
        return $campeonato;
    }
    
    public function get_campeonatojuiz($id){
        $this->load->model('campeonato_model');
        $query = $this->db->query("SELECT * FROM campeonato WHERE juizID = ? and ativo=true", $id);
        $campeonatos = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $campeonatoDB) {
                $campeonatoDB = $query->row();
                $campeonato = new Campeonato_model();
                $campeonato->setAtivo($campeonatoDB->ativo);
                $campeonato->setId($campeonatoDB->campeonatoID);
                $campeonato->setNome($campeonatoDB->nome);
                $campeonato->setData($campeonatoDB->data);
                array_push($campeonatos, $campeonato);
            }
        }
        return $campeonatos;
    }
    
    public function delete_campeonato($campeonatoID, $categoriaID) {
        $this->db->delete('campeonatocategoria', array('campeonatoID' => $campeonatoID, 'categoriaID' => $categoriaID)); 
    }
    
    public function insert_campeonato($post){
        $campeonato = array('nome' => $post['nome'], 'juizID' => $post['juiz'], 'data' => $post['data'], 'ativo' => 0);
        $this->db->insert('campeonato', $campeonato); 
        $campeonatoID = $this->db->insert_id();
        $ccs = array();
        foreach ($post['categorias'] as $categoriaID) {
            $cc = array('categoriaID' => $categoriaID, 'campeonatoID' => $campeonatoID);
            array_push($ccs, $cc);
        }
        $this->db->insert_batch('campeonatocategoria', $ccs); 
        
    }
    

    /* ------- Tabela categoria -------- */
    
     /**
     * Função que procura uma categoria por um ID e retorna a instancia dele ou
     * null se não for encontrado.
     * 
     * @param int $id
     * @return Campeonato_model | NULL
     */
    
    public function get_categoria($id) {
        $this->load->model('categoria_model');
        $query = $this->db->query("SELECT * FROM categoria WHERE categoriaID = ?", $id);
        $categoria = null;
        if ($query->num_rows() > 0) {
            $categoriaDB = $query->row();
            $categoria = new Categoria_model();
            $categoria->setId($categoriaDB->categoriaID)
                    ->setIdadeMaxG($categoriaDB->idadeMaximaGoleiro)
                    ->setIdadeMinG($categoriaDB->idadeMinimaGoleiro)
                    ->setIdadeMaxJ($categoriaDB->idadeMaximaJogador)
                    ->setIdadeMinJ($categoriaDB->idadeMinimaJogador)
                    ->setNome($categoriaDB->nome)
                    ->setSexo($categoriaDB->sexo)
            ;
        }
        return $categoria;
    }

    /**
     * Função que varre o banco de dados retornando um array com todas as categorias
     * existentes nele.
     * 
     * @return array<Campeonato_model>
     */
    
    public function get_categorias() {
        $this->load->model('categoria_model');
        $query = $this->db->query("SELECT * FROM categoria");
        $categorias = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $categoriaDB) {
                $categoria = new Categoria_model();
                $categoria->setId($categoriaDB->categoriaID)
                        ->setIdadeMaxG($categoriaDB->idadeMaximaGoleiro)
                        ->setIdadeMinG($categoriaDB->idadeMinimaGoleiro)
                        ->setIdadeMaxJ($categoriaDB->idadeMaximaJogador)
                        ->setIdadeMinJ($categoriaDB->idadeMinimaJogador)
                        ->setNome($categoriaDB->nome)
                        ->setSexo($categoriaDB->sexo)
                ;
                array_push($categorias, $categoria);
            }
        }
        return $categorias;
    }

    
    /* ------- Tabela Juiz -------- */
    
    /**
     * Função que varre o banco de dados retornando um array com todos os juizes
     * existentes nele.
     * 
     * @return array<Campeonato_model>
     */
    
    public function get_juizes() {
        $this->load->model('juiz_model');
        $query = $this->db->query("SELECT * FROM usuario WHERE tipo = ?", Usuario_model::JUIZ);
        $juizes = array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $juizDB) {
                $juiz = new Juiz_model();
                $juiz->setId($juizDB->usuarioID)
                        ->setNome($juizDB->nome)
                ;
                array_push($juizes, $juiz);
            }
        }
        return $juizes;
    }
    
     /* ------- Tabela Juiz -------- */
    
    public function get_partidacategoria($id){
        $this->load->model('partida_model');
        $query = $this->db->query("SELECT * FROM partida WHERE categoriaID=?",$id);
        $partida= array();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $partidasDB) {
                $partida = new partida_model();
                $partida->setNome($partidasDB->nome)
                ;
                array_push($partidas, $partida);
            }
        }
        return $partidas;
    }

}
