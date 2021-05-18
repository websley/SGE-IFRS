<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documentos extends CI_Controller {
	
	public function __construct(){
	
			parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}

		$this->load->database();
		require_once 'application/libraries/mpdf60/mpdf.php';
		require_once 'application/libraries/dompdf-master/lib/Cpdf.php';
	}

	public function index()
	{
		$dados_paginas['documentos'] = $this->Documentos_model->get_all_docs();
		$dados_paginas['rodapes'] = $this->Documentos_model->get_all_rodape();
	
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('configuracoes.php',$dados_paginas);
	
		$dados_modal['empresas'] = $this->Empresas_model->getEmpresasID();

		$this->load->view('modal/adicionar_rodape.php');
		$this->load->view('modal/editar_rodape.php');
		$this->load->view('modal/excluir_rodape.php');
		$this->load->view('modal/adicionar_documento.php');
		$this->load->view('modal/editar_documento.php');
		$this->load->view('modal/excluir_documento.php');
		$this->load->view('modal/cadastro_aluno.php');
		$this->load->view('modal/cadastro_professor.php');
		$this->load->view('modal/cadastro_empresa.php');
		$this->load->view('modal/cadastro_supervisor.php',$dados_modal);
				
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
	}
	
	function visualizar(){

		$html = $this->Documentos_model->get_doc($_GET['id']);	
		$mpdf=new mPDF();
		
		if($html['doc_id'] == (12 || 25 || 29)){
			$mpdf=new mPDF();
				$mpdf->SetHTMLFooter('	
				<br>
				<p style="text-align:center; font-size: 9px;"> 
					Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Campus Osório<br>
					Rua Santos Dumont, 2127 - Bairro Albatroz – Osório – RS<br>
					Fone: (51) 3601-3500   &nbsp;&nbsp;&nbsp;    Site: www.osorio.ifrs.edu.br
				</p>
			');				
		}

		$mpdf->WriteHTML($html['texto']);
		$mpdf->Output('arquivo','I');
		//$mpdf->Output('arquivo','I');
	
	}
	
	function gerarDocumento(){
		
		$documento = $this->Documentos_model->get_doc($_POST['id_doc']);
		$documento = $this->aplicaTags($_POST['id_aluno'],$documento['texto'],$_POST['data'],$_POST['numero_convenio']);
		
		if($html['doc_id'] == (12 || 25 || 29)){
			$mpdf=new mPDF();
				$mpdf->SetHTMLFooter('	
				<br>
				<p style="text-align:center; font-size: 9px;"> 
					Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Campus Osório<br>
					Rua Santos Dumont, 2127 - Bairro Albatroz – Osório – RS<br>
					Fone: (51) 3601-3500   &nbsp;&nbsp;&nbsp;    Site: www.osorio.ifrs.edu.br
				</p>
			');
		}

		$mpdf=new mPDF();
		$mpdf->WriteHTML($documento);
		$mpdf->Output('arquivo','I');
	}
	
	function aplicaTags($id, $str, $data, $numero_convenio = null) {

		$dados = $this->Documentos_model->get_dados_docs($id);
		// TAG => coluna
		$tags = array(
			'PROFESSOR_NOME' => 'professor',
			'PROFESSOR_EMAIL' => 'prof_email',
			//
			'ALUNO_NOME' => 'aluno',
			'ALUNO_CURSO' => 'curso',
			'ALUNO_TURMA' => 'turma',
			'ALUNO_EMAIL' => 'email_aluno',
			'ALUNO_CELULAR' => 'celular',
			'ALUNO_TELEFONE' => 'telefone_aluno',
			'ALUNO_UF' => 'uf',
			'ALUNO_CIDADE' => 'cidade_aluno',
			'ALUNO_CEP' => 'CEP',
			'ALUNO_ENDERECO' => 'endereco_aluno',
			'ALUNO_DATA_NASCIMENTO' => 'data_nascimento',
			'ALUNO_CPF' => 'cpf',
			'ALUNO_DATAEX' => 'data_expedicao',
			'ALUNO_ORG' => 'orgao_expedidor',
			'ALUNO_RG' => 'rg',
			'ALUNO_BAIRRO' => 'bairro',
			//
			'EMPRESA_RAZAO' => 'razao_social',
			'EMPRESA_NOME' => 'nome_empresa',
			'EMPRESA_ENDERECO' => 'endereco_empresa',
			'EMPRESA_CNPJ' => 'cnpj',
			'EMPRESA_RAMO_ATIVIDADE' => 'ramo_atividade',
			'EMPRESA_EMAIL' => 'email_empresa',
			'EMPRESA_CIDADE' => 'cidade_empresa',
			'EMPRESA_TELEFONE' => 'telefone_empressa',
			'EMPRESA_REPRESENTANTE_LEGAL' => 'rep_legal',
			'EMPRESA_REPRESENTANTE_CARGO' => 'rep_cargo',
			'EMPRESA_REPRESENTANTE_CPF' => 'rep_cpf',
			'EMPRESA_REPRESENTANTE_RG' => 'rep_rg',
			'EMPRESA_REPRESENTANTE_DATA_EXPEDICAO' => 'rep_data_expedido',
			'EMPRESA_REPRESENTANTE_ORGAO_EMISSOR' => 'rep_orgao_emissor',
			//
			'SUPER_NOME' => 'nome_super',
			'SUPER_FORMACAO' => 'formacao',
			'SUPER_EMAIL' => 'email_super',
			'SUPER_TELEFONE' => 'telefone_super',
			//
			'HORAS_DIARIA' => 'carga_horaria_dia',
			'HORAS_TOTAL' => 'carga_horaria',
			'AUXILIO' => 'bolsa_aux',
			//
			'AGENTE_INTEGRAGAO' => 'agente_integracao',
		);				
				
		foreach ($tags as $tag => $col) {
			if (isset($dados[$col])) {
				$str = str_replace('{'.$tag.'}', $dados[$col], $str);
			}else{
				$str = str_replace('{'.$tag.'}', ' ', $str);
			}
		}
				
		if (!empty($dados['obrigatorio'])) {
			$str = str_replace('OBRIGATORIO_NAO', '  ', $str);
			$str = str_replace('OBRIGATORIO_SIM', ' X ', $str);
		}else{
			$str = str_replace('OBRIGATORIO_NAO', ' X ', $str);
			$str = str_replace('OBRIGATORIO_SIM', '  ', $str);	
		}
	
		$str = str_replace('{DATA_INICIO}', date('d/m/Y' ,strtotime($dados['data_inicio'])), $str);
		$str = str_replace('{DATA_TERMINO}', date('d/m/Y' ,strtotime($dados['data_termino'])), $str);
					
		 
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		
		if (@!empty($data)) {
			$str = str_replace('{DATA}', utf8_encode(strftime(' %d de %B de %Y', strtotime($data))), $str);
			$str = str_replace('{DATA_ABREVIADA}', utf8_encode(strftime('d/m/Y', strtotime($data))), $str);
		}

		if (@!empty($numero_convenio)) {
			$str = str_replace('{NUMERO_CONVENIO}', $numero_convenio, $str);
		}
		
		return $str;		
	}
	
	function json_novo_doc(){
		
		$data = array(
			'titulo' => $_POST['documento'],
			'texto' => $_POST['texto']
		);

		if (empty($_POST['documento'])) {
			$result = array('error' => 'Não veio nada');
		}else{
			$result = $this->Documentos_model->novo_doc($data);	
	
			if($result)
				$result = array('success' => 'Documento adicionado com Sucesso!!');
		}	
	
		exit(json_encode($result));	
	}
	

	function json_get_doc(){
		
		if (empty($_POST['doc_id'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Documentos_model->get_dooc($_POST['doc_id']);
		}	
		exit(json_encode($result));
		
	}
	
	function json_editar_doc(){
		
		$data = array(
			'titulo' => $_POST['titulo'],
			'texto' => $_POST['texto'],
			'doc_id' => $_POST['doc_id']
		);
						
	if (empty($_POST['titulo'])) 
			$result = array('error' => 'ERRO!!');
		else{
			$result = $this->Documentos_model->editar_doc($data);	
			if($result)
				$result = array('success' => 'Documento editado com Sucesso!!');
		}	
		exit(json_encode($result));
		
	}
	
	function json_excluir_doc(){
		
		if (empty($_POST['doc_id'])) 
			$result = array('error' => 'ERRO!!');
		else{
			$result = $this->Documentos_model->excluir_doc($_POST['doc_id']);	
			if($result)
				$result = array('success' => 'Documento Excluido com Sucesso!!');
		}	
		exit(json_encode($result));
		
	}
	
	function json_get_rodape(){

		if (empty($_POST['rodape_id'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Documentos_model->get_rodape($_POST['rodape_id']);
		}	
		exit(json_encode($result));
		
	}
	
	
	function json_novo_rodape(){
		
		$data = array(
			'titulo' => $_POST['documento'],
			'texto' => $_POST['texto']
		);
						
		var_dump($data);
						
	
		if (empty($_POST['documento'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->Documentos_model->novo_rodape($data);	
			if($result)
				$result = array('success' => 'Documento adicionado com Sucesso!!');
		}	
		exit(json_encode($result));
		
	}
	

	function json_editar_rodape(){
		
		$data = array(
			'titulo' => $_POST['titulo'],
			'texto' => $_POST['texto'],
			'rodape_id' => $_POST['rodape_id']
		);
						
		if (empty($_POST['titulo'])) 
			$result = array('error' => 'ERRO!!');
		else{
			$result = $this->Documentos_model->editar_rodape($data);	
			if($result)
				$result = array('success' => 'Rodapé editado com Sucesso!!');
		}	

		exit(json_encode($result));
	}

	function json_excluir_rodape(){
		
		if (empty($_POST['rodape_id'])) 
			$result = array('error' => 'ERRO!!');
		else{
			$result = $this->Documentos_model->excluir_rodape($_POST['rodape_id']);	
			if($result)
				$result = array('success' => 'Rodapé Excluido com Sucesso!!');
		}	
		exit(json_encode($result));
		
	}
	
	function json_atribuir_tipo(){
		
		if (empty($_POST['tipo'])) 
			$result = array('error' => 'ERRO!!');
		else{
			$result = $this->Documentos_model->atribui_tipo($_POST['doc_id'],$_POST['tipo']);	
			if($result)
				$result = array('success' => 'Tipo de documentos confirmado!!');
		}	
		exit(json_encode($result));
		
	}
	
} // end of file