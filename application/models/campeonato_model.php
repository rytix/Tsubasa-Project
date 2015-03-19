<?php
class Campeonato_model extends CI_Model {

    private $nome;

    public function __construct() {
        parent::__construct();
    }

    public function gerarTabelaPontuacao() {
        //TODO funcao gerar tabela pontuação
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

}
