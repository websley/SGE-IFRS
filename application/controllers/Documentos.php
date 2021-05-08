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
				//use Dompdf\Dompdf;
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
		
		//$dados_paginas['docucmentos'] = $this->Documentos_model->get_all_docs();
		
		
				setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		

		
		/*
			switch ($_POST['id_doc']) {
		case 2:
			$this->termoCompromissoEstagio($_POST['id_aluno'],$_POST['data']);
			break;
		case 1:
			$this->termoProfessor($_POST['id_aluno'],$_POST['data']);
			break;
		case 3:
			$this->planoAtividadeEstagio($_POST['id_aluno'],$_POST['data']);
			break;
		case 4:
			$this->confirmacaoEstagioEmpresa($_POST['id_aluno'],$_POST['data']);
			break;
		case 5:
			$this->avaliacaoEstagioProfessor($_POST['id_aluno'],$_POST['data']);
			break;
		case 6:
			$this->avaliacaoEstagioEmpresa($_POST['id_aluno'],$_POST['data']);
			break;
		case 7:
			$this->acompanhamentoEstagio($_POST['id_aluno'],$_POST['data']);
			break;
		case 8:
			$this->declaracaoExperoencia($_POST['id_aluno'],$_POST['data']);
			break;

			}
//utf8_encode(strftime(' %d de %B de %Y', strtotime($data)))
*/
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
		
		$documento = $this->aplicaTags($_POST['id_aluno'],$documento['texto'],$_POST['data']);
		
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
	
	function aplicaTags($id, $str, $data) {
			
		//$dados = $this->Adm_model->getDadosAluno($id);
		//$dados = $this->Adm_model->getDadosCompromissoDeEstagio($id);
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
			
		);
		// $sexo == "Masculino" ? "Você é homem" : "Você é mulher" 
				
				
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
			//$str = str_replace('{HORA_PROVA}', $e[1], $str);
		}
		


		return $str;
				
	}
		

	
	
	function json_novo_doc(){
		
					$data = array(
							'titulo' => $_POST['documento'],
							'texto' => $_POST['texto']
						);

	if (empty($_POST['documento'])) 
			$result = array('error' => 'Não veio nada');
		else{
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
	
	
	
	
	
	
	function termoProfessor($id,$data){



		$dados = $this->Adm_model->getDadosAluno($id);


					$html2 = '<html>
							<head>
							<meta content="text/html; charset=UTF-8" http-equiv="content-type">
							<style type="text/css">
							@import url("https://themes.googleusercontent.com/fonts/css?kit=wAPX1HepqA24RkYW1AuHYA");ol{margin:0;padding:0}table td,table th{padding:0}.c0{color:#000000;
							font-weight:400;text-decoration:none;vertical-align:baseline;font-size:8pt;font-family:"Calibri";font-style:normal}.c4{color:#000000;font-weight:400;text-decoration:none;
							vertical-align:baseline;font-size:14pt;font-family:"Calibri";font-style:normal}.c5{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;
							font-family:"Calibri";font-style:normal}.c10{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:10pt;font-family:"Calibri";font-style:normal}
							.c1{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left;height:12pt}.c3{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:right;height:12pt}
							.c2{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:center}.c9{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left}.c11{padding-top:0pt;padding-bottom:0pt;
							line-height:1.0;text-align:justify}.c6{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:right}.c7{background-color:#ffffff;max-width:481.8pt;padding:51pt 56.7pt 35.6pt 56.7pt}
							.c8{height:12pt}.title{padding-top:24pt;color:#000000;font-weight:700;font-size:36pt;padding-bottom:6pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}
							.subtitle{padding-top:18pt;color:#666666;font-size:24pt;padding-bottom:4pt;font-family:"Georgia";line-height:1.0;page-break-after:avoid;font-style:italic;text-align:left}li{color:#000000;
							font-size:12pt;font-family:"Times New Roman"}p{margin:0;color:#000000;font-size:12pt;font-family:"Times New Roman"}h1{padding-top:24pt;color:#000000;font-weight:700;font-size:24pt;
							padding-bottom:6pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h2{padding-top:18pt;color:#000000;font-weight:700;font-size:18pt;
							padding-bottom:4pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h3{padding-top:14pt;color:#000000;font-weight:700;font-size:14pt;
							padding-bottom:4pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h4{padding-top:12pt;color:#000000;font-weight:700;font-size:12pt;
							padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h5{padding-top:11pt;color:#000000;font-weight:700;font-size:11pt;
							padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h6{padding-top:10pt;color:#000000;font-weight:700;font-size:10pt;
							padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}</style>
							</head>
							<body class="c7">
							<div>
								<p class="c6">
									<span class="c5">Via Setor de Est&aacute;gios</span>
								</p>
							</div>
							<p class="c9">
								<span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
									<img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
								</span>
							</p>
							<p class="c2">
								<span class="c4">Termo de Informa&ccedil;&atilde;o</span>
							</p>
							<p class="c2">
								<span class="c4">(PROFESSOR ORIENTADOR)</span>
							</p>
							<p class="c1"><span class="c5"></span></p><a id="id.gjdgxs"></a>
							<p class="c11">
							<br><br>
								<span class="c5">Eu, professor '.$dados['professor'].' informo que estarei orientando o(a) aluno(a) '.$dados['aluno'].' do curso '.$dados['curso'].'da turma '.$dados['turma'].' , no est&aacute;gio obrigat&oacute;rio no ano de '. date("Y").' .</span>
							</p>
							<p class="c1"><span class="c5"></span></p>
							<p class="c1"><span class="c5"></span></p>
							<p class="c1"><span class="c5"></span></p>
							<p class="c1"><span class="c5"></span></p><a id="id.30j0zll"></a>
							<p class="c6">
								<span class="c5">Osório, '.(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
					 .'.</span>
							</p>
							<p class="c3"><span class="c5"></span></p>
							<p class="c3"><span class="c5"></span></p>
							<p class="c2">
								<span class="c5">_________________________________________</span></p>
							<p class="c2">
							<span class="c5">Assinatura do Professor Orientador</span></p>
						<p class="c2 c8"><span class="c5"></span></p><p class="c2 c8"><span class="c5"></span></p><p class="c2"><span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 50.07px; height: 34.67px;">
						<br><br>
						<p>-------------------------------------------------------------------------------------------------------------------------------------------</p>
						<br><br>
						</span></p><p class="c2 c8"><span class="c5"></span></p>
						<p class="c6"><span class="c5">Via Setor de Registros</span></p>
						<p class="c6"><span class="c0">(via necess&aacute;ria para realizar matr&iacute;cula na disciplina de est&aacute;gio, &nbsp;junto ao setor de Registros)</span></p>
						<p class="c6"><span class="c0">(SRA &ndash; Cadastrar no SIA o aluno com o respectivo professor orientador)</span></p>
						<p class="c9"><span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
						<img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title=""></span></p>
						<p class="c2"><span class="c4">Termo de Informa&ccedil;&atilde;o</span></p>
						<p class="c2"><span class="c4">(PROFESSOR ORIENTADOR)</span></p><p class="c1"><span class="c5"></span></p>
						<p class="c11">
						<br><br>
						<span class="c5">Eu, professor '.$dados['professor'].' informo que estarei orientando o(a) aluno(a) '.$dados['aluno'].' do curso '.$dados['curso'].' da turma  '.$dados['turma'].' , no est&aacute;gio obrigat&oacute;rio no ano de '. date("Y").' .</span></p>
					<p class="c1"><span class="c5"></span></p><p class="c1"><span class="c10"></span></p><p class="c1"><span class="c5"></span></p>
					<p class="c6"><span class="c5">
					Osório,
					 '.
					(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
					
					.
					
					'.</span></p><p class="c3"><span class="c5"></span></p><p class="c3"><span class="c5"></span></p>
					<p class="c2"><span class="c5">_________________________________________</span></p>
					<p class="c2"><span class="c5">Assinatura do Professor Orientador</span></p></body></html>';

				$mpdf=new mPDF();
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');
			
	}

	function termoCompromissoEstagio($id,$data){
		
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		
		

		$dados = $this->Adm_model->getDadosCompromissoDeEstagio($id);
		
		$html2 = '<html>
							    <head>
					        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
					            <style type="text/css">
								
									.titulo{
									text-align: center !important;
									font-weight: bold;
									font-size:16px;
								}
									

								.data{				
									text-align:right !important;
									font-size: 11px;
								}


								p{
									font-size: 10.5px;
									text-align: justify;
									font-family: Calibri;	
								}
								
								.intro{
									font-size: 11px;
								}
								
								.corecao{
									letter-spacing: 1px !important;
								}
								
								.assinatura{
									font-size: 12px;
								}
								
								.tabelas{
									border-collapse: collapse;
									border: 1px solid black;
									width: 100%;
									text-align; center;
									font-family: 12px;
								}
								
								.dentroTable{
									  padding: 4px;
									  text-align: center;
									  font-family:Calibri
								}
								
								.info{
									font-size:11.5px;
									font-family:Calibri;
									margin: 0px,0px,0px,0px;
									padding:none !important; 
								}
								
							.none{
							  border: none !important;
							  border-collapse: none !important;
							  padding:none !important; 
							  font-size:none !important;
							  text-align:none !important;
							  font-family:none !important;
							}
							
							.recuo{
								text-indent: 4em;
								margin: 0px,0px,0px,0px;
								font-size: 11.5px;
								text-align: justify;
								font-family: Calibri;
							}
														
					</style>
				</head>
			<body>
			
			<table width="100%">
				<tr>
					<td>
						<span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
							<img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
						</span>
					</td>
					<td text-align="left">
						<span align="center" style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 114.93px; height: 52.20px;">
							<img alt="" src="'.base_url('public/img/image2.png').'" style="width: 114.93px; height: 52.20px; margin-left: 0.00px; margin-top: 0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
						</span>
					</td>
				</tr>
			</table>
			
			<p class="titulo">
				TERMO DE COMPROMISSO DE ESTÁGIO
			</p>
			
			<p class="intro">
			As partes abaixo qualificadas celebram entre si este TERMO DE COMPROMISSO DE ESTÁGIO, nos termos da Lei nº 11.788, 
			de 25 de setembro de 2008, Lei nº 9.394, de 20 de dezembro de 1996 e no que couber da lei nº  8.666, de 21 de junho de 1993,
			e demais disposições aplicáveis, mediante as seguintes cláusulas e condições:
			<p>
			
			<table class="tabelas">
				<tr>
					<td class="dentroTable">
						
						DADOS DO IFRS – CAMPUS OSÓRIO
						
					</td>
				</tr>
			</table>

			<p style=" margin-top: 0px;">
			
			CNPJ:  10.637.926/0007-31 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Rua Santos Dumont, 2127 – Albatroz - &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Osório/RS  &nbsp;&nbsp;  – 	CEP 95520-000
			<br>
			Telefone:   (51)   36013500	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Representante Legal: Claudino Andrighetto  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Cargo: Diretor-Geral
			</p>
			
			<table class="tabelas">
				<tr>
					<td class="dentroTable">
							DADOS DA CONCEDENTE
					</td>
				</tr>
			</table>
			
			
			<p style="margin-top: 0px; margin-bottom:0px;">
				Razão Social: '.$dados['razao_social'].' <br>
				CNPJ:  '.$dados['cnpj'].'
			</p>
			<table width="700px" class="info">
				<tr>
					<td width="300px" class="info"> Ramo de Atividade:  '.$dados['ramo_atividade'].'</td>
					<td class="info">Cidade:  '.$dados['cidade_empresa'].'</td>
				</tr>
				<tr>
					<td class="info">E-mail: '.$dados['email_empresa'].'</td>
					<td class="info">Telefone:  '.$dados['telefone_empressa'].'</td>
				</tr>
				<tr>
					<td class="info">Representante legal:  '.$dados['rep_legal'].'</td>
					<td class="info">Cargo:  '.$dados['rep_cargo'].'</td>
				</tr>
			</table>
			_______________________________________________________________________________________________________
			<table class="info" width="700px">
				<tr>
					<td  colspan="2" >
						Supervisor do Estágio (empresa):  '.$dados['nome_super'].' 
					</td>
				</tr>
				<tr>
					<td  colspan="2" >
						Formação do Supervisor:  '.$dados['formacao'].'
					</td>
				</tr>
				<tr>
					<td width="300px">
						E-mail:  '.$dados['email_super'].'
					</td>
					<td   >
						Telefone: '.$dados['telefone_super'].'
					</td>
				</tr>
			</table>
			
			
			<table class="tabelas">
				<tr>
					<td class="dentroTable">		
							DADOS DO ESTAGIÁRIO
					</td>
				</tr>
			</table>

			<table class="info" width="700px">
				<tr width="300px">
					<td  colspan="3">
						Nome:  '.$dados['nome'].'
					</td>
				</tr>
				<tr>
					<td>
						RG: '.$dados['rg'].'
					</td>
					<td>
						Órgão Expedidor:  '.$dados['orgao_expedidor'].'
					</td>
					<td>
						Data de Expedição:  '.$dados['data_expedicao'].'
					</td>
				</tr>
				<tr>
					<td>
						CPF: '.$dados['cpf'].'
					</td>
					<td colspan="2">
						Data de Nascimento:  '.$dados['data_nascimento'].'
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Endereço:  '.$dados['endereco_aluno'].'
					</td>
					<td>
						Bairro:  '.$dados['bairro'].'
					</td>
				</tr>
				<tr>
					<td>
						CEP:  '.$dados['cep_aluno'].'
					</td>
					<td >
						CIDADE:  '.$dados['cidade_aluno'].'
					</td>
					<td>
						UF:  '.$dados['uf'].'
					</td>
				</tr>
				<tr>
					<td>
						Telefone:  '.$dados['telefone_aluno'].'
					</td>
					<td colspan="2">
						Celular: '.$dados['celular'].'
					</td>
				</tr>
				<tr> 
					<td colspan="3">
						Email:  '.$dados['email_aluno'].'
					</td>
				</tr>
				<tr> 
					<td colspan="3">
						Curso:  '.$dados['curso'].'
					</td>
				</tr>
			</table>
			
		<p class="recuo">
		<b>CLÁUSULA PRIMEIRA –</b> A oportunidade'.$dados['obrigatorio'].' de Estágio <b>'. (empty($dados['obrigatorio']) ? '( ) Obrigatório (X) Não Obrigatório' : '(X) Obrigatório ( ) Não Obrigatório') .' </b>, objeto deste TERMO DE COMPROMISSO DE ESTÁGIO,
		configura-se de acordo com as seguintes condições:

		</p>
			
			<table margin="0" class="info" width="700px" style="border: 1px solid black; border-collapse: collapse; margin-top:0px;" >
				<tr  >
					<td style="border: 1px solid black; border-collapse: collapse;" width="150px">
							Período de Estágio:
						<br>
							Hora do Estágio:
						<br>
							Bolsa Auxílio
					</td>
					<td style="border: 1px solid black; border-collapse: collapse;" >
							  '.date('d/m/Y' ,strtotime($dados['data_inicio'])).' a '.date('d/m/Y' ,strtotime($dados['data_inicio'])).'.
						<br>
						 '.$dados['carga_horaria_dia'].' horas diárias. Totalizando '.$dados['carga_horaria'].' horas semanais.
						<br>
							R$ '.$dados['bolsa_aux'].'(mensal).
					</td>
				<tr>
			</table>
			<br>
			<p class="recuo"><b>CLÁUSULA SEGUNDA </b> – A jornada de atividade em estágio deverá compatibilizar-se com o horário acadêmico do estagiário e com o horário da CONCEDENTE. </p>
			<p class="recuo"> <b>Parágrafo Único</b> – Nos períodos de férias escolares, a jornada será estabelecida de comum acordo entre o estagiário e a CONCEDENTE.</p>
			<br>
			<p class="recuo"><b>CLÁUSULA TERCEIRA </b>– Na vigência do presente TERMO DE COMPROMISSO DE ESTÁGIO, o estagiário estará incluído na 
			cobertura do seguro de acidente pessoais, proporcionada pela Apólice número 0101.8200.000.000-84, da seguradora 
			Grupo Federal de Seguros, cujo valor de cobertura é de R$ 20.000,00.</p>
 <br>
			<p class="recuo"><b>CLÁUSULA QUARTA</b> – O IFRS – CAMPUS OSÓRIO deverá comprometer-se a:</p>
			<p class="recuo">a) encaminhar mediante solicitação da CONCEDENTE, alunos de seus cursos que atendam aos requisitos solicitados,
			tais como área de formação e turno do estágio;</p>
			<p class="recuo">b) celebrar, com cada aluno, este TERMO DE COMPROMISSO DE ESTÁGIO, zelando por seu cumprimento;
			reorientando o estagiário para outro local em caso de descumprimento destas normas;</p>
			<p class="recuo">c) gerenciar os CONVÊNIOS e os TERMOS DE COMPROMISSO DE ESTÁGIO, organizando a documentação 
			relacionada aos estágios, encaminhando aos interessados as vias respectivas e mantendo arquivada uma via no IFRS – CAMPUS OSÓRIO;
			</p>
			
			<br>
<p class="recuo">d) dispor sobre programação, orientação, supervisão e avaliação dos estágios;<p/>
<p class="recuo">e) indicar um professor orientador da área a ser desenvolvida no estágio, como responsável pelo acompanhamento e avaliação das atividades do estagiário;
<p class="recuo">f) prestar informações acerca da vida acadêmica do estagiário.<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA QUINTA</b> – Cabe ao ORIENTADOR de estágio do IFRS – CAMPUS OSÓRIO;<p/>
<p class="recuo">a) cumprir o papel de orientar o estagiário e avaliar seu aprendizado;<p/>
<p class="recuo">b) avaliar, quando possível, as instalações da CONCEDENTE e sua adequação à formação cultural e profissional do educando;<p/>
<p class="recuo">c) manter contato com o SUPERVISOR de estágio da CONCEDENTE;<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA SEXTA</b> – A CONCEDENTE deverá comprometer-se a:<p/>
<p class="recuo">a) solicitar ao IFRS – CAMPUS OSÓRIO a quantidade necessária de estagiários nos cursos de seu interesse, segundo o artigo 17 
da lei Nº 11.788, de 25 de setembro de 2008;<p/>
<p class="recuo">b) selecionar e indicar alunos candidatos à vaga de estágio, podendo adotar critérios e meios para aferir conhecimentos e aptidões;<p/>
<p class="recuo">c) celebrar, com cada estagiário, este TERMO DE COMPROMISSO DE ESTÁGIO, zelando por seu cumprimento;<p/>
<p class="recuo">d) indicar funcionário de seu quadro de pessoal, com formação ou experiência profissional na área de conhecimento desenvolvida no
 curso do estagiário, para orientar e supervisionar até 10 (dez) estagiários simultaneamente;<p/>
