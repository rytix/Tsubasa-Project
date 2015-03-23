    <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Tipo 2
 */
class Juiz_model extends Usuario_model {

    private $campeonatos;
    
    
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getCampeonatos() {
        //busca todos os campenatos que tenha esse juiz linkado.
        return $this->campeonatos;
    }

        public function cadastrarSumula(Sumula $sumula) {
        //TODO Cadastro da sumula no banco de dados
    }

    public function insert_partida() {
        $data = array(
            'campeonato' => $this->input->post('campeonato'),
            'categoria' => $this->input->post('categoria'),
            'casa' => $this->input->post('casa'),
            'visitante' => $this->input->post('visitante'),
            'data' => $this->input->post('data'),
            'horajogo' => $this->input->post('horajogo'),
            'campo' => $this->input->post('campo')
        );
        return $this->db->insert('partida',$data);
    }

    function insert_juiz() {
        $data = array(
            'nome' => $this->input->post('nome'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password')
        );

        return $this->db->insert('users', $data);
    }
}
?>