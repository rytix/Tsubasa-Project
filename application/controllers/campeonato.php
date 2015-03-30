<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Campeonato extends CI_Controller{
		
		public function __construct(){
			parent::__construct();
			$this->load->model('Campeonato_model');
		}
                
                public function lista() {
                    $invoker = new invoker_model();
                    $data['title'] = 'Listagem de Campeonato';
                    $data['campeonatos'] = $invoker->get_allCampeonatosCategoria();
                    $this->load->view('listacampeonato', $data);
                }

		public function novo($id = null){
                        $this->load->model('invoker_model');
                        $invoker = new invoker_model();
                        $data['action'] = "index.php/campeonato/cadastrocampeonato";
			$data['title'] = 'Cadastro de Campeonato';
                        $data['juizes'] = $invoker->get_juizes();
                        $data['categorias'] = $invoker->get_categorias();
                        
			$this->load->view('cadastrocampeonato', $data);
		}
                
                public function excluir($id) {
                    $invoker = new invoker_model();
                    
                    $data['title'] = 'Listagem de Campeonato';
                    $data['campeonatos'] = $invoker->get_allCampeonatosCategoria();
                    $this->load->view('listacampeonato', $data);
                    
                }

		public function cadastrocampeonato(){
                        $this->load->model('invoker_model');
                        $invoker = new invoker_model();
                        $data['title'] = 'Cadastro de Campeonato';
                        $data['action'] = "index.php/campeonato/cadastrocampeonato";
                        
                        $this->form_validation->set_rules('nome','Nome','required');
                        $this->form_validation->set_rules('categoria','Categoria','required');
                        $this->form_validation->set_rules('juiz','Juiz','required');
                        $this->form_validation->set_rules('data','Data do Campeonato','required');
                        
                        $data['juizes'] = $invoker->get_juizes();
                        $data['categorias'] = $invoker->get_categorias();
                        
			if($this->form_validation->run() === FALSE){
				$this->load->view('cadastrocampeonato', $data);
			}else{
                                $post = array(
                                    'nome' => $this->input->post('nome'),
                                    'categorias' => $this->input->post('categoria'),
                                    'juiz' => $this->input->post('juiz'),
                                    'data' => $this->input->post('data'),
                                );
                                $invoker->insert_campeonato($post);
				$data['sucesso'] = 'Campeonato cadastrado com sucesso';
				$this->load->view('cadastrocampeonato',$data);
			}
		}
	}
?>