<p class="recuo">e) oferecer condições para que os estagiários sejam supervisionados por servidores do IFRS – CAMPUS OSÓRIO;<p/>
<p class="recuo">f) ofertar instalações que tenham condições de proporcionar ao educando atividades de aprendizagem social, profissional e cultural;<p/>
<p class="recuo">g) aplicar a legislação relacionada à saúde e segurança no trabalho;<p/>
<p class="recuo">h) efetuar o controle da assiduidade dos estagiários;<p/>
<p class="recuo">i) conceder ao estagiário, enquanto perdurar o estágio, a importância mensal, a título de bolsa, conforme o valor estipulado
 neste TERMO DE COMPROMISSO DE ESTÁGIO;<p/>
<p class="recuo">j) autorizar o início do estágio somente após a assinatura, pelas partes envolvidas, deste TERMO DE COMPROMISSO DE ESTÁGIO;<p/>
<p class="recuo">k) não alterar as atividades do estagiário sem prévia comunicação e anuência do IFRS – CAMPUS OSÓRIO;<p/>
<p class="recuo">l) manter à disposição da fiscalização documentos que comprovem a relação de estágio;<p/>
<p class="recuo">m) emitir documentos comprobatórios do estágio.<p/>
<p class="recuo">Parágrafo Único: É assegurado ao estagiário, sempre que o estágio tenha duração igual ou superior a 01 (um)
 ano, período de recesso de 30 (trinta) dias, a ser gozado preferencialmente durante suas férias escolares. Este recesso deverá
 ser remunerado quando o estagiário receber bolsa ou outra forma de contraprestação. Os dias de recesso previstos neste parágrafo 
 serão concedidos de maneira proporcional, nos casos de o estágio ter duração inferior a 01 (um) ano.<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA SÉTIMA</b> – Cabe ao SUPERVISOR de estágio da CONCEDENTE:<p/>
