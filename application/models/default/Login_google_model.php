<?php

class Login_google_model extends CI_Model {

	/**
	 * Objeto do Google.
	 */
	var $client = false;

	/**
	 * Carrega a API do Google.
	 */
	function __construct() {
		
		require_once BASEPATH .'libraries/Google/autoload.php';
		
		require_once BASEPATH .'libraries/Google/Client.php';
		require_once BASEPATH .'libraries/Google/Service/Oauth2.php';
		
		$this->client = new Google_Client();
		//$this->client->setClientId("818263747552-hpn0fu4ccculga7u7gv69aq3k9hnej1o.apps.googleusercontent.com");
		//$this->client->setClientSecret("5go5QoKtNW9a4JidX0BgPIfc");
		
/*crm local */ $this->client->setClientId("804351717739-or1nno0q6n575kl30djavpmfecge4ss4.apps.googleusercontent.com");
/*crm local */$this->client->setClientSecret("b3mwkBMJkXEiXHTgjI5ga6KK");


		
		$this->client->setRedirectUri(system_url ."/login/login_google");
		
		$this->client->addScope("https://www.googleapis.com/auth/plus.me");
		$this->client->addScope("https://www.googleapis.com/auth/userinfo.email");
		$this->client->addScope("https://www.googleapis.com/auth/userinfo.profile");
		
	}
	
	/**
	 * Cria uma url de redirecionamento para login do google.
	 */
	public function createUrl() {
	
		return $this->client->createAuthUrl();
		
	}
	
	/**
	 * Autentica o $code pelo google.
	*/
	public function checkLogin($code) {

		if (isset($code)) {
		
			try {
				$this->client->authenticate($code);
				$_SESSION[session_prefix]["access_token"] = $this->client->getAccessToken();
				
			} catch(Exception $exc) {
				return false;
			}
			
		}
		
		if (isset($_SESSION[session_prefix]["access_token"])) {

			$service = new Google_Service_Oauth2($this->client);
			
			$data = $service->userinfo->get();	
	

		}
		
		return isset($data) ? $data : false;
		
	}
	
}

?>