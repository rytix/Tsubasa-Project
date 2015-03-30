<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class campeonatojuiz extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('Campeonato_model');
		}
                
                public function view(){
                    $usuario = serialize($this->session->userdata('usuario'));
                    $invoker = new invoker_model();
                    $data['title'] = 'Gerenciamento de Campeonato';
                    $data['campeonatos'] = $invoker->campeonatojuiz($usuario->getID());
                    $this->load->view('listacampeonatojuiz', $data);
                }

        }