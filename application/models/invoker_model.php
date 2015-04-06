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

    public function __construct()
    {
        parent::__construct();
    }

    /* ------- Tabela Usuario -------- */

    /**
     * Verifica o Usuário e senha e retorna a instancia do Usuário.
     * @return socio_model|juiz_model|diretor_model|null o objeto correspondente
     * a aquele usuário ou null caso o usuário e senha forem incorretos.
     */
    public function get_userByUserPass($usuario, $senha)
    {
        $query = $this->db->query("SELECT * FROM usuario WHERE login = ? AND senha = ?", array($usuario, $senha));
        if ($query->num_rows() > 0)
        {
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
        } else
        {
            return null;
        }
    }

    public function get_usuario($id)
    {
        $query = $this->db->query("SELECT * FROM usuario WHERE usuarioID = ?", array($id));
        $UsuarioObject = null;
        if ($query->num_rows() > 0)
        {
            $this->load->model('diretor_model');
            $this->load->model('juiz_model');
            $this->load->model('socio_model');
            $row = $query->row_array();
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
        }
        return $UsuarioObject;
    }

    public function get_user($id)
    {
        $query = $this->db->query("SELECT * FROM usuario WHERE usuarioID = ?", array($id));
        if ($query->num_rows() > 0)
        {
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
        } else
        {
            return null;
        }
    }

    public function get_juizes()
    {
        $this->load->model('juiz_model');
        $query = $this->db->query("SELECT * FROM usuario WHERE tipo = ?", Usuario_model::JUIZ);
        $juizes = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $juizDB)
            {
                $juiz = new Juiz_model();
                $juiz->setId($juizDB->usuarioID)
                        ->setNome($juizDB->nome)
                ;
                array_push($juizes, $juiz);
            }
        }
        return $juizes;
    }
    
    public function get_juiz($id)
    {
        $this->load->model('juiz_model');
        $query = $this->db->query("SELECT * FROM usuario WHERE tipo = ? AND usuarioID = ?", array(Usuario_model::JUIZ, $id));
        $juiz = null;
        if ($query->num_rows() > 0)
        {
            $juizDB = $query->row();
            $juiz = new Juiz_model();
            $juiz->setId($juizDB->usuarioID)
                    ->setNome($juizDB->nome)
            ;
        }
        return $juiz;
    }

    /* ------- Tabela CampeonatoCategoria -------- */

    /**
     * Função que recebe um campeonato e retorna todos os campeonatosCategorias
     * Dentro dele.
     * 
     * @param int $campeonatoID
     * @return array<CampeonatoCategoria_model>
     */
    public function get_campeonatoCategorias($campeonatoID)
    {
        $this->load->model('campeonatocategoria_model');
        $query = $this->db->query("SELECT * FROM campeonatocategoria WHERE campeonatoID = ?", $campeonatoID);
        $ccs = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $ccDB)
            {
                $cc = new CampeonatoCategoria_model();
                $campeonato = $this->get_campeonato($ccDB->campeonatoID);
                $categoria = $this->get_categoria($ccDB->categoriaID);
                $cc->setCampeonato($campeonato);
                $cc->setCategoria($categoria);
                $cc->setCampeonatoID($ccDB->campeonatoID);
                $cc->setCategoriaID($ccDB->categoriaID);
                array_push($ccs, $cc);
            }
        }
        return $ccs;
    }

    public function get_allCampeonatosCategoria()
    {
        $this->load->model('campeonatocategoria_model');
        $query = $this->db->query("SELECT * FROM campeonatocategoria");
        $ccs = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $ccDB)
            {
                $cc = new CampeonatoCategoria_model();
                $campeonato = $this->get_campeonato($ccDB->campeonatoID);
                $categoria = $this->get_categoria($ccDB->categoriaID);
                $cc->setCampeonato($campeonato);
                $cc->setCategoria($categoria);
                $cc->setCampeonatoID($ccDB->campeonatoID);
                $cc->setCategoriaID($ccDB->categoriaID);
                $cc->setTemTime($this->has_time($ccDB->campeonatoID, $ccDB->categoriaID));
                array_push($ccs, $cc);
            }
        }
        return $ccs;
    }

    /**
     * 
     * @param int $idCampeonato
     * @param int $idCategoria
     * @return CampeonatoCategoria_model
     */
    public function get_campeonatocategoria($idCampeonato, $idCategoria)
    {
        $this->load->model('campeonatocategoria_model');
        $query = $this->db->query("SELECT * FROM campeonatocategoria WHERE campeonatoID = ? AND categoriaID = ?", array($idCampeonato, $idCategoria));
        $cc = null;
        if ($query->num_rows() > 0)
        {
            $ccDB = $query->row();
            $cc = new CampeonatoCategoria_model();
            $campeonato = $this->get_campeonato($ccDB->campeonatoID);
            $categoria = $this->get_categoria($ccDB->categoriaID);
            $cc->setCampeonato($campeonato);
            $cc->setCategoria($categoria);
            $cc->setCampeonatoID($ccDB->campeonatoID);
            $cc->setCategoriaID($ccDB->categoriaID);
        }
        return $cc;
    }

    /* ------- Tabela Campeonato -------- */

    /**
     * Função que varre o banco de dados retornando um array com todos os campeonatos
     * existentes nele.
     * 
     * @return array<Campeonato_model>
     */
    public function get_campeonatos()
    {
        $this->load->model('campeonato_model');

        $query = $this->db->query("SELECT * FROM campeonato");
        $campeonatos = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $campeonatoDB)
            {
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
    public function get_campeonato($id)
    {
        $this->load->model('campeonato_model');

        $query = $this->db->query("SELECT * FROM campeonato WHERE campeonatoID = ?", $id);
        $campeonato = null;
        if ($query->num_rows() > 0)
        {
            $campeonatoDB = $query->row();
            $campeonato = new Campeonato_model();
            $campeonato->setAtivo($campeonatoDB->ativo);
            $campeonato->setId($campeonatoDB->campeonatoID);
            $campeonato->setNome($campeonatoDB->nome);
            $campeonato->setData($campeonatoDB->data);
            $campeonato->setJuiz($this->get_juiz($campeonatoDB->juizID));
        }
        return $campeonato;
    }

    public function get_campeonatojuiz($id)
    {
        $this->load->model('campeonato_model');
        $query = $this->db->query("SELECT * FROM campeonato WHERE juizID = ? and ativo=true", $id);
        $campeonatos = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $campeonatoDB)
            {
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

    public function delete_campeonato($id)
    {
        $this->db->delete('campeonatocategoria', array('campeonatoID' => $id));
        $this->db->delete('campeonato', array('campeonatoID' => $id));
    }

    public function insert_campeonato($post)
    {
        $dataArray = explode('/', $post['data']);
        $data = $dataArray[2].'/'.$dataArray[1].'/'.$dataArray[0];
        
        $campeonato = array('nome' => $post['nome'], 'juizID' => $post['juiz'], 'data' => $data, 'ativo' => 0);
        $this->db->insert('campeonato', $campeonato);
        $campeonatoID = $this->db->insert_id();
        $ccs = array();
        foreach ($post['categorias'] as $categoriaID)
        {
            $cc = array('categoriaID' => $categoriaID, 'campeonatoID' => $campeonatoID);
            array_push($ccs, $cc);
        }
        $this->db->insert_batch('campeonatocategoria', $ccs);
    }

    public function insert_time($time)
    {
        $this->db->insert('time', $time);
        $timeID = $this->db->insert_id();
        return $timeID;
    }

    public function update_campeonato($id, $dados)
    {
        $this->db->where('campeonatoID', $id);
        $this->db->update('campeonato', $dados);
    }

    public function update_jogador($id, $dados)
    {
        $this->db->where('jogadorID', $id);
        $this->db->update('jogador', $dados);
    }

    /* ------- Tabela Categoria -------- */

    /**
     * Função que procura uma categoria por um ID e retorna a instancia dele ou
     * null se não for encontrado.
     * 
     * @param int $id
     * @return Campeonato_model | NULL
     */
    public function get_categoria($id)
    {
        $this->load->model('categoria_model');
        $query = $this->db->query("SELECT * FROM categoria WHERE categoriaID = ?", $id);
        $categoria = null;
        if ($query->num_rows() > 0)
        {
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
     * Retorna todas as categorias de um campeonato
     * @param CampeonatoCategoria_model $cc
     * @return array<Categoria_model>
     */
    public function get_categorias()
    {
        $this->load->model('categoria_model');
        $query = $this->db->query("SELECT * FROM categoria");
        $categorias = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $categoriaDB)
            {
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

    /* ------- Tabela Time -------- */

    public function get_timesPorCampCat(CampeonatoCategoria_model $campeonatoCategoria)
    {
        $this->load->model('time_model');
        $this->load->model('campeonatoCategoria_model');
        $idCampeonato = $campeonatoCategoria->getCampeonatoID();
        $idCategoria = $campeonatoCategoria->getCategoriaID();
        $query = $this->db->query("SELECT * FROM time WHERE campeonatoID = ? AND categoriaID = ?", array($idCampeonato, $idCategoria));
        $times = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $timeDB)
            {
                $time = new Time_model();
                $time->setId($timeDB->timeID);
                $time->setNome($timeDB->nome);
                $time->setCampeonatoCategoria($campeonatoCategoria);
                array_push($times, $time);
            }
        }
        return $times;
    }

    public function get_time($id)
    {
        $this->load->model('time_model');
        $query = $this->db->query("SELECT * FROM time WHERE timeID = ?", $id);
        $time = null;
        if ($query->num_rows() > 0)
        {
            $timeDB = $query->row();
            $time = new Time_model();
            $time->setId($timeDB->timeID);
            $time->setNome($timeDB->nome);
            $time->setCampeonatoCategoria($this->get_campeonatocategoria($timeDB->campeonatoID, $timeDB->categoriaID));
        }
        return $time;
    }

    /* ------- Tabela Partida -------- */

    public function get_partidasPorCampCat(CampeonatoCategoria_model $campeonatoCategoria)
    {
        $this->load->model('partida_model');
        $this->load->model('campeonatoCategoria_model');
        $idCampeonato = $campeonatoCategoria->getCampeonatoID();
        $idCategoria = $campeonatoCategoria->getCategoriaID();
        $query = $this->db->query("SELECT * FROM partida WHERE campeonatoID = ? AND categoriaID = ?", array($idCampeonato, $idCategoria));
        $partidas = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $partidaDB)
            {
                $partida = new Partida_model();
                $partida->setId($partidaDB->partidaID);
                $partida->setNome($partidaDB->nome);
                $partida->setCampeonatoCategoria($campeonatoCategoria);
                $partida->setCampo($partidaDB->campo);
                $partida->setData($partidaDB->data);
                if ($partidaDB->partidaAtiva == 0)
                {
                    $partida->setPartidaAtiva(FALSE);
                } else
                    $partida->setPartidaAtiva(TRUE);
                {
                    
                }
                if (!is_null($partidaDB->sumulaID))
                {
                    $partida->setSumula($this->get_partidasGetSumulaDaPartida($partida, $partidaDB->sumulaID));
                } else
                {
                    $partida->setSumula(null);
                }
                array_push($partidas, $partida);
            }
        }
        return $partidas;
    }

    public function get_partida($id)
    {
        $this->load->model('partida_model');
        $query = $this->db->query("SELECT * FROM partida WHERE partidaID = ?", $id);
        $partida = null;
        if ($query->num_rows() > 0)
        {
            $partidaDB = $query->row();
            $partida = new Partida_model();
            $partida->setId($partidaDB->partidaID);
            $partida->setNome($partidaDB->nome);
            $partida->setCampeonatoCategoria($this->get_campeonatocategoria($partidaDB->campeonatoID, $partidaDB->categoriaID));
            $partida->setCampo($partidaDB->campo);
            $partida->setData(DateTime::createFromFormat('Y-m-d', $partidaDB->date));
            $partida->setPartidaAtiva($partidaDB->partidaAtiva);
            if (!is_null($partidaDB->sumulaID))
            {
                $partida->setSumula($this->get_partidasGetSumulaDaPartida($partida, $partidaDB->sumulaID));
            } else
            {
                $partida->setSumula(null);
            }
        }
        return $partida;
    }

    private function get_partidasGetSumulaDaPartida(Partida_model $partidaInacabada, $sumulaID)
    {
        $this->load->model('sumula_model');
        $query = $this->db->query("SELECT * FROM sumula WHERE sumulaID = ?", $sumulaID);
        $sumula = null;
        if ($query->num_rows() > 0)
        {
            $sumulaDB = $query->row();
            $sumula = new Sumula_model();
            $sumula->setId($sumulaDB->sumulaID);
            $sumula->setObservacoes($sumulaDB->observacoes);
            $times = $this->get_sumulaTimesNaSumula($sumula, $sumula->getId());
            $sumula->setTimeNaSumulaA($times[0]);
            $sumula->setTimeNaSumulaB($times[1]);
            $sumula->setPartida($partidaInacabada);
            $sumula->setJogadoresNaSumula($this->get_sumulaJogadoresNaSumula($sumula, $sumula->getId()));
        }
        return $sumula;
    }

    /**
     * 
     * @param Sumula_model $sumulaInacabada
     * @param int $sumulaID
     * @return array<TimeNaSumula_model>
     */
    private function get_sumulaTimesNaSumula(Sumula_model $sumulaInacabada, $sumulaID)
    {
        $this->load->model('timeNaSumula_model');
        $this->load->model('sumula_model');
        $query = $this->db->query("SELECT * FROM timenasumula WHERE sumulaID = ?", $sumulaID);
        $timesNaSumula = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $timeNaSumulaDB)
            {
                $timeNaSumula = new TimeNaSumula_model();
                $timeNaSumula->setSumula($sumulaInacabada);
                $timeNaSumula->setTime($this->get_time($timeNaSumulaDB->timeID));
                $timeNaSumula->setWo($timeNaSumulaDB->wo);
                array_push($timesNaSumula, $timeNaSumula);
            }
        }
        return $timesNaSumula;
    }

    /**
     * 
     * @param Sumula_model $sumulaInacabada
     * @param int $sumulaID
     * @return array<JogadorNaSumula_model> Description
     */
    private function get_sumulaJogadoresNaSumula(Sumula_model $sumulaInacabada, $sumulaID)
    {
        $this->load->model('jogadorNaSumula_model');
        $this->load->model('sumula_model');
        $query = $this->db->query("SELECT * FROM jogadornasumula WHERE sumulaID = ?", $sumulaID);
        $jogadoresNaSumula = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $jogadorNaSumulaDB)
            {
                $jogadorNaSumula = new JogadorNaSumula_model();

                $jogadorNaSumula->setSumula($sumulaInacabada);
                if ($jogadorNaSumulaDB->cartaoVermelho == 0)
                {
                    $jogadorNaSumula->setCartaoVermelho(FALSE);
                } else
                {
                    $jogadorNaSumula->setCartaoVermelho(TRUE);
                }
                $jogadorNaSumula->setJogador($this->get_jogador($jogadorNaSumulaDB->jogadorID));
                $jogadorNaSumula->setNCartaoAzul(intval($jogadorNaSumulaDB->nCartaoAzul));
                $jogadorNaSumula->setNFaltas(intval($jogadorNaSumulaDB->nFaltas));
                $jogadorNaSumula->setNGol(intval($jogadorNaSumulaDB->nGol));

                array_push($jogadoresNaSumula, $jogadorNaSumula);
            }
        }
        return $jogadoresNaSumula;
    }

    /* ------- Tabela Jogador -------- */

    public function get_JogadoresDestaques()
    {
        $this->load->model('jogador_model');
        $artilheiro = null;
        $goleiro = null;
        $farPlay = null;
        $query = $this->db->query("SELECT jogadorID,sum(nGol) FROM jogadornasumula GROUP BY jogadorID ORDER BY sum(nGol) DESC");
        if ($query->num_rows() > 0)
        {
            $queryRow = $query->row();
            $artilheiro = $this->get_jogador($queryRow->jogadorID);
        }
//        $query = $this->db->query("");
//        if ($query->num_rows() > 0)
//        {
//            $queryRow = $query->row();
//            $goleiro = $this->get_jogador($queryRow->jogadorID);
//        }
        $query = $this->db->query("SELECT jogadorID,sum(nFaltas) FROM jogadornasumula GROUP BY jogadorID ORDER BY nFaltas;");
        if ($query->num_rows() > 0)
        {
            $queryRow = $query->row();
            $farPlay = $this->get_jogador($queryRow->jogadorID);
        }
        return array($artilheiro,$goleiro,$farPlay);
    }

    public function get_jogador($id)
    {
        $this->load->model('jogador_model');
        $query = $this->db->query("SELECT * FROM jogador WHERE jogadorID = ?", $id);
        $jogador = null;
        if ($query->num_rows() > 0)
        {
            $jogadorDB = $query->row();
            $jogador = new Jogador_model();
            $jogador->setId($jogadorDB->jogadorID);
            if ($jogadorDB->goleiro == 0)
            {
                $jogador->setGoleiro(FALSE);
            } else
            {
                $jogador->setGoleiro(TRUE);
            }
            $jogador->setCampeonatoCategoria($this->get_campeonatocategoria($jogadorDB->campeonatoID, $jogadorDB->categoriaID));
            $jogador->setTime($this->get_time($jogadorDB->timeID));
            $jogador->setSocio($this->get_user($jogadorDB->socioID));
        }
        return $jogador;
    }

    public function get_jogadoresDeUmTime(Time_model $time)
    {
        $this->load->model('Jogador_model');
        $this->load->model('time_model');
        $query = $this->db->query("SELECT * FROM jogador WHERE timeID = ?", $time->getId());
        $jogadores = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $jogadorDB)
            {
                $jogador = new Jogador_model();
                $jogador->setId($jogadorDB->jogadorID);
                $jogador->setGoleiro(boolval($jogadorDB->goleiro));
                $jogador->setCampeonatoCategoria($this->get_campeonatocategoria($jogadorDB->campeonatoID, $jogadorDB->categoriaID));
                $jogador->setTime($time);
                $jogador->setSocio($this->get_user($jogadorDB->socioID));
                array_push($jogadores, $jogador);
            }
        }
        return $jogadores;
    }

    public function get_partidacategoria($campeonatoID, $categoriaID)
    {
        $this->load->model('partida_model');
        $query = $this->db->query("SELECT * FROM partida WHERE categoriaID= ? AND campeonatoID= ? ", array($campeonatoID, $categoriaID));
        $partidas = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $partidasDB)
            {
                $partida = new partida_model();
                $partida->setNome($partidasDB->nome)
                ;
                array_push($partidas, $partida);
            }
        }
        return $partidas;
    }

    public function get_partidacategoriaById($id)
    {
        $this->load->model('partida_model');
        $query = $this->db->query("SELECT * FROM partida WHERE categoriaID=?", $id);
        $partidas = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $partidasDB)
            {
                $partida = new partida_model();
                $partida->setNome($partidasDB->nome)
                ;
                array_push($partidas, $partida);
            }
        }
        return $partidas;
    }

    public function get_jogadores_semtime($campeonato, $categoria)
    {
        $this->load->model('jogador_model');
        $query = $this->db->query("SELECT * FROM jogador WHERE timeID is NULL AND goleiro = 0  AND campeonatoID = ? AND categoriaID = ?", array($campeonato, $categoria));
        $jogadores = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $jogadorDB)
            {
                $jogador = new Jogador_model();
                $jogador->setId($jogadorDB->jogadorID);
                $jogador->setGoleiro($jogadorDB->goleiro);
                $jogador->setTime(NULL);
                $jogador->setCampeonatoCategoria($this->get_campeonatocategoria($jogadorDB->campeonatoID, $jogadorDB->categoriaID));
                $jogador->setSocio($this->get_usuario($jogadorDB->socioID));

                array_push($jogadores, $jogador);
            }
        }
        return $jogadores;
    }

    public function get_goleiros_semtime($campeonato, $categoria)
    {
        $this->load->model('jogador_model');
        $query = $this->db->query("SELECT * FROM jogador WHERE timeID is NULL AND goleiro = 1  AND campeonatoID = ? AND categoriaID = ?", array($campeonato, $categoria));
        $jogadores = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $jogadorDB)
            {
                $jogador = new Jogador_model();
                $jogador->setId($jogadorDB->jogadorID);
                $jogador->setGoleiro($jogadorDB->goleiro);
                $jogador->setTime(NULL);
                $jogador->setCampeonatoCategoria($this->get_campeonatocategoria($jogadorDB->campeonatoID, $jogadorDB->categoriaID));
                $jogador->setSocio($this->get_usuario($jogadorDB->socioID));

                array_push($jogadores, $jogador);
            }
        }
        return $jogadores;
    }

    public function insert_jogador($data)
    {
        $this->db->insert('Jogador', $data);
    }

    public function get_campeonatossCategoria($campeonatoID, $categoriaID)
    {
        $this->load->model('CampeonatoCategoria_model');
        $query = $this->db->query("SELECT campeonatoID, categoriaID FROM campeonatoCategoria WHERE campeonatoID=$campeonatoID AND categoriaID=$categoriaID");
        $campeonatoCategoria = new CampeonatoCategoria_model();
        if ($query->num_rows() > 0)
        {
            $campeonatoCategoriaDB = $query->row();
            $campeonatoCategoria->setCampeonatoID($campeonatoCategoriaDB->campeonatoID);
            $campeonatoCategoria->setCategoriaID($campeonatoCategoriaDB->categoriaID);
            $campeonatoCategoria->setCampeonato($this->get_campeonato($campeonatoCategoriaDB->campeonatoID));
            $campeonatoCategoria->setCategoria($this->get_categoria($campeonatoCategoriaDB->categoriaID));
        }
        return $campeonatoCategoria;
    }

    public function get_campeonatosCategoriasSocio($id)
    {
        $this->load->model('CampeonatoCategoria_model');
        $query = $this->db->query('SELECT cc.campeonatoID, cc.categoriaID FROM campeonatocategoria cc LEFT JOIN  jogador j ON(j.socioID = ? AND j.campeonatoID = cc.campeonatoID AND j.categoriaID = cc.categoriaID) WHERE j.campeonatoID IS NULL AND j.categoriaID IS NULL GROUP BY cc.campeonatoID, cc.categoriaID', $id);
        $campeonatosCategoria = array();
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $campeonatoCategoriaDB)
            {
                $campeonatoCategoria = new CampeonatoCategoria_model();
                $campeonatoCategoria->setCampeonatoID($campeonatoCategoriaDB->campeonatoID);
                $campeonatoCategoria->setCategoriaID($campeonatoCategoriaDB->categoriaID);
                $campeonatoCategoria->setCampeonato($this->get_campeonato($campeonatoCategoriaDB->campeonatoID));
                $campeonatoCategoria->setCategoria($this->get_categoria($campeonatoCategoriaDB->categoriaID));
                array_push($campeonatosCategoria, $campeonatoCategoria);
            }
        }
        return $campeonatosCategoria;
    }

    public function insert_juiz($data)
    {
        $this->db->insert('usuario', $data);
    }

    public function has_time($idCampeonato, $idCategoria)
    {
        $this->load->model('time_model');
        $query = $this->db->query("SELECT * FROM time WHERE campeonatoID = ? AND categoriaID = ?", array($idCampeonato, $idCategoria));
        if ($query->num_rows() > 0)
        {
            return true;
        }
        return false;
    }

}
