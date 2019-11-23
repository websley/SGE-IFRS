<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professores extends CI_Controller {

		function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}


	public function index()
	{

		$dados_paginas['professores'] = $this->Professor_model->getProfessores();
		$dados_paginas['alunos'] = $this->Professor_model->getAlunosProfessores();
		//$dados_paginas['qtds_alunos'] = $this->Professor_model->getQtdAlunosProfessor($dados_paginas['professores']);
		//$dados_paginas['qtds_alunos'] = $this->Professor_model->qtdAlunoProfessor();
		
		
		$this->load->view('modal/editar_professor.php');
		$this->load->view('modal/excluir_professor.php');
		$this->load->view('modal/loading.php');

		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('professores.php', $dados_paginas);
		
	}
	
	function json_get_professor(){
			
		if (empty($_POST['id_professor'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Professor_model->getProfessorbyId($_POST['id_professor']);	
		}	
		exit(json_encode($result));
	}

	function json_editar_professor(){
		
		
					$data = array(
							'id_professor' => $_POST['id_professor'],
							'nome' => $_POST['nome'],
							'email' => $_POST['email'],
						);
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Professor_model->editarProfessor($data);	
			if($result)
				$result = array('success' => 'Professor inserido com sucesso');
		}	
		exit(json_encode($result));
		
	}
	function json_excluir_professor(){
		

		if (empty($_POST['id_professor']))
			$result = array('error' => 'ERROR');
		else{
			$result = $this->Professor_model->excluirProfessor($_POST['id_professor']);
			if($result)
				$result = array('success' => 'Professor excluido com Sucesso');
		}	
		
		exit(json_encode($result));

	}
	
	
	

}


