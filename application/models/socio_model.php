<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Tipo 3
 */
class Socio_model extends CI_Model{	
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function buscaCampeonato(){
    	$this->db->query('SELECT c.nome as nomeCampeonato, cat.nome as nomeCategoria FROM campeonato c INNER JOIN categoria cat ON (c.id = cat.campeonatoID)');
    }

    public function insereSocioCampeonato($data){
    	
    }
}
