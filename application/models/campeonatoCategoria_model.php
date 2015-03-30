<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of campeonatoCategoria
 *
 * @author 4289714
 */
class CampeonatoCategoria_model extends CI_Model {

    private $campeonatoID;
    private $categoriaID;
    private $campeonato;
    private $categoria;

    public function __construct() {
        parent::__construct();
        $this->load->model('Invoker_model');
    }

    public function getCampeonatoID(){
        return $this->campeonatoID;
    }

    public function setCampeonatoID($id){
        $this->campeonatoID = $id;
    }

    public function getCategoriaID(){
        return $this->categoriaID;
    }

    public function setCategoriaID($id){
        $this->categoriaID = $id;
    }

    /**
     * 
     * @return Categoria
     */
    public function getCategoria() {
        return $this->categoria;
    }
    /**
     * 
     * @return Campeonato
     */
    public function getCampeonato() {
        return $this->campeonato;
    }

    /**
     * 
     * @param Categoria $categoria
     * @return CampeonatoCategoria
     */
<<<<<<< HEAD
    public function setCategoria(Categoria_model $categoria) {
=======
    public function setCategoria($categoria) {
>>>>>>> b194edaf60b6ed8b464f38e11df6c91f22c26bda
        if ($categoria instanceof Categoria) {
            $tipoEncontradoErro = gettype($categoria);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($categoria);
            }
            trigger_error('$categoria precisa ser uma instancia de Categoria, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        
        $this->categoria = $categoria;
        return $this;
    }
    /**
     * 
     * @param Campeonato $campeonato
     * @return CampeonatoCategoria
     */
<<<<<<< HEAD
    public function setCampeonato(Campeonato_model $campeonato) {
=======
    public function setCampeonato($campeonato) {
>>>>>>> b194edaf60b6ed8b464f38e11df6c91f22c26bda
        if ($campeonato instanceof Campeonato) {
            $tipoEncontradoErro = gettype($campeonato);
            if ($tipoEncontradoErro == 'object') {
                $tipoEncontradoErro = get_class($campeonato);
            }
            trigger_error('$campeonato precisa ser uma instancia de Campeonato, encontrado:' . $tipoEncontradoErro, E_USER_ERROR);
        }
        
        $this->campeonato = $campeonato;
        return $this;
    }

}
