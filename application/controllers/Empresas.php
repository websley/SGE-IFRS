<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {
	
			function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{		
	
		$dados_paginas['empresas'] = $this->Empresas_model->getEmpresas();
		$dados_paginas['estagiarios'] = $this->Empresas_model->getEstagiosEmpresas();
		$dados_paginas['qtds_alunos'] = $this->Empresas_model->qtdEstagioEmpresa();
		
		$this->load->view('modal/editar_empresa.php');
		$this->load->view('modal/excluir_empresa.php');
		$this->load->view('modal/loading.php');
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('empresas.php', $dados_paginas);
		
	}
	
	function json_get_empresa(){
			
		if (empty($_POST['id_empresa'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Empresas_model->getEmpresabyId($_POST['id_empresa']);	
		}	
		exit(json_encode($result));
	}

	function json_editar_empresa(){
		
		
					$data = array(
							'id_empresa' => $_POST['id_empresa'],
							'nome' => $_POST['nome'],
							'email' => $_POST['email'],
							'cnpj' => $_POST['cnpj'],
							'razao_social' => $_POST['razao_social'],
							'cidade' => $_POST['cidade'],
							'ramo_atividade' => $_POST['ramo_atividade'],
							'telefone' => $_POST['telefone'],
							'endereco' => $_POST['endereco'],
							'representante_legal' => $_POST['representante_legal'],
							'cargo_representante' => $_POST['cargo_representante'],
							'rep_rg' => $_POST['rg_representante_legal'],
							'rep_orgao_emissor' => $_POST['orgao_exp_representante_legal'],
							'rep_data_expedido' => $_POST['data_exp_representante_legal'],							
							'rep_cpf' => $_POST['representante_cpf'],
						);
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Empresas_model->editarEmpresa($data);	
			if($result)
				$result = array('success' => 'Professor atualizado com sucesso');
		}	
		exit(json_encode($result));
		
	}
	
	// Gera uma nova senha numerica randomicamente e envia por email
	function json_nova_senha(){
			
			$senha = mt_rand(10000,99999);
			
				$this->Adm_model->initEmail();
				$this->email->to($_POST['email']);
				//$this->email->cc($emails);
				$this->email->subject('');
				$this->email->message('Olá. <br> Sua senha foi modificada, voce pode acessar o sistema de estagio do IFRS - Campus osorio
				com a senha = "'.$senha.'",<br>');
				
				$this->db->set('senha', md5($senha));
				$this->db->where('id_cadastro', $_POST['id_empresa']);
				$result = $this->db->update('usuarios');
				
				if ($this->email->send() && $result) {
					$result = array('success' => ' Email Enviado ');
				}
				else {
					//echo $this->email->print_debugger();
					$result = array('error' => ' ERROR !');
				}
				
				exit(json_encode($result));

	}
	
	function json_editar_dados_empresa(){
		
			if (empty($_POST))
			$result = array('error' => 'ERROR');
		else{
			$result = $this->Empresas_model->editarDadosEmpresa($_POST);
			if($result)
				$result = array('success' => 'Dados Editados');
		}	
		
		exit(json_encode($result));
		
	}
	
	function json_excluir_empresa(){
		

		if (empty($_POST['id_empresa']))
			$result = array('error' => 'ERROR');
		else{
			$result = $this->Empresas_model->excluirEmpresa($_POST['id_empresa']);
			if($result)
				$result = array('success' => 'Empresa excluida com Sucesso');
		}	
		
		exit(json_encode($result));

	}
	
	
	

	
	
}
	
?>