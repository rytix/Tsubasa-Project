<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Inscricao extends Ci_Controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Socio_model');
		}

		public function view(){
			$data['title'] = 'Inscricao';
			$this->load->view('inscricaoview');
		}
	}
?>