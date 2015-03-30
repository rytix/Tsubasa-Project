<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Tipo 3
 */
class Socio_model extends Usuario_model{	
    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insereSocioCampeonato($data){
    	
    }
}
