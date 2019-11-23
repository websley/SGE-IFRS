<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supervisores extends CI_Controller {
	
			function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{		
	
		$dados_modal['empresas'] = $this->Empresas_model->getEmpresasID();
	
		//$dados_paginas['qtd_estagio_super'] = $this->Supervisor_model->qtdEstagioSupervisor();
		$dados_paginas['supervisores'] = $this->Supervisor_model->getSUpervisores();
		
		$this->load->view('modal/editar_supervisor.php',$dados_modal);
		$this->load->view('modal/excluir_supervisor.php');
		$this->load->view('modal/loading.php');
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('supervisores.php', $dados_paginas);
		
	}
	
	
	function json_get_supervisor(){
		
		if (empty($_POST['id_supervisor'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Empresas_model->getSupervisorbyId($_POST['id_supervisor']);	
		}	
		exit(json_encode($result));

	}
	
		function json_editar_supervisor(){
			
		
							$data = array(
							'id_supervisor' => $_POST['id_supervisor'],
							'nome' => $_POST['nome'],
							'id_empresa' =>  empty($_POST['id_empresa']) ? $_SESSION[session_prefix]['id_cadastro'] : $_POST['id_empresa'],
							'email' => $_POST['email'],
							'telefone' => $_POST['telefone'],
							'formacao' => $_POST['formacao'],
						);
	
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Supervisor_model->editarSupervisor($data);	
			if($result)
				$result = array('success' => 'Supervisor editado com sucesso');
		}	
		exit(json_encode($result));
		
	}
	
	function json_excluir_supervisor(){
		

		if (empty($_POST['id_supervisor']))
			$result = array('error' => 'ERROR');
		else{
			$result = $this->Supervisor_model->excluirSupervisor($_POST['id_supervisor']);
			if($result)
				$result = array('success' => 'Supervisor Excluido com Sucesso');
		}	
		
		exit(json_encode($result));

	}
	

	

	
	
}
	
?>