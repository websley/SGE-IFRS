<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
		function __construct() {
		    
		   
		
		parent::__construct();
		 
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{
		
		// Horas de estagio somadas na pagina de alunos.**
		// Campo para por a quatia de horas do estagio quando é feita a desistencia.**
		// Pagina para empresas se cadastrarem **
			//--colocar recaptcha no formulario**
			//--confirmação do cadastro por email**
			//--verificar CNPJ ja não esta cadastrado**
		// Função de gerar nova senha para as empresas**
			//-- enviar senha por email**
			//-- enviar acesso por email, para empresas cadastrdas manualmente**
		// Visualizar horas de estagio na pagina dos alunos por estagio**
		// Criar anbiente para empresas atualizarem os dados**
		
		
		$this->Estagios_model->atualizaStatus();
		
		if($_SESSION[session_prefix]['perfil'] == 1){
			

		
		//Dados da Pagina
		$dados_paginas['estagios'] = $this->Estagios_model->getEstagios();
		$dados_paginas['status'] = $this->Estagios_model->getStatus();
		
		//Dados da pagina para adicionar um novo estagio
		$dados_modal['alunos'] = $this->Aluno_model->getAlunosID();
		$dados_modal['professores'] = $this->Professor_model->getProfessores();
		$dados_modal['empresas'] = $this->Empresas_model->getEmpresasID();
		$dados_modal['supervisores'] = $this->Supervisor_model->getSupervisoresID();
		
		
		$dados_modal_documentos['documentos'] = $this->Documentos_model->get_all_docs();

		$this->load->view('modal/data_documento.php');
		$this->load->view('modal/finalizar_estagio.php');
		$this->load->view('modal/confirma_documentos.php');
		$this->load->view('modal/documentos_inicio.php',$dados_modal_documentos);
		$this->load->view('modal/registrar-desistencia.php');
		$this->load->view('modal/detalhes-estagio.php');
		$this->load->view('modal/adiciona_estagio.php',$dados_modal);
		$this->load->view('modal/editar_estagio.php',$dados_modal);
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('main', $dados_paginas);
		
		$this->load->view('modal/loading.php');
		
	} else if($_SESSION[session_prefix]['perfil'] == 2){
		
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('main_aluno');
		
		$this->load->view('modal/loading.php');
		
	}else if($_SESSION[session_prefix]['perfil'] == 4){
		
		$dados_pagina['supervisores'] = $this->Supervisor_model->getSupervisores();
		

		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('main_empresa',$dados_pagina);
		
		$this->load->view('modal/cadastro_supervisor.php');
		$this->load->view('modal/editar_supervisor.php');
		$this->load->view('modal/excluir_supervisor.php');
		
		
		$this->load->view('modal/loading.php');
		
	}
	
	
	
	
	
	}
	

	
	function main_empresa_estagios(){
		
		$dados_pagina['estagios'] = $this->Empresas_model->getEstagiosEmpresa($_SESSION[session_prefix]['id_cadastro']);
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('empresa_estagios', $dados_pagina);
		
		
	}

	function dados_empresa(){
		
		$dados_pagina['dados'] = $this->Empresas_model->getEmpresabyId($_SESSION[session_prefix]['id_cadastro']);
		
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('empresa_dados.php',$dados_pagina);
		
		
	}
	
	/*
	function pagina_cadastro_empresas(){
		
	
					$this->Adm_model->initEmail();
				$this->email->to('wesley.s.gomes@hotmail.com');
				//$this->email->cc($emails);
				$this->email->subject('Teste');
				$this->email->message('Teste de envio de email');
				
				if ($this->email->send()) {
					echo 'email enviado';
				}
				else {
					echo 'num deu ceto não';
				}
		
		
		
	}*/
	
	function detalhesEstagio(){
		
		if (empty($_POST['id_estagio'])) {
			
			echo '<div class="alert alert-danger text-center">
				<span class="glyphicon glyphicon-alert"></span>
				Ops! Ocorreu um erro desconhecido.
			</div>';
			
		}
		else {
			
			$d = $this->Estagios_model->getEstagioDetalhes($_POST['id_estagio']);
		
				echo '
				<center><h3>'.$d['nome_aluno'].'</h3></center><br/>
				
				<div class="row">';
				
				
					echo '<div class="col-md-2">
							<strong>Data inicil</strong>
						</div>
						<div class="col-md-4">
							'.$d['data_inicio'].'
						</div>
						<div class="col-md-2">
							<strong>Turno</strong>
						</div>
						<div class="col-md-4">
							'.$d['turno'].'
						</div>
						<div class="col-md-2">
							<strong>Data Termino</strong>
						</div>
						<div class="col-md-4">
							'.$d['data_termino'].'
						</div>
						<div class="col-md-2">
							<strong>CH	:</strong>
						</div>
						<div class="col-md-4">
							'.$d['carga_horaria'].'h
						</div>';
						
						
						echo '<div class="col-md-2">
							<strong>Bolsa</strong>
						</div>
						<div class="col-md-4">';
							if(!is_null($d['bolsa_aux'])){
								echo $d['bolsa_aux'];
							}else{
								echo 'NÂO';
							}
						echo '</div>';
							
							
						echo '<br><br><div class="col-md-12">
						<h5><center><strong> Objetivo do estagio </strong></h5>
						</div><br>';
					if(!is_null($d['objetivo_estagio'])){
						echo '<div class="col-md-12 text-justify">
						'.$d['objetivo_estagio'].'
						</div>';
					}else{
						
						echo '<div class="col-md-12 text-center">
							<br>O aluno ainda não informou! </div>';
					}					
					
						echo '<br><br><div class="col-md-12">
						<h5><center><strong> Atividade Prevista </strong></h5>
						</div><br>';
					if(!is_null($d['atividade_prevista'])){
						echo '<div class="col-md-12 text-center">
						'.$d['atividade_prevista'].'
						</div>';
					}else{
						
						echo '<div class="col-md-12 text-center">
							<br>O aluno ainda não informou! </div>';
					}
				
				echo '</div>';
			}
	}
	
	function json_registrar_desistencia(){
		
							$data = array(
								'horas_feitas' => $_POST['horas_feitas'],
								'id_estagio' => $_POST['id_estagio'],
								'id_aluno' => $_POST['id_aluno']
							);
						
		if (empty($_POST['id_estagio'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$this->Estagios_model->contabiliza_horas($data);
			$result = $this->Estagios_model->registrarDesistencia($data);	
			if($result)
				$result = array('success' => 'Desistencia Registrada!');
		}	
		
		exit(json_encode($result));
		
	}
	
	function json_confirmar_documentos(){
		
					$data = array(
						'id_estagio' => $_POST['id_estagio'],
						'id_aluno' => $_POST['id_aluno']
					);

		if (empty($_POST['id_estagio']))
			$result = array('error' => 'ERROR');
		else{
			$result = $this->Estagios_model->confirma_documentos($data);
			if($result)
				$result = array('success' => 'Documentos Confirmados');
		}	
		
		exit(json_encode($result));

	}
	
	function detalhesEstagioParaCertificado(){
		
				if (empty($_POST['id_estagio'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Estagios_model->getEstagioDetalhes($_POST['id_estagio']);
		}	
		exit(json_encode($result));
			
	}
	
	function json_get_estagio(){
		
		
			if (empty($_POST['id_estagio'])) 
				$result = array('error' => 'Não veio nada');
			else{
				$result = $this->Estagios_model->getEstagio($_POST['id_estagio']);
			}	
		
		exit(json_encode($result));
		
	}
	
	function json_finalizar_estagio(){
		
					$data = array(
						'id_estagio' => $_POST['id_estagio'],
						'id_aluno' => $_POST['id_aluno']
					);
		
			if (empty($_POST['id_estagio'])) 
				$result = array('error' => 'Não veio nada');
			else{
					$this->Estagios_model->contabiliza_horas($data);
					$result = $this->Estagios_model->finalizaEstagio($data);
					if($result)
						$result = array('success' => 'Estagio Finalizado com Sucesso');
			}	
		
		exit(json_encode($result));
		
	}
	
	
	
	
	


}//EOF
