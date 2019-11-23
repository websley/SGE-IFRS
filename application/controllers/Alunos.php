<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alunos extends CI_Controller {
	
			function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{
		
		$dados_paginas['alunos'] = $this->Aluno_model->getAlunos();

		$this->load->view('modal/editar_aluno.php');
		$this->load->view('modal/excluir_aluno.php');
		$this->load->view('modal/loading.php');
		$this->load->view('modal/detalhes_horas.php');

		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('alunos',$dados_paginas);


	}
	
	function json_get_aluno(){
			
		if (empty($_POST['id_aluno'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Aluno_model->getAlunobyId($_POST['id_aluno']);	
		}	
		exit(json_encode($result));
	}

	function json_editar_aluno(){
		
		
					$data = array(
							'id_aluno' => $_POST['id_aluno'],
							'nome' => $_POST['nome'],
							'email' => $_POST['email'],
							'cpf' => $_POST['cpf'],
							'turma' => $_POST['turma'],
							'curso' => $_POST['curso'],
							'rg' => $_POST['rg'],
							'data_nascimento' => $_POST['data_nascimento'],
							'orgao_expedidor' => $_POST['orgao_expedidor'],
							'data_expedicao' => $_POST['data_exp'],
							'telefone' => $_POST['telefone'],
							'celular' => $_POST['celular'],
							'CEP' => $_POST['CEP'],
							'cidade' => $_POST['cidade'],
							'bairro' => $_POST['bairro'],
							'endereco' => $_POST['endereco'],
							'uf' => $_POST['uf']
						);
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Aluno_model->editarAluno($data);	
			if($result)
				$result = array('success' => 'Professor inserido com sucesso');
		}	
		exit(json_encode($result));
		
	}
	
	function json_detalhes_horas(){
		
		if (empty($_POST['id_aluno'])) {
			
			echo '<div class="alert alert-danger text-center">
				<span class="glyphicon glyphicon-alert"></span>
				Ops! Ocorreu um erro desconhecido.
			</div>';
			
		}
		else {
			
			$dados = $this->Aluno_model->detalhesHoras($_POST['id_aluno']);
		

			echo '				
					<div class="conteiner">
					
					<table class="table">
			  <thead>
				<tr>
				  <th scope="col">Carga Horaria</th>
				  <th scope="col">Empresa</th>
				  <th scope="col">Data</th>
				  <th scope="col">Status</th>
				</tr>
			  </thead>
			  <tbody>';
			  foreach($dados as $d){
				  
				echo '<tr>
				  <td>'.$d['carga_horaria'].'</td>
				  <td>'.$d['nome'].'</td>
				  <td>'.date('d/m/Y' ,strtotime($d['data_inicio'])).' á '. ($d['id_status'] == 5 ?  date('d/m/Y' ,strtotime($d['data_desistencia'])) :  date('d/m/Y' ,strtotime($d['data_termino'])) ).'</td>
				  <td>'. ($d['id_status'] == 4 ? 'Finalizado' : 'Desistencia' ) .'</td>
				</tr>';
				
			  }
				
			  echo '</tbody>
			</table>
			</div>';
		}
		
	}
		
	function json_excluir_aluno(){
		

		if (empty($_POST['id_aluno']))
			$result = array('error' => 'ERROR');
		else{
			$result = $this->Aluno_model->excluirAluno($_POST['id_aluno']);
			if($result)
				$result = array('success' => 'Aluno excluido com Sucesso');
		}	
		
		exit(json_encode($result));

	}
	





}//EOF
