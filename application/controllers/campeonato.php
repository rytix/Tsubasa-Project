<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Campeonato extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('Campeonato_model');
		}
                
                public function lista() {
                    $data['title'] = 'Listagem de Campeonato';
                    $campeonatosCategoria = array();
                    for($i = 0; $i < 5; $i++){
                        $campeonatoCategoria = new CampeonatoCategoria_model();
                        $campeonato = new Campeonato_model();
                        $campeonato->setNome('Campeonato do Clube '.$i);
                        $categoria = new Categoria_model();
                        $categoria->setNome('Categoria Teste '.$i);
                        $campeonatoCategoria->setCampeonato($campeonato);
                        $campeonatoCategoria->setCategoria($categoria);
                        $campeonatosCategoria[] = $campeonatoCategoria;
                    }
                    $data['campeonatos'] = $campeonatosCategoria;
                    $this->load->view('listacampeonato', $data);
                }

		public function view(){
			$data['title'] = 'Cadastro de Campeonato';
                        
                        //faz select de juizes no banco
                        $data['juizes'] = array(
                            'Rogerio',
                            'Marcelo',
                            'Juca'
                        );
                        //faz select de categoria no banco
                        
                        $data['categorias'] = array(
                            'Fraldinha',
                            'Dente de Leite',
                            'Infanto-Juvenil',
                            'Novos',
                            'Veteranos',
                            'Master',
                            'Feminino'
                        );
                        
			$this->load->view('cadastrocampeonato', $data);
		}

		public function cadastrocampeonato(){
                        $this->form_validation->set_rules('nome','Nome','required');
                        $this->form_validation->set_rules('categoria','Categoria','required');
                        $this->form_validation->set_rules('juiz','Juiz','required');
                        $this->form_validation->set_rules('data','Data do Campeonato','required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('cadastrocampeonato');
			}else{
				$data = array();
				$data['sucesso'] = 'Campeonato cadastrado com sucesso';
				$this->load->view('cadastrocampeonato',$data);
			}
		}
	}
?>