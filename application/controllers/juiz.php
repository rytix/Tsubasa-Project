<?php
	class Juiz extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('juiz');
		}

		public function view(){
			$data['title'] = 'Cadastro de Juiz';
			$this->load->view('cadastrojuiz');
		}

		public function cadastrojuiz(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nome','Nome','required');
			$this->form_validation->set_rules('username','Usuário','required|is_unique[users.username]');
			$this->form_validation->set_rules('password','Senha','required|matches[password-clone]');
			$this->form_validation->set_rules('password-clone','Repetir Senha','required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('cadastrojuiz');
			}else{
				$this->juiz->insert_juiz();
				$bolinhas = array();
				$bolinhas['sucesso'] = 'valeuGalere';
				$this->load->view('cadastrojuiz',$bolinha);
			}
		}
	}
?>