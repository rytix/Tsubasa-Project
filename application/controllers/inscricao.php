<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Inscricao extends CI_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Socio_model');
		}

		public function view(){
			$data['title'] = 'Inscricao';
			$query = $this->Socio_model->buscaCampeonato();
			$this->load->view('inscricaoview', $data, $query);
		}

		public function cadastroSocioCampeonato(){
			$this->load->helper('form');
			if(!empty($_POST['selecionar'])){
				foreach ($_POST['selecionar']) {
					if($_POST['goleiro']){
						
					}else{
						
					}
				}
			}
		}
	}
?>