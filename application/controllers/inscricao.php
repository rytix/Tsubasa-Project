<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Inscricao extends CI_Controller{

		private $usuario;

		public function __construct(){
			parent::__construct();
			$this->load->model('Socio_model');
			$this->load->model('Usuario_model');
			$this->load->model('Categoria_model');
			$this->load->model('Jogador_model');
			$this->load->model('CampeonatoCategoria_model');
			$this->load->model('Invoker_model');
			$this->load->library('session');
		}
		

		public function index(){
			$data['title'] = 'Inscricao';
			$usuario = unserialize($this->session->userdata('usuario'));
			$data['query'] = $this->Invoker_model->get_campeonatosCategoriasSocio($usuario->getId());
			$this->load->view('inscricaoview',$data);
		}

		public function cadastroSocioCampeonato(){
			$this->load->helper('form');
			$this->load->library('form_validation');
			$now = new DateTime();
			$idadeSocio = $now->diff(date_create($usuario->getDataNascimento()))->y;
			$jogador = new Jogador_model();

			if(!empty($_POST['selecionar'])){
				foreach ($_POST['selecionar'] as $selecionar) {
					$pieces = explode(":", $selecionar);
					$categoria = $this->Invoker_model->get_categoria($pieces[1]);
					$faixaIdade = FALSE;

					if(isset($_POST['goleiro']) AND $idadeSocio >= $categoria->getIdadeMinG() AND $idadeSocio <= $categoria->getIdadeMaxG()){
							$jogador->setGoleiro(TRUE);
							$jogador->setSocio($usuario);
							$jogador->setCampeonatoCategoria($this->Invoker_model->get_campeonatoCategoria($pieces[0],$pieces[1]));
							$faixaIdade = TRUE;
					}elseif($idadeSocio >= $categoria->getIdadeMinJ() && $idadeSocio <= $categoria->getIdadeMaxJ()){
							$jogador->setGoleiro(FALSE);
							$jogador->setSocio($usuario);
							$jogador->setCampeonatoCategoria($this->Invoker_model->get_campeonatoCategoria($pieces[0],$pieces[1]));
							$faixaIdade = TRUE;
					}else{
						$faixaIdade = FALSE;
					}
					
					if($faixaIdade){
						$data = array();
						$data['goleiro'] = $jogador->getGoleiro();
						$data['socioID'] = $usuario->getId();
						$data['campeonatoID'] = $pieces[0];
						$data['categoriaID'] = $pieces[1];

						if(!$this->form_validation->run() === FALSE){
							$this->load->view('incricaoview');
						}else{
							$this->Invoker_model->insert_jogador($data);
							$data['title'] = 'Inscricao';
							$data['sucesso'] = 'Usuario cadastrado com sucesso';
						}
					}else{
						$data['falha'] = 'Falha ao cadastrar, usuário não está dentro da faixa de idade requerida';
					}
				}
				$usuario = unserialize($this->session->userdata('usuario'));
				$data['query']= $this->Invoker_model->get_campeonatosCategoriasSocio($usuario->getId());
				$this->load->view('inscricaoview',$data);
			}
		}
	}
?>