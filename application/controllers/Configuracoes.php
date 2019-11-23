<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuracoes extends CI_Controller {
	
			function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{		
		$dados_paginas['documentos'] = $this->Documentos_model->get_all_docs();
	
		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('configuracoes.php',$dados_paginas);
	
		$dados_modal['empresas'] = $this->Empresas_model->getEmpresasID();

		
		$this->load->view('modal/adicionar_documento.php');
		$this->load->view('modal/cadastro_aluno.php');
		$this->load->view('modal/cadastro_professor.php');
		$this->load->view('modal/cadastro_empresa.php');
		$this->load->view('modal/cadastro_supervisor.php',$dados_modal);
		
		
	}
}
	
?>