<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Verificador_usuarios_model extends CI_Model {

    /**
     * Verifica o Usuario (com o da seção), se não bater redireciona para 
     * tela de login
     * @param DIRETOR|JUIZ|SOCIO $tipoUsuarioEsperado
     */
    public function verificarUsuario($tipoUsuarioEsperado) {
        $usuario = unserialize($this->session->userdata('usuario'));

        if (Usuario_model::get_user_type($usuario) == -1) {
            redirect('index.php/login');
        }
        if (Usuario_model::get_user_type($usuario) != $tipoUsuarioEsperado) {
            redirect('index.php/login');
        }

    }

    public function verificarUsuarioExiste() {
        $usuario = unserialize($this->session->userdata('usuario'));

        if (Usuario_model::get_user_type($usuario) == -1) {
            redirect('index.php/login');
        }
    }

}
