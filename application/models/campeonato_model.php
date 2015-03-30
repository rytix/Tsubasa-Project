<?php
class Campeonato_model extends CI_Model {
    private $id;
    private $nome;
    private $ativo;
<<<<<<< HEAD
    private $juiz;

=======
    private $data;
    
>>>>>>> d6dc11e9d48c94eb90da116170f15ae3f00e1bc8
    public function __construct() {
        parent::__construct();
    }

    public function gerarTabelaPontuacao() {
        //TODO funcao gerar tabela pontuação
    }
    
    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

        
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    /**
     * 
     * @return String
     */
    public function getNome() {
        return $this->nome;
    }
    /**
     * 
     * @param String $nome
     * @return Campeonato
     */
    public function setNome($nome) {
        if (FALSE === is_string($nome)) {
            $tipoEncontradoErro = gettype($nome);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($nome);
            }
            trigger_error('$nome precisa ser uma string, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }

        $this->nome = $nome;
        return $this;
    }
    
    public function select_campeonato(){
        $query = $this->db->query('select nome from campeonato where campeonatoativo=true;');
        
        return $query->return();
    }
    
    public function isAtivo() {
        return $this->ativo;
    }

    public function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
    
    function getJuiz() {
        return $this->juiz;
    }

    function setJuiz($juiz) {
        $this->juiz = $juiz;
        return $this;
    }





}
