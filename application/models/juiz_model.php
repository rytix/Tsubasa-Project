<?php

use Usuario;
use Sumula;
use Partida;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Juiz
 *
 * @author Paulo Eduardo Martins
 */
class Juiz_model extends Usuario_model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cadastrarSumula(Sumula $sumula) {
        //TODO Cadastro da sumula no banco de dados
    }

    public function agendarPartida(Partida $partida) {
        //TODO Cadastro da partida no banco de dados
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