<p class="recuo">a) orientar o estagiário acerca das atividades a serem desenvolvidas;<p/>
<p class="recuo">b) orientar o estagiário sobre aspectos comportamentais e normas da CONCEDENTE, inclusive no que se refere à
 postura e vestuário adequados;<p/>
<p class="recuo">c) acompanhar profissionalmente o estagiário, de modo especial no que se refere à verificação da existência de
 correlação entre as atividades desenvolvidas pelo mesmo e as exigidas pelo IFRS – CAMPUS OSÓRIO;<p/>
<p class="recuo">d) avaliar o desempenho do estagiário;<p/>
<p class="recuo">e) manter contato com o ORIENTADOR de estágio do IFRS – CAMPUS OSÓRIO;<p/>
<p class="recuo">f) estimular a produção de novos conhecimentos, bem como a reflexão crítica quando da análise de situações, 
visando o aprendizado da atuação profissional do estagiário;<p/>
<p class="recuo">g) comunicar ao IFRS – CAMPUS OSÓRIO sobre a eventual alteração de SUPERVISOR de estágio na CONCEDENTE.<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA OITAVA</b> – O ESTAGIÁRIO deverá comprometer-se a:<p/>
<p class="recuo">a) zelar pelo cumprimento deste TERMO DE COMPROMISSO DE ESTÁGIO;<p/>
<p class="recuo">b) cumprir com empenho a programação de estágio;<p/>
<p class="recuo">c) cumprir as normas de trabalho estabelecidas pela CONCEDENTE, com responsabilidade, empenho e atenção,
 especialmente aquelas que resguardam sigilo às informações a que tenha acesso em decorrência do estágio;<p/>
<p class="recuo">d) informar quando suas atividades de estágio estiverem em desacordo com as atividades descritas neste
 TERMO DE COMPROMISSO DE ESTÁGIO ou com seu curso de formação;<p/>
<p class="recuo">e) utilizar os equipamentos de proteção individual e coletiva fornecidos pela CONCEDENTE;<p/>
<p class="recuo">f) responder por perdas e danos consequentes da inobservância das normas internas da CONCEDENTE ou das constantes do
 presente TERMO DE COMPROMISSO DE ESTÁGIO;<p/>
<p class="recuo">g) ser pontual, assíduo e responsável;<p/>
<p class="recuo">h) portar-se com urbanidade, respeito e cordialidade;<p/>
<p class="recuo">i) zelar pelos equipamentos e bens em geral da CONCEDENTE;<p/>
<p class="recuo">j) racionalizar o uso do material da CONCEDENTE, evitando desperdícios;<p/>
<p class="recuo">k) procurar elevar sempre o nome do IFRS – CAMPUS OSÓRIO;<p/>
<p class="recuo">l) procurar os responsáveis pelo seu estágio sempre que necessário.<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA NONA</b> – Este TERMO DE COMPROMISSO DE ESTÁGIO poderá ser alterado, ou prorrogado
, mediante TERMO ADITIVO; ou rescindindo, de comum acordo entre as partes, ou unilateralmente, mediante notificação
 escrita, com antecedência mínima de 05 (cinco) dias.<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA DEZ </b>– Os casos omissos serão resolvidos conjuntamente pela CONCEDENTE e pelo IFRS – CAMPUS OSÓRIO.<p/>
<br>
<br>
<p class="recuo"><b>CLÁUSULA ONZE</b> – Fica eleito o foro da Justiça Federal de CAPÃO DA CANOA, RS como competente para dirimir 
qualquer questão proveniente deste TERMO DE COMPROMISSO DE ESTÁGIO, eventualmente não resolvida no âmbito administrativo.<p/>

<p class="recuo">
E, por estarem de pleno acordo, assinam o presente instrumento, em 03 (três) vias, na presença das testemunhas abaixo, que também o subscrevem.
</p>

<br>
<br>
<br>

<p class="data">Osório,'.
(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
					
//utf8_encode(strftime(' %d de %B de %Y', strtotime($data)))
.
'
</p>

<br>
<br>
<br>
		<table width="700px" class="assinatura">
			<tr>
				<td width="350px">
					____________________________
					<br>
					Empresa (concedente)
				</td>
				<td>
					____________________________
					<br>
					Claudino Andrighetto<br>
					Diretor Geral IFRS - Osório
				</td>
			</tr>
			<tr>
				<td>
				<br><br>
					____________________________
					<br>
					Estagiário 
				</td>
				<td>
				<br><br>
					____________________________
					<br>
					Representante ou Assistente Legal<br>
					(Para alunos menores de 18 anos.)
				</td>
			</tr>
			<tr>
				<td><br><br>
					________________
					<br>
					Testemunha 1<br>
					RG/CPF:	
				</td>
				<td><br><br>
					________________
					<br>
					Testemunha 2<br>
					RG/CPF:	
				</td>
			</tr>
		</table>


			</body>
			</html>';
		
		
		
				$mpdf=new mPDF();
					$mpdf->SetHTMLFooter('	
					<br>
					<p style="text-align:center; font-size: 9px;"> 
						Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Campus Osório<br>
						Rua Santos Dumont, 2127 - Bairro Albatroz – Osório – RS<br>
						Fone: (51) 3601-3500   &nbsp;&nbsp;&nbsp;    Site: www.osorio.ifrs.edu.br
					</p>
				');
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');	
		
	}

	function planoAtividadeEstagio($id,$data){
		

		$dados = $this->Adm_model->planoAtividadeEstagio($id);

		$html2 ='<html>
    <head>
        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
            <style type="text/css">@import url("https://themes.googleusercontent.com/fonts/css?kit=fpjTOVmNbO4Lz34iLyptLUXza5VhXqVC6o75Eld_V98");ol{margin:0;padding:0}table td,table th{padding:0}.c1{border-right-style:solid;padding:2.8pt 2.8pt 2.8pt 2.8pt;border-bottom-color:#000000;border-top-width:1pt;border-right-width:1pt;border-left-color:#000000;vertical-align:top;border-right-color:#000000;border-left-width:1pt;border-top-style:solid;border-left-style:solid;border-bottom-width:1pt;width:481.9pt;border-top-color:#000000;border-bottom-style:solid}.c9{-webkit-text-decoration-skip:none;color:#000000;font-weight:400;text-decoration:underline;vertical-align:baseline;text-decoration-skip-ink:none;font-size:12pt;font-family:"Calibri";font-style:normal}.c0{-webkit-text-decoration-skip:none;color:#000000;font-weight:700;text-decoration:underline;vertical-align:baseline;text-decoration-skip-ink:none;font-size:12pt;font-family:"Calibri";font-style:normal}.c19{-webkit-text-decoration-skip:none;color:#000080;font-weight:400;text-decoration:underline;vertical-align:baseline;text-decoration-skip-ink:none;font-size:8pt;font-family:"Arial";font-style:normal}.c2{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;font-family:"Calibri";font-style:normal}.c13{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:9pt;font-family:"Calibri";font-style:normal}.c17{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;font-family:"Times New Roman";font-style:normal}.c10{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:8pt;font-family:"Arial";font-style:normal}.c5{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:10pt;font-family:"Calibri";font-style:normal}.c22{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:8pt;font-family:"Times New Roman";font-style:normal}.c6{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:14pt;font-family:"Calibri";font-style:normal}.c4{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:right;height:12pt}.c18{margin-left:-0.5pt;border-spacing:0;border-collapse:collapse;margin-right:auto}.c3{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left}.c15{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:center}.c11{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:right}.c21{font-size:9pt;font-family:"Calibri";font-weight:400}.c16{orphans:2;widows:2}.c20{max-width:481.8pt;padding:40.5pt 56.7pt 34.9pt 56.7pt}.c12{color:inherit;text-decoration:inherit}.c14{background-color:#ffffff}.c7{height:0pt}.c8{height:12pt}.title{padding-top:24pt;color:#000000;font-weight:700;font-size:36pt;padding-bottom:6pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}.subtitle{padding-top:18pt;color:#666666;font-size:24pt;padding-bottom:4pt;font-family:"Georgia";line-height:1.0;page-break-after:avoid;font-style:italic;text-align:left}li{color:#000000;font-size:12pt;font-family:"Times New Roman"}p{margin:0;color:#000000;font-size:12pt;font-family:"Times New Roman"}h1{padding-top:24pt;color:#000000;font-weight:700;font-size:24pt;padding-bottom:6pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h2{padding-top:18pt;color:#000000;font-weight:700;font-size:18pt;padding-bottom:4pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h3{padding-top:14pt;color:#000000;font-weight:700;font-size:14pt;padding-bottom:4pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h4{padding-top:12pt;color:#000000;font-weight:700;font-size:12pt;padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h5{padding-top:11pt;color:#000000;font-weight:700;font-size:11pt;padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h6{padding-top:10pt;color:#000000;font-weight:700;font-size:10pt;padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}
			
			.titulo{
				font-weight: bold;
				font-size: 15px;
				text-decoration: underline;
				font-family: Calibri;
			}
			
			.texto{
				font-size: 15px;
				font-family: Calibri;
			}
		
		.assinatura{
			text-align:center;	
			border: 0px !important;
			font-family: Calibri;
			font-size: 15px;
		}
		
		.data{				
			text-align:right;
			font-family: Calibri;
			font-size: 15px;
		}	
			</style>
        
		
		</head>
        <body class="c14 c20">
            <p class="c3">
                <span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
                    <img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
                    </span>
                </p>
                <p class="c3 c8">
                    <span class="c5"></span>
                </p>
                <p class="c15">
                    <span class="c6">PLANO DE ATIVIDADES DO ESTAGI&Aacute;RIO</span>
                </p>
                <p class="c15">
                    <span class="c13">(O Plano de atividades do Estagi&aacute;rio deve ser elaborado pelo aluno juntamente com o </span>
                    <span class="c21">respons&aacute;vel</span>
                    <span class="c13">&nbsp;pelo setor da empresa concedente do est&aacute;gio. Este Plano de Atividades deve retornar &agrave; IFRS -Os&oacute;rio em at&eacute; 15 dias do ingresso no est&aacute;gio)</span>
                </p>
                <p class="c3 c8">
                    <span class="c2"></span>
                </p>
                <p class="titulo">
                    ESTAGI&Aacute;RIO
                </p>
                <p class="texto">
                     NOME:&nbsp;&nbsp;&nbsp;'.$dados['nome_aluno'].' 
					<br>
                    CURSO:&nbsp;&nbsp;&nbsp;&nbsp;'.$dados['curso'].'
                </p>
			<br>
                <p class="titulo">
                   EMPRESA:
                </p>
                <p class="texto">
                    NOME:	'.$dados['nome_empresa'].' 
					<br>
					Respons&aacute;vel t&eacute;cnico: '.$dados['nome_super'].' 
					<br>
					&Aacute;rea em que realizar&aacute; o est&aacute;gio: _____________________________________________________
                </p>
				<br><br>
                <p class="texto">
                    EST&Aacute;GIO:
                </p>
                <p class="texto">
 
					DATA DO IN&Iacute;CIO: <u>'.date("d/m/Y",strtotime($dados['data_inicio'])).'</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					DATA DE T&Eacute;RMINO: <u>'.date("d/m/Y",strtotime($dados['data_termino'])).'</u></span>
                </p>
				<br>
 
               <style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
<body>


<table style="width:100%">
  <tr>
    <td>&nbsp;&nbsp;&nbsp;OBJETIVOS DO ESTÁGIO (o que será feito):
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;_________________________________________________________________________________________________.
	
    </td>

  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;ATIVIDADES PREVISTAS (como será feito): 
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;___________________________________________________________________________________________________
	&nbsp;&nbsp;_________________________________________________________________________________________________.
    
	
	</td>

  </tr>
  <tr>
    <td>&nbsp;&nbsp;&nbsp;OUTRAS INFORMAÇÕES: 
		&nbsp;&nbsp;___________________________________________________________________________________________________
		
		&nbsp;&nbsp;___________________________________________________________________________________________________
		&nbsp;&nbsp;___________________________________________________________________________________________________
		&nbsp;&nbsp;___________________________________________________________________________________________________
		&nbsp;&nbsp;_________________________________________________________________________________________________.
    <br>
	</td>

  </tr>
</table>
 
 <br><br><br>
                <p class="data">
                    Osório,'. 
					(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
	
					
					//utf8_encode(strftime(' %d de %B de %Y', strtotime($data)))
					.'.
                </p>



<br>
<br>
<br>
<br>
<table style="border: 0px !important;" width="100%">
	<tr style="border: 0px !important;">
		<td class="assinatura">
			___________________
			<br>
			Supervisor da empresa
		</td>
		<td class="assinatura">
			___________________
			<br>Estagiário
		</td>
		<td class="assinatura">
			___________________
			<br>Professor Orientador
		</td>
	</tr>
</table>

            </body>
        </html>';
		
		
		
		$mpdf=new mPDF();
				$mpdf->SetHTMLFooter('	
					<p style="text-align:center; font-size: 12px;"> 
						Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Campus Osório<br>
						Rua Santos Dumont, 2127 - Bairro Albatroz – Osório – RS<br>
						Fone: (51) 3601-3500   &nbsp;&nbsp;&nbsp;    Site: www.osorio.ifrs.edu.br
					</p>
				');
			//$mpdf->WriteHTML($html);
		$mpdf->WriteHTML($html2);
			$mpdf->Output('arquivo','I');
		
	}
	
	function confirmacaoEstagioEmpresa($id,$data){
		

		$dados = $this->Adm_model->confirmacaoEmpresa($id);

		
		$html2 = '<html>
    <head>
        <meta content=text/html; charset=UTF-8" http-equiv="content-type">
            <style type="text/css">
			
		  td,tr,table.dados_empresa{
		 /* border: 1px solid black;
		  border-collapse: collapse;*/
		  padding:10px; 
		  font-size:12px;
		  text-align:left;
		  font-family:Calibri;		  
		}	
		
	
		.data{
			text-align:right;
			font-size:12px;	
		}

		.assinatura{
			text-align:center;
			font-size:12px;	
		}

		.carimbo{
			text-align:center;
			font-size:14px;	
		}

		
		p{
			text-align:justify;
			font-family:Arial;
		}
		
		.legenda{
			text-align:right;
			font-size:9px;
		}
		
		.titulo{
			text-align: center;
			text-decoration: underline;
			font-weight: bold;
			font-size:12px;
		}
		
		
		.tabelaum{
	float: left;
	background-color: #ff0000;

}
.tabeladois{
	float: left;
	background-color: #0ff000;
}
.tabelatres{
	float: left;
	background-color: #0000ff;
		
		
			</style>
		</head>
        <body >
		
		

            <p class="legenda">
                <span class="c48">Entregar no Setor de Est&aacute;gio. </span>
            </p>
            <p class="c33 c21">
                <span class="c6"></span>
            </p>
            <p class="titulo" >
                FORMULÁRIO DE CONFIRMAÇÃO DE ESTÁGIO PELA EMPRESA CONCEDENTE
            </p>
            <p class="c33 c21">
                <span class="c6"></span>
            </p>

            <p class="c11">
                                <span class="c14">O(A) aluno(a) <b> '.$dados['nome_aluno'].' </b></span>
                            
							do curso de <b>'.$dados['curso'].' </b>
                            foi aprovado(a) para realizar est&aacute;gio em nossa empresa. </span>
			</p>
			<!--
                            <p class="c11">
                                <span class="c14">O (a) aluno (a):	<u>&nbsp;&nbsp;&nbsp;'.$dados['nome_aluno'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u> </span>
                            <br>
							do curso:	<u>&nbsp;&nbsp;&nbsp;'.$dados['curso'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                            <br>foi aprovado (a) para realizar est&aacute;gio em nossa empresa. </span>
            </p>
			-->
            <p class="c11">
                <span class="c14">Segue abaixo as informa&ccedil;&otilde;es necess&aacute;rias para elabora&ccedil;&atilde;o do Termo de Compromisso.</span>
            </p>
			
			<br>
            <p class="titulo">
                DADOS DA CONCEDENTE (EMPRESA)
            </p>
			
<table border="1" style="width:700px;border-collapse: collapse;">
	<tr>
		<td style="width:150px;">	Nome da Empresa:	</td>
		<td style="width:550px;" colspan="3">	'.$dados['nome_empresa'].'	</td>
	</tr>
	<tr>
		<td style="width:150px;">Razão Social:</td>
		<td style="width:550px;" colspan="3">	'.$dados['razao_social'].'	</td>
	</tr>
		<tr>
		<td style="width:150px;">CNPJ::</td>
		<td>	'.$dados['cnpj'].'	</td>
		<td style="width:50px;">Ramo de Atividade:</td>
		<td>'.$dados['ramo_atividade'].'</td>
	</tr>
		<tr>
		<td style="width:150px;">Endereço:</td>
		<td style="width:550px;" colspan="3">'.$dados['endereco'].'</td>
	</tr>
	<tr>
		<td style="width:150px;">Cidade:</td>
		<td>'.$dados['cidade'].'</td>
		<td style="width:50px;">Telefones:</td>
		<td>'.$dados['telefone'].'</td>
	</tr>
		<tr>
		<td style="width:150px;">Email:</td>
		<td style="width:550px;" colspan="3">'.$dados['email'].'</td>
	</tr>
			<tr>
		<td style="width:150px;">Representante legal:</td>
		<td>'.$dados['rep_legal'].'</td>
		<td style="width:50px;">Cargo:</td>
		<td>'.$dados['rep_cargo'].'</td>
	</tr>
			<tr>
		<td style="width:150px;">Supervisor do Estágio:</td>
		<td>'.$dados['nome_super'].'</td>
		<td style="width:50px;">Cargo:</td>
		<td>'.$dados['nome_super'].'</td>
	</tr>
	<tr>
		<td style="width:150px;">Formação do Supervisor:</td>
		<td style="width:550px;" colspan="3">'.$dados['formacao'].'</td>
	</tr>
	

</table>


           <br>
           <br>

             
            <p class="titulo">
                Dados de Est&aacute;gio:
            </p>

				<table border="1" style="width:700px;border-collapse: collapse;">
					<tr>
						<td>Data início: </td>
						<td>'. date("d/m/Y",strtotime($dados['data_inicio'])) .'</td>
						<td>Término:</td>
						<td>'.date("d/m/Y",strtotime($dados['data_final'])).'</td>
						<td>Horas semanais:</td>
						<td>('.$dados['carga_horaria'].')h</td>
					</tr>
					<tr>
						<td>Turno trabalho :</td>
						<td>('. ($dados['turno'] == 'manha' ? ' X ' : '  ') .') Manha</td>
						<td>('. ($dados['turno'] == 'tarde' ? ' X ' : '  ') .') Tarde</td>
						<td>('. ($dados['turno'] == 'noite' ? ' X ' : '  ') .') Noite</td>
						<td>('. ($dados['turno'] == 'integral' ? ' X ' : '  ') .') Integral</td>
						<td></td>
					</tr>

				</table>

           <br>
           <br>
		   
            <p class="Titulo">
                <span class="c49">Atividades a serem desenvolvidas: </span>
            </p>
			
			<table border="1" style="text-align:justify; width:700px; border-collapse: collapse;">
				<tr>
					<td>
					 '.$dados['atividade_prevista'].'
					</td>
				</tr>
			
			</table>
			
			<br>
			<br>

			
			
		
			<table style="border-collapse: collapse; float: left;">
				<tr>
					<td style="width:140px; border: 1px solid black; border-collapse: collapse;">
						A empresa oferece :
					</td>
					<td style="text-align: center;  border: 1px solid black; border-collapse: collapse;">
						SIM
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						NÃO
					</td>
					<td >
						
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;" >
						Agente de Integração:
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						
					</td>
				</tr>
				<tr>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						Alimentação
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
					'.
					(empty($dados['alimentacao']) ? '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' : '(&nbsp;&nbsp;X&nbsp;&nbsp;)' )
					.'
						
						
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
								'.
					(empty($dados['alimentacao']) ? '(&nbsp;&nbsp;X&nbsp;&nbsp;)': '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' ) .'
					</td>
					<td>
						
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						CIEE
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
											'.
					($dados['agente_integracao'] == 'CIEE'  ? '(&nbsp;&nbsp;X&nbsp;&nbsp;)' : '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' )
					.'
					</td>
				</tr>
				<tr>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						Remuneração
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
										'.
					(empty($dados['alimentacao']) ? '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' : '(&nbsp;&nbsp;X&nbsp;&nbsp;)' )
					.'
						
					</td >
					<td style="  border: 1px solid black; border-collapse: collapse;">
										'.
					(!empty($dados['alimentacao']) ? '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' : '(&nbsp;&nbsp;X&nbsp;&nbsp;)' )
					.'
						
					</td>
					<td>
						
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						FDRH
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
																'.
					($dados['agente_integracao'] == 'FDRH'  ? '(&nbsp;&nbsp;X&nbsp;&nbsp;)' : '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' )
					.'
					</td>
				</tr>
				<tr>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						Transporte
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
										'.
					(empty($dados['alimentacao']) ? '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' : '(&nbsp;&nbsp;X&nbsp;&nbsp;)' )
					.'
						
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
										'.
					(!empty($dados['alimentacao']) ? '(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)' : '(&nbsp;&nbsp;X&nbsp;&nbsp;)' )
					.'
						
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
				</tr>
				<tr>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						____________________
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)
					</td>
					<td style="  border: 1px solid black; border-collapse: collapse;">
						(&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;)
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
					<td>
						
					</td>
				</tr>
			</table>
		<br>
		<br>
		<br>
		
            <p class="data">

                Data  <u>'.
				
				(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
	
				
				//utf8_encode(strftime(' %d / %m / %Y', strtotime($data)))
				
				
				
				.'</u>
            </p>
			
			
			
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
            <p class="assinatura">
			
                ____________________________________________
				<br>
				Assinatura da empresa Concedente
			
            </p>
            <p class="carimbo">
                Com carimbo
            </p>
        </body>
    </html>';
	
	
		$mpdf=new mPDF();
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');

		

		
	}
	
	function avaliacaoEstagioProfessor($id,$data){
		
		
		$dados = $this->Adm_model->getNomeALunoProfessor($id);

		$html2 = '<html>
							    <head>
					        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
					            <style type="text/css">
								
									.titulo{
									text-align: center;
								
									font-weight: bold;
									font-size:12px;
								}
								
							td,tr,table{
							  border: 1px solid black;
							  border-collapse: collapse;
							  padding:5px; 
							  font-size:12px;
							  text-align:center;
							  font-family:Calibri;		  
							}	
							
							.texto_alinhado{
								text-align:left !important;
							}
							
							.texto_tabela{
								margin: 10px;
							}
							
							.titulo_segunda_tabela{
								font-size:12px;
								text-align:center;
								font-family:Calibri;
							}
							
							.subs{
								font-size:10px;
								font-family:Calibri;
							}
							
							.subs_titulo{
								font-family:Calibri;
								font-size:10px;
								text-align:center !importtant;
								
							}
							
							.back{
								background-color: #d6e3bc !important;
								font-weight: bold;
							}
		
								
								</style>
					        </head>
							<body>
							            <p class="c3">
                <span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
                    <img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
                    </span>
                </p>
				
					<p class="titulo"> AVALIAÇÃO DO RELATÓRIO E APRESENTAÇÃO DO ESTÁGIO CURRICULAR </p>
				
					<p  font-size="14px" align="left"><b>ESTAGIARIO </b></p>
					
					<table>
						<tr>
							<td class="back" width="150px" class="texto_alinhado">Nome do estagiario :
							</td>
							<td class="texto_alinhado" width="550px">
							 '.$dados['aluno'].'
							</td>
						</tr>
						<tr>
							<td style="text-align:left;">Curso : 
							</td>
							<td class="texto_alinhado">
							'.$dados['curso'].'
							</td>
						</tr>
						<tr>
							<td class="texto_alinhado">
								Professor Orientador : 
							</td>
							<td class="texto_alinhado">
							'.$dados['professor'].'
							</td>
						</tr>
						
					</table>
					<br>
					<br>
					
					
					
					
					
					
					<center class="titulo_segunda_tabela">PARECER SOBRE  O RELATÓRIO </center>
					<table>
						<tr>
							<td class="back">
								Item
							</td>
							<td class="back" colspan="2" width="200px" >
								Pontuação Maxima
							</td>
							<td class="back" colspan="2">
								Pontuação Obtida
							</td>
						</tr>
						<tr>
							<td class="back" ></td>
							<td class="back">
								(&nbsp;&nbsp;)Com apresentação
							</td>
							<td class="back">
								(&nbsp;&nbsp;)Sem paresentação
							</td>
							<td class="back" width="90px">
								Prof. 1
							</td>
							<td class="back" width="90px">
								Prof. 2
							</td>
						</tr>
						<tr>
							<td class="texto_alinhado">
								1. Pontualidade no cumprimento dos prazos;
							</td>
							<td>
								1
							</td>
							<td>
								2
							</td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td class="texto_alinhado">
							
							2. Desenvolvimento do relatório:
							<lo>
								<li> &nbsp;&nbsp;&nbsp;&nbsp; Introdução (apresentação do local onde foi realizado o estágio, período, supervisor, área de atuação,...);</li>
								<li> &nbsp;&nbsp;&nbsp;&nbsp;  Relato das atividades desenvolvidas fundamentadas teoricamente.</li>
							<p class="texto_tabela">
							OBS: Não se trata apenas de revisão bibliográfica, 
							mas de buscar fundamentação teórica para a compreensão 
							do assunto e das vivências durante o estágio.<p>
								
							</td>
							<td>
								3
							</td>
							<td>
								4
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
						<tr>
							<td class="texto_alinhado">
								
								3. Conclusões, considerações finais, anexos e referências bibliográficas

							</td>
							<td>
								1
							</td>
							<td>
								2
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
						<tr>
							<td class="texto_alinhado">
								TOTAL DA PONTUAÇÃO
							</td>
							<td>
								5
							</td>
							<td>
								8
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
						</tr>
					</table>
					<span class="subs">
					REGULAMENTO DE ESTÁGIO: Art. 26, §1º. Da faculdade da apresentação do Relatório de Estágio (defesa do relatório de estágio), para ensino médio e do subsequente, quando este for dispensado pelo professor orientador, o relatório passa a ter peso 8 (oito).
					</span>
					
					<br>
					<br>
					<br>
					 <p style="margin:2px; text-align: center; line-height:0;">Parecer  sobre a apresentação (quando houver defesa do relatório final) 
					<br>
				<span class="subs">	(REGULAMENTO DE ESTÁGIO: Art. 24, §1º: ... a banca de avaliação deverá ser composta por no mínimo 2 avaliadores)
					</span></p>

					<table width="100%">
						<tr>
							<td class="back" width="375px">
								Item
							</td>
							<td class="back">
								Pontuação Maxima
							</td>
							<td class="back" colspan="2">
								Pontuação Obtida
							</td>
						</tr>
						<tr>
							<td class="back">
							</td>
							<td class="back">
							</td>
								
							<td class="back" width="90px">
								Prof. 1
							</td>
							<td class="back" width="90px">
								Prof. 2
							</td>
						</tr>
						<tr>
							<td>
								1. Apresentação do Relatório final
							</td>
							<td>
								3
							</td>
							<td>
							</td>
							<td>
							</td>
						</tr>
					</table>
					
					<br>
					
					<table width="100%">
						<tr>
							<td width="375px">
								<b>MÉDIA FINAL DO RELATÓRIO </b>
							</td>
							<td>
							</td>
						</tr>
					</table>
					
					
					<p> Professor 1 &nbsp;&nbsp;  ..................................................  - ..................................................
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data ...../..../.....
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					(Nome)
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					(Assinar)</p>
					
					<p> Professor 2 &nbsp;&nbsp;  ..................................................  - ..................................................
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Data ...../..../..... 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					(Nome)
					
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					(Assinar)</p>
				
							</body>	
		';
		
		
				$mpdf=new mPDF();
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');

		
	}
	
	function avaliacaoEstagioEmpresa($id,$data){
		

		$dados = $this->Adm_model->avaliacaoestagioEmpresa($id);

		$html2 = '<html>
							    <head>
					        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
					            <style type="text/css">
								
									.titulo{
									text-align: center;
								
									font-weight: bold;
									font-size:12px;
								}
									
							p{
								text-align:justify;
								font-family:Calibri;
								
							}
							
							.texto_alinhado{
								text-align:left !important;
							}
							
							.texto_tabela{
								margin: 10px;
							}
							
							.titulo_segunda_tabela{
								font-size:12px;
								text-align:center;
								font-family:Calibri;
							}
							
							.subs{
								font-size:10px !important;
								font-family:Calibri;
							}
							
							.subs_titulo{
								font-family:Calibri;
								font-size:10px;
								text-align:center !importtant;
								
							}
							
							.back{
								background-color: #d6e3bc !important;
								font-weight: bold;
							}
							
							.margin{
								margin:0px,0px,0px,0px;
							}
							
							.none{
							  border: none !important;
							  border-collapse: none !important;
							  padding:none !important; 
							  font-size:none !important;
							  text-align:none !important;
							  font-family:none !important;
							}
							
							td,tr,table{
							  border: 1px solid black;
							  border-collapse: collapse;
							  padding:5px; 
							  font-size:12px;
							  text-align:center;
							  font-family:Calibri;		  
							}
							
		.data{				
			text-align:right;
		}

		.assinatura{
			text-align:center;	
		}
		
								
								</style>
					        </head>
							<body>
							            <p class="c3">
                <span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
                    <img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
                    </span>
                </p>
				<u>ESTAGIARIO </u><br>
				NOME: '.$dados['aluno'].'<br>
				CURSO: '.$dados['curso'].'<br>
				<u>EMPRESA </u><br>
				NOME:  '.$dados['empresa'].'
				<table class="none">
					<tr class="none">
						<td width="300px" class="none">
							TELEFONE:  '.$dados['telefone'].'
						</td>
						<td class="none">
						CIDADE:  '.$dados['cidade'].'
						</td>
					</tr>
					<tr class="none">
						<td class="none">
							SUPERVISOR:  '.$dados['supervisor'].'
						</td>
						<td class="none">
						ÁREA DO ESTÁGIO: 
						</td>
					</tr>
				</table>
				<u>ESTAGIO </u>
				<table margin="0px" class="none">
					<tr class="none">
						<td class="none" width="300px">
						DATA DO INICIO :  '. date("d/m/Y", strtotime($dados['data_inicio'])).'
											
						</td>
						<td class="none">
						TERMINO DO ESTAGIO :  '.date("d/m/Y", strtotime($dados['data_termino'])).'
						</td>
					</tr>
				</table>
				CARGA HORARIA TOTAL DE  '.$dados['carga_horaria'].'h
				
				<br>
				<br>
				
				
				<table width="700px">
					<tr>
						<td>
							<span class="subs"> Esta ficha  faz parte do processo de avaliação do aluno estagiário e contribui para formação da nota final, para obtenção da aprovação no curso </span>
						</td>
					</tr>
				</table>
				<br>

				Assinale com um ( X ) a graduação de cada caracteristica que melhor avalia o estagiário.
				<table style="width:700px">
					<tr>
						<td width="50px">
							ITEMS
						</td>
						<td width="250px">
							CARACTERÍSTICAS
						</td>
						<td>
							ÓTIMO
						</td>
						<td>
							BOM
						</td>
						<td>
							REGULAR
						</td>
						<td>
							INSUFICIENTE
						</td>
					</tr>
					<tr>
						<td>
							I
						</td>
						<td class="texto_alinhado">
							Relacionamento no Estágio
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							II
						</td>
						<td class="texto_alinhado">
							Espírito de iniciativa
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							III
						</td>
						<td class="texto_alinhado">
							Nível de conhecimento teórico
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							IV
						</td>
						<td class="texto_alinhado">
							Rendimento no estágio
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							V
						</td>
						<td class="texto_alinhado">
							Grau de interesse demonstrado
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							VI
						</td>
						<td class="texto_alinhado">
						Responsabilidade
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							VII
						</td>
						<td class="texto_alinhado">
							Cooperação
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							VIII
						</td>
						<td class="texto_alinhado">
							Disciplina
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							IX
						</td>
						<td class="texto_alinhado">
							Autoconfiaça
						</td><td></td><td></td><td></td><td></td>
					</tr>
					<tr>
						<td>
							X
						</td>
						<td class="texto_alinhado">
							Assiduidade
						</td><td></td><td></td><td></td><td></td>
					</tr>
				</table>
				
				
				
				<p>
					Parecer final do desempenho do estagiário: 
					</p>
					
				<p>
					_____________________________________________________________________________________________________________________________________________________________________________________________________________.
					Observações ou sugestões:  
					<br>
										_____________________________________________________________________________________________________________________________________________________________________________________________________________.

					</p>
				<p>
				
				A continuação do estagiário no Órgão/ empresa está sendo desejada?&nbsp;&nbsp;&nbsp;&nbsp;	(&nbsp;&nbsp;) Sim.&nbsp;&nbsp;&nbsp;&nbsp;(&nbsp;&nbsp;) Não.
				<br>Atribua uma NOTA ao estágio desenvolvido pelo aluno. 	(0 a 2) (_____________).<br>
				Informamos que o Aluno/ Estagiário realizou um estágio de: (___)200h (médio e subsequente), (___)360h (superior).

				</p>

				<p class="data">
					Osório, '.
					(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
	
					//utf8_encode(strftime(' %d de %B de %Y', strtotime($data)))
					
					.'

				</p>
				
				
				<p class="assinatura">
				
				_________________________________________
				    <br> Assinatura e carimbo da empresa

				
				</p>
				
				';
		
				
		
				$mpdf=new mPDF();
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');

		
	}

	function acompanhamentoEstagio($id,$data){
		
		

		$dados = $this->Adm_model->getNomeALunoProfessor($id);

		$html2 = '<html>
							    <head>
					        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
					            <style type="text/css">
								
									.titulo{
									text-align: center;
									font-size:16px;
									font-family:Calibri;
									margin:0px;
								}
									
	
							
							.texto_alinhado{
								text-align:left !important;
							}
							
							.texto_tabela{
								margin: 10px;
							}
							
							.titulo_segunda_tabela{
								font-size:12px;
								text-align:center;
								font-family:Calibri;
							}
							
							.subs{
								font-size:10px !important;
								font-family:Calibri;
								text-align:center;
							}
							
							.subs_titulo{
								font-family:Calibri;
								font-size:10px;
								text-align:center !importtant;
								
							}
							
							.back{
								background-color: #d6e3bc !important;
								font-weight: bold;
							}
							
							.margin{
								margin:0px,0px,0px,0px;
							}
							
							.none{
							  border: none !important;
							  border-collapse: none !important;
							  padding:none !important; 
							  font-size:none !important;
							  text-align:none !important;
							  font-family:none !important;
							}
							
							td,tr,table{
							  border: 1px solid black;
							  border-collapse: collapse;
							  padding:2px; 
							  font-size:14px;
							  text-align:center;
							  font-family:Calibri;		  
							}
							
		.data{				
			text-align:right;
		}

		.rodape{
			text-align:center;	
			font-size: 12px;
		}

		p{
			font-family: Calibri;
			
			
		}
								
								</style>
					        </head>
							<body>
							            <p class="c3">
                <span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
                    <img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
                    </span>
					<br><br>
					<br>
					<p class="titulo"> ACOMPANHAMENTO DE ESTÁGIO </p>
					<p class="subs"> (Formulário que documenta as orientações realizadas pelo Professor Orientador ao aluno. Este documento deve ser entregue no final do estágio.) </p>
				
				
				
				<p>
					<b><u>ESTAGIÁRIO </u></b><br>
					
					NOME : '.$dados['aluno'].'<br>
					CURSO : '.$dados['curso'].'<br>
					<p>
				
				
				<table width="700px" >
					<tr>
						<td width="70px">DATA</td>
						<td width="500px">Atividade de Orientação</td>
						<td>ASS. ESTAGIÁRIO</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				<br><br>
				
				<p>Parecer Final : 
				
				_______________________________________________________________________________________________________
				_______________________________________________________________________________________________________
				______________________________________________________________________________________________________.
				</p>	
				<br>
				<br>
				<p> 
				Professor Orientador : '.$dados['professor'].'  <br>
				Assinatura : ____________________________________.
				</p>
				
				
				
				<br>
				<br>
				
				
				<p class="data"> Osório,'.
				(empty($data) ? '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;de&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' : utf8_encode(strftime(' %d de %B de %Y', strtotime($data))))
	
				//utf8_encode(strftime(' %d de %B de %Y', strtotime($data)))
				.' . </p>
				
				
			

				
				
				
				</html>';
				

				
		
				$mpdf=new mPDF();
				
								$mpdf->SetHTMLFooter('	
					<p class="rodape"> 
						Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Campus Osório<br>
						Rua Santos Dumont, 2127 - Bairro Albatroz – Osório – RS<br>
						Fone: (51) 3601-3500   &nbsp;&nbsp;&nbsp;    Site: www.osorio.ifrs.edu.br
					</p>
				');
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');

	}
	
	function declaracaoExperoencia($id,$data){
		
		
		$html2 = '<html>
							    <head>
					        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
					            <style type="text/css">
								
									.titulo{
									text-align: center !important;
									font-weight: bold;
									
								}
									

								.data{				
									text-align:right !important;
								}


								p{
									font-size: 15px;
									text-align: justify;
									font-family: Times New Roman;
									line-height: 2;
									
								}
								
								.corecao{
									letter-spacing: 1px !important;
								}
								
								.assinatura{
									text-align: center !important;
								}
														
					</style>
				</head>
			<body>
			
			<br>
			<br>
			<br>
			<p class="titulo">
			DECLARAÇÃO DE EXPERIÊNCIA PROFISSIONAL
			</p>
			<br>
			<br>
			<br>
			<p>
			Em conformidade com o Regulamento de Estágios do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Câmpus Osório, que dispõe em seu:
			</p>
			<p>
			“Art. 19 - Compete à Concedente: 
			</p>
			<p>
			I - indicar um supervisor de estágio que seja funcionário de seu quadro de pessoal, com formação na área ou experiência profissional”. 
			</p>
			<p>
			<span class="corecao">DECLARO,  que não possuo formação na área, porém, atuo no cargo de</span>
			__________________________________________________________________________________, há _______ 
			(citar 
			<span class="corecao"> anos ou meses), desempenhando as seguintes funções </span>
			_________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________, 
			comprovando a experiência profissional necessária à atividade de Supervisão de Estágio. 
			</p>
			
			<br>
			<p class="data">
			O referido é verdade e dou fé.
			<br><br><br>
				Osório, '. utf8_encode(strftime(' %d de %B de %Y', strtotime($data))).'.

			</p>


			<br>
			<br>
			<p class="assinatura">
				__________________________________________
				<br>Supervisor de Estágio
			</p>


			</body>
			</html>';
		
				
				$mpdf=new mPDF();
				
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($html2);
				$mpdf->Output('arquivo','I');
		
		
		
	}
	
	
	function testedocs($id){
		
			$dados = $this->Adm_model->getDadosAluno($id);


					 $html = '<html>
							<head>
							<meta content="text/html; charset=UTF-8" http-equiv="content-type">
							<style type="text/css">
							@import url("https://themes.googleusercontent.com/fonts/css?kit=wAPX1HepqA24RkYW1AuHYA");ol{margin:0;padding:0}table td,table th{padding:0}.c0{color:#000000;
							font-weight:400;text-decoration:none;vertical-align:baseline;font-size:8pt;font-family:"Calibri";font-style:normal}.c4{color:#000000;font-weight:400;text-decoration:none;
							vertical-align:baseline;font-size:14pt;font-family:"Calibri";font-style:normal}.c5{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:12pt;
							font-family:"Calibri";font-style:normal}.c10{color:#000000;font-weight:400;text-decoration:none;vertical-align:baseline;font-size:10pt;font-family:"Calibri";font-style:normal}
							.c1{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left;height:12pt}.c3{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:right;height:12pt}
							.c2{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:center}.c9{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:left}.c11{padding-top:0pt;padding-bottom:0pt;
							line-height:1.0;text-align:justify}.c6{padding-top:0pt;padding-bottom:0pt;line-height:1.0;text-align:right}.c7{background-color:#ffffff;max-width:481.8pt;padding:51pt 56.7pt 35.6pt 56.7pt}
							.c8{height:12pt}.title{padding-top:24pt;color:#000000;font-weight:700;font-size:36pt;padding-bottom:6pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}
							.subtitle{padding-top:18pt;color:#666666;font-size:24pt;padding-bottom:4pt;font-family:"Georgia";line-height:1.0;page-break-after:avoid;font-style:italic;text-align:left}li{color:#000000;
							font-size:12pt;font-family:"Times New Roman"}p{margin:0;color:#000000;font-size:12pt;font-family:"Times New Roman"}h1{padding-top:24pt;color:#000000;font-weight:700;font-size:24pt;
							padding-bottom:6pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h2{padding-top:18pt;color:#000000;font-weight:700;font-size:18pt;
							padding-bottom:4pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h3{padding-top:14pt;color:#000000;font-weight:700;font-size:14pt;
							padding-bottom:4pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h4{padding-top:12pt;color:#000000;font-weight:700;font-size:12pt;
							padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h5{padding-top:11pt;color:#000000;font-weight:700;font-size:11pt;
							padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}h6{padding-top:10pt;color:#000000;font-weight:700;font-size:10pt;
							padding-bottom:2pt;font-family:"Times New Roman";line-height:1.0;page-break-after:avoid;text-align:left}</style>
							</head>
							<body class="c7">
							<div>
								<p class="c6">
									<span class="c5">Via Setor de Est&aacute;gios</span>
								</p>
							</div>
							<p class="c9">
								<span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
									<img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title="">
								</span>
							</p>
							<p class="c2">
								<span class="c4">Termo de Informa&ccedil;&atilde;o</span>
							</p>
							<p class="c2">
								<span class="c4">(PROFESSOR ORIENTADOR)</span>
							</p>
							<p class="c1"><span class="c5"></span></p><a id="id.gjdgxs"></a>
							<p class="c11">
							<br><br>
								<span class="c5">Eueeee, professor '.$dados['professor'].' informo que estarei orientando o(a) aluno(a) '.$dados['aluno'].' do curso '.$dados['curso'].'da turma '.$dados['turma'].' , no est&aacute;gio obrigat&oacute;rio no ano de '. date("Y").' .</span>
							</p>
							<p class="c1"><span class="c5"></span></p>
							<p class="c1"><span class="c5"></span></p>
							<p class="c1"><span class="c5"></span></p>
							<p class="c1"><span class="c5"></span></p><a id="id.30j0zll"></a>
							<p class="c6">
								<span class="c5">Osório, .</span>
							</p>
							<p class="c3"><span class="c5"></span></p>
							<p class="c3"><span class="c5"></span></p>
							<p class="c2">
								<span class="c5">_________________________________________</span></p>
							<p class="c2">
							<span class="c5">Assinatura do Professor Orientador</span></p>
						<p class="c2 c8"><span class="c5"></span></p><p class="c2 c8"><span class="c5"></span></p><p class="c2"><span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 50.07px; height: 34.67px;">
						<br><br>
						<p>-------------------------------------------------------------------------------------------------------------------------------------------</p>
						<br><br>
						</span></p><p class="c2 c8"><span class="c5"></span></p>
						<p class="c6"><span class="c5">Via Setor de Registros</span></p>
						<p class="c6"><span class="c0">(via necess&aacute;ria para realizar matr&iacute;cula na disciplina de est&aacute;gio, &nbsp;junto ao setor de Registros)</span></p>
						<p class="c6"><span class="c0">(SRA &ndash; Cadastrar no SIA o aluno com o respectivo professor orientador)</span></p>
						<p class="c9"><span style="overflow: hidden; display: inline-block; margin: 0.00px 0.00px; border: 0.00px solid #000000; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px); width: 336.00px; height: 84.07px;">
						<img alt="" src="'.base_url('public/img/logo_nome_id.jpg').'" style="width: 336.00px; height: 84.07px; margin-left: -0.00px; margin-top: -0.00px; transform: rotate(0.00rad) translateZ(0px); -webkit-transform: rotate(0.00rad) translateZ(0px);" title=""></span></p>
						<p class="c2"><span class="c4">Termo de Informa&ccedil;&atilde;o</span></p>
						<p class="c2"><span class="c4">(PROFESSOR ORIENTADOR)</span></p><p class="c1"><span class="c5"></span></p>
						<p class="c11">
						<br><br>
						<span class="c5">Eu, professor '.$dados['professor'].' informo que estarei orientando o(a) aluno(a) '.$dados['aluno'].' do curso '.$dados['curso'].' da turma  '.$dados['turma'].' , no est&aacute;gio obrigat&oacute;rio no ano de '. date("Y").' .</span></p>
					<p class="c1"><span class="c5"></span></p><p class="c1"><span class="c10"></span></p><p class="c1"><span class="c5"></span></p>
					<p class="c6"><span class="c5">
					Osório,
				
					
					.</span></p><p class="c3"><span class="c5"></span></p><p class="c3"><span class="c5"></span></p>
					<p class="c2"><span class="c5">_________________________________________</span></p>
					<p class="c2"><span class="c5">Assinatura do Professor Orientador</span></p></body></html>';
					
					$html3 = '<html>
							    <head>
					        <meta content="text/html; charset=UTF-8" http-equiv="content-type">
					            <style type="text/css">
								
									.titulo{
									text-align: center !important;
									font-weight: bold;
									
								}
									

								.data{				
									text-align:right !important;
								}


								p{
									font-size: 15px;
									text-align: justify;
									font-family: Times New Roman;
									line-height: 2;
									
								}
								
								.corecao{
									letter-spacing: 1px !important;
								}
								
								.assinatura{
									text-align: center !important;
								}
														
					</style>
				</head>
			<body>
			
			<br>
			<br>
			<br>
			<p class="titulo">
			DECLARAÇÃO DE EXPERIÊNCIA PROFISSIONAL
			</p>
			<br>
			<br>
			<br>
			<p>
			Em conformidade com o Regulamento de Estágios do Instituto Federal de Educação, Ciência e Tecnologia do Rio Grande do Sul – Câmpus Osório, que dispõe em seu:
			</p>
			<p>
			“Art. 19 - Compete à Concedente: 
			</p>
			<p>
			I - indicar um supervisor de estágio que seja funcionário de seu quadro de pessoal, com formação na área ou experiência profissional”. 
			</p>
			<p>
			<span class="corecao">DECLARO,  que não possuo formação na área, porém, atuo no cargo de</span>
			__________________________________________________________________________________, há _______ 
			(citar 
			<span class="corecao"> anos ou meses), desempenhando as seguintes funções </span>
			_________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________, 
			comprovando a experiência profissional necessária à atividade de Supervisão de Estágio. 
			</p>
			
			<br>
			<p class="data">
			O referido é verdade e dou fé.
			<br><br><br>
				Osório, '. utf8_encode(strftime(' %d de %B de %Y', strtotime($data))).'.

			</p>


			<br>
			<br>
			<p class="assinatura">
				__________________________________________
				<br>Supervisor de Estágio
			</p>


			</body>
			</html>';
	
	

			
				$result = array('success' => 'Professor inserido com sucesso');
				$result = array('mensagem' => $html);
		
		exit(json_encode($result));
	
	}
	
	/*function visualizar(){
		
		/*
		echo 'teste';
		echo $_POST['mensagem'];
		*/
		
		/*
						$mpdf=new mPDF();
				
				//$mpdf->WriteHTML($html);
			$mpdf->WriteHTML($_POST['mensagem']);
				$mpdf->Output('arquivo','I');*/
				/*
				header("Location: http://www.google.com/"); 
		
	}*/
	


	
	
	
	
	
	
	
	
	
} // end of file