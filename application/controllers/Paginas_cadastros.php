<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paginas_cadastros extends CI_Controller {
	
		function __construct() {
		
		parent::__construct();

	}

	public function index()
	{
		
		$this->load->view('default/top.php');
		
		$this->load->view('pagina_cadastro_empresa');
		
	} 
	
			function json_cadastro_empresa(){
				
				$tokem = md5($_POST['cnpj'].'srfi');
				
				//echo system_url.'?tokem='.$tokem;
							

							$data = array(
							'senha' => $_POST['senha'],
							'nome' => $_POST['nome'],
							'razao_social' => $_POST['razao_social'],
							'email' => $_POST['email'],
							'cnpj' => $_POST['cnpj'],
							'cidade' => $_POST['cidade'],
							'ramo_atividade' => $_POST['ramo_atividade'],
							'telefone' => $_POST['telefone'],
							'endereco' => $_POST['endereco'],
							'rep_cargo' => $_POST['representante_legal'],
						);
						
			/*$this->Adm_model->initEmail();
				$this->email->to('wesley.s.gomes@hotmail.com');
				//$this->email->cc($emails);
				$this->email->subject('Vericação de Email');
				$this->email->message(system_url.'/Paginas_cadastros/verificaEmail?tokem='.$tokem);
				
				if ($this->email->send()) {
					echo 'email enviado';
				}
				else {
					//echo $this->email->print_debugger();
					//echo 'num deu ceto não';
				}*/
						
						
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
	
	function criarSenha(){
		
		
		
		
	}
	
	function verificaEmail(){
		
				$this->load->view('default/top.php');
				
				echo $_GET['tokem'];
		
		
		
		
		
	}
	


}//EOF
