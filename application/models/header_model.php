<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Header_model extends CI_Model {

    public function get_header() {
        $usuario = unserialize($this->session->userdata('usuario'));
        $usuarioCode = Usuario_model::get_user_type($usuario);
        $data = array();
        $data['usuarioCode'] = $usuarioCode;
        $this->load->view('header.php', $data);
    }

}
