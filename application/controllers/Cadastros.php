<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cadastros extends CI_Controller {
	
			function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{		
		$dados_paginas['empresas'] = $this->Empresas_model->getEmpresasID();

		
		//$this->load->view('modal/cadastro_aluno.php');
		$this->load->view('modal/cadastro_aluno2.php');
		$this->load->view('modal/loading.php');
		$this->load->view('modal/adicionar_documento.php');
		$this->load->view('modal/cadastro_professor.php');
		$this->load->view('modal/cadastro_empresa.php');
		$this->load->view('modal/cadastro_supervisor.php',$dados_paginas);
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('cadastros.php');
		
	}
	function json_cadastro_professor(){
						
		$data = array(
			'nome' => $_POST['nome'],
			'email' => $_POST['email'],
		);
							
		$verifica = $this->Adm_model->verificao_professor($_POST['email'],$_POST['nome']);

			if(empty($verifica)){
				$result = $this->Professor_model->cadastraProfessor($data);	
							if($result)
								$result = array('success' => 'Professor cadastrado com sucesso');
			}
			else
				$result = array('error' => 'Professor ja é cadastrado no sistema');
		
		exit(json_encode($result));
	}
	
	
	
	function json_cadastro_aluno(){
		
		$data = array(
			'nome' => $_POST['nome'],
			'email' => $_POST['email'],
			'cpf' => $_POST['cpf'],
			'turma' => $_POST['turma'],
			'curso' => $_POST['curso'],
			'rg' => $_POST['rg'],
			'data_nascimento' => $_POST['data_nascimento'],
			'orgao_expedidor' => $_POST['orgao_exp'],
			'data_expedicao' => empty($_POST['data_exp']) ? null : $_POST['data_exp'],
			'telefone' => $_POST['telefone'],
			'celular' => $_POST['celular'],
			'CEP' => $_POST['CEP'],
			'cidade' => $_POST['cidade'],
			'bairro' => $_POST['bairro'],
			'endereco' => $_POST['endereco'],
			'uf' => $_POST['uf'],
		);
			
		$verifica = $this->Adm_model->verificao_aluno($_POST['cpf'],$_POST['nome'],$_POST['rg']);
		if(empty($verifica)){
					$result = $this->Adm_model->cadastraAluno($data);		
								if($result)
									$result = array('success' => 'Aluno inserido com sucesso');
			}
			else
				$result = array('error' => 'Aluno ja é cadastrado no sistema');

		
		exit(json_encode($result));
		
	}
	
	
		function json_cadastro_empresa(){
		
		$data = array(
			'nome' => $_POST['nome'],
			'razao_social' => $_POST['razao_social'],
			'email' => $_POST['email'],
			'cnpj' => $_POST['cnpj'],
			'cidade' => $_POST['cidade'],
			'ramo_atividade' => $_POST['ramo_atividade'],
			'telefone' => $_POST['telefone'],
			'endereco' => $_POST['endereco'],
			'rep_legal' => $_POST['representante_legal'],
			'rep_cargo' => $_POST['cargo_representante'],
			'rep_rg' => $_POST['rg_representante_legal'],
			'rep_orgao_emissor' => $_POST['orgao_exp_representante_legal'],
			'rep_data_expedido' => $_POST['data_exp_representante_legal'],							
			'rep_cpf' => $_POST['cargo_representante_cpf'],
		);
						
		$verifica = $this->Adm_model->verificao_empresa($_POST['razao_social'],$_POST['cnpj']);

		if(empty($verifica)){
			$result = $this->Empresas_model->cadastraEmpresa($data);		
				if($result)
					$result = array('success' => 'Empresa cadastrada com sucesso');
			}
			else
				$result = array('error' => 'Empresa ja é cadastrado no sistema');			

		exit(json_encode($result));
	}
	
	function json_cadastro_supervisor(){
	
		$data = array(
			'nome' => $_POST['nome'],
			'id_empresa' =>  empty($_POST['id_empresa']) ? $_SESSION[session_prefix]['id_cadastro'] : $_POST['id_empresa'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'formacao' => $_POST['formacao'],
		);
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Empresas_model->cadastraSupervisor($data);	
			if($result)
				$result = array('success' => 'Supervisor cadastrado com sucesso');
		}	
		exit(json_encode($result));
		
	}
	
	function json_pesquisa_supervisores(){
						
		if (empty($_POST['empresa'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Empresas_model->pesquisaSupervisores($_POST['empresa']);
		}	
		
		exit(json_encode($result));
	}

	//* Adiciona Estagios
	//* Trata as informações do formulario e envia para o model fazer a inserção no bando de dados.
	function json_adiciona_estagios(){

		$data = array(
			'id_aluno' => $_POST['aluno'],
			'id_professor' => $_POST['professor'],
			'id_empresa' => $_POST['empresa'],
			'id_supervisor' => empty($_POST['supervisor']) ? null : $_POST['supervisor'],
			'id_status' => 1,
			'carga_horaria' => empty($_POST['ch']) ? null : $_POST['ch'],
			'carga_horaria_dia' => empty($_POST['ch_dia']) ? null : $_POST['ch_dia'],
			'data_inicio' => $_POST['data_ini'],
			'data_termino' => $_POST['data_fim'],
			'turno' => empty($_POST['turno']) ? null : $_POST['turno'],
			'atividade_prevista' => empty($_POST['atv_pre']) ? null : $_POST['atv_pre'],
			'id_agente_integracao' => empty($_POST['agente']) ? null : $_POST['agente'],
			'agente_integracao' => null,
			'remuneracao' => empty($_POST['remuneracao']) ? null : $_POST['remuneracao'],
			'alimentacao' => empty($_POST['alimentacao']) ? null : $_POST['alimentacao'],
			'transporte' => empty($_POST['transporte']) ? null : $_POST['transporte'],
			'obrigatorio' => empty($_POST['obrigatorio']) ? null : $_POST['obrigatorio']
		);
		// var_dump($data);
		// die();
		if (empty($_POST['aluno'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Estagios_model->cadastraEstagio($data);	
			if($result)
				$result = array('success' => 'Estagio adicionado !!');
					
		}	
		exit(json_encode($result));
	}
	
	function json_verifica_existente(){
									
		$result = $this->Adm_model->verificao($_POST['cpf'],$_POST['nome'],$_POST['rg']);

		if(empty($result))
			$result = array('success' => ' ');
		else
			$result = array('error' => 'Aluno ja é cadastrado no sistema');
			
		$result = array('success' => ' ');

		exit(json_encode($result));
	}
	
	function json_editar_estagios(){
		
		$data = array(
			'id_estagio' => $_POST['id_estagio'],
			'id_aluno' => $_POST['aluno'],
			'id_professor' => $_POST['professor'],
			'id_empresa' => $_POST['empresa'],
			'id_supervisor' => empty($_POST['supervisor']) ? null : $_POST['supervisor'],
			'id_agente_integracao' => empty($_POST['agente']) ? null : $_POST['agente'],
			'carga_horaria' => empty($_POST['ch']) ? null : $_POST['ch'],
			'carga_horaria_dia' => empty($_POST['ch_dia']) ? null : $_POST['ch_dia'],
			'data_inicio' => $_POST['data_ini'],
			'data_termino' => $_POST['data_fim'],
			'turno' => empty($_POST['turno']) ? null : $_POST['turno'],
			'atividade_prevista' => empty($_POST['atv_pre']) ? null : $_POST['atv_pre'],
			'agente_integracao' => empty($_POST['agente']) ? null : $_POST['agente'],
			'remuneracao' => empty($_POST['remuneracao']) ? null : $_POST['remuneracao'],
			'alimentacao' => empty($_POST['alimentacao']) ? null : $_POST['alimentacao'],
			'transporte' => empty($_POST['transporte']) ? null : $_POST['transporte'],
			'obrigatorio' => empty($_POST['obrigatorio']) ? null : $_POST['obrigatorio']
		);
						
		if (empty($_POST['aluno'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Estagios_model->editarEstagio($data);	
			if($result)
				$result = array('success' => 'Estagio adicionado !!');
		}	
		exit(json_encode($result));
	}
	
	function json_editar_supervisor(){
		
		$data = array(
			'nome' => $_POST['nome'],
			'id_empresa' =>  empty($_POST['id_empresa']) ? $_SESSION[session_prefix]['id_cadastro'] : $_POST['id_empresa'],
			'email' => $_POST['email'],
			'telefone' => $_POST['telefone'],
			'formacao' => $_POST['formacao'],
		);
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Empresas_model->editarSupervisor($data);	
			if($result)
				$result = array('success' => 'Supervisor cadastrado com sucesso');
		}	
		exit(json_encode($result));

	}
}//EOF
	
?>