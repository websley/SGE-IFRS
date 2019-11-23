<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm extends CI_Controller {
	
			function __construct() {
		
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
	}

	public function index()
	{
		//$dados_paginas['alunos'] = $this->Estagios_model->getAlunos();
		$dados_paginas['estagios'] = $this->Estagios_model->getEstagios();
		
		
		
		$this->load->view('modal/documentos_inicio.php');
		$this->load->view('modal/adiciona-estagio.php');
		
		
		$this->load->view('default/top.php');
		$this->load->view('main', $dados_paginas);
		
	}
	

	

	

}


