<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    
    

	public function index()
	{
		//echo $_SERVER['HTTP_HOST'];
		//echo base_url();
		$this->load->view('default/top.php');
		$this->load->view('login.php');
		
	}
	
	
	public function executa_login(){
		
		
		if( $usuario = $this->Adm_model->login($_POST['email'],$_POST['senha']) ){
			
						
					$page = 'Main';
					$_SESSION[session_prefix]['usuario'] = $usuario['nome'];
					$_SESSION[session_prefix]['perfil'] = $usuario['perfil_id'];
					$_SESSION[session_prefix]['id_cadastro'] = $usuario['id_cadastro'];
					
					
		}else{

			$_SESSION[session_prefix]['msg_erro_login'] = 'Email ou Senha Invalidos';
			$page = 'login';

		}
		
			if (!isset($page)) $page = 'login';
			redirect($page);
	
	}
	
	
	/**
	* Quebra a sessão do sistema
	*/
	public function sair() {

		unset($_SESSION[session_prefix]);
		redirect('login');
		
	}
	

	

}
