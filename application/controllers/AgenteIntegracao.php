<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AgenteIntegracao extends CI_Controller {

    function __construct() {
		parent::__construct();
		if (!isset($_SESSION[session_prefix])) {
			redirect("login");
		}
        $this->load->model('AgenteIntegra_model');
	}

	public function index()
	{
		$dados_paginas['agentes'] = $this->AgenteIntegra_model->getAgentes();
		
		$this->load->view('modal/cadastra_agente.php');
		$this->load->view('modal/editar_agente.php');
		$this->load->view('modal/excluir_agente.php');
		$this->load->view('modal/loading.php');

		$this->load->view('default/top.php');
		$this->load->view('default/sidebar.php');
		$this->load->view('agente_integra.php', $dados_paginas);
	}
	
	function json_get_agente(){
			
		if (empty($_POST['id_agente'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->AgenteIntegra_model->getAgentebyId($_POST['id_agente']);	
		}	
		exit(json_encode($result));
	}

    function json_cadastro_agente(){

        $data = array(
            'nome' => $_POST['nome']
        );
        
        $result = $this->AgenteIntegra_model->cadastraAgente($data);	

        if($result)
            $result = array('success' => 'Agente cadastrado!');

        exit(json_encode($result));
    }

	function json_editar_agente(){
		
        $data = array(
            'id_agente_integracao' => $_POST['id_agente'],
            'nome' => $_POST['nome'],
        );
						
		if (empty($_POST['nome'])) 
			$result = array('error' => 'Não veio nada');
		else{
			$result = $this->AgenteIntegra_model->editarAgente($data);	
			if($result)
				$result = array('success' => 'Agente atualizado com sucesso');
		}	
		exit(json_encode($result));
		
	}

	function json_excluir_agente(){
		
		if (empty($_POST['id_agente'])){
			$result = array('error' => 'ERROR');
		}else{
			$result = $this->AgenteIntegra_model->excluirAgente($_POST['id_agente']);
			if($result)
				$result = array('success' => 'Agente excluido com Sucesso');
		}	
		exit(json_encode($result));
	}
}


