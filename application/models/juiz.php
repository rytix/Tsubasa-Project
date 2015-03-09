<?php
	class Juiz extends Usuario{

		public function __construct(){
			$this->load->database();
		}

		function insert_juiz(){
			$data = array(
				'nome' => $this->input->post('nome'),
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);

			return $this->db->insert('users',$data);		}
	}
?>