<?php

class Adm_model extends CI_Model {



  function getDadosAluno($id){

	return	$this->db->query("
   select p.nome as professor, a.nome as aluno , a.curso, a.turma from estagios as e 
    	join aluno as a on e.id_aluno = a.id_aluno
    	join professores as p on e.id_professor = p.id_professor
    	where e.id_estagio =".$id)->row_array();

	}
	
	function getNomeALunoProfessor($id){
		
		return	$this->db->query("
		select a.nome as aluno, a.curso as curso , p.nome as professor
			from estagios as es 
			join aluno as a on es.id_aluno = a.id_aluno
			join professores as p on es.id_professor = p.id_professor
		where es.id_estagio = ".$id)->row_array();

	}
		
	
	function getDadosCompromissoDeEstagio($id){
		
		return	$this->db->query("select es.bolsa_aux, 
	es.carga_horaria, 
	es.carga_horaria_dia, 
	es.data_inicio,
	es.data_termino,
	es.obrigatorio,
	es.bolsa_aux,
	es.remuneracao,
	em.cnpj,
	em.ramo_atividade,
	em.endereco as endereco_empresa,
	em.cidade as cidade_empresa,
	em.email as email_empresa,
	em.razao_social,
	em.telefone as telefone_empressa,
	em.rep_legal,
	em.rep_cargo,
	a.nome,
	a.curso,
	a.cpf,
	a.endereco as endereco_aluno,
	a.rg,
	a.bairro,
	a.orgao_expedidor,
	a.data_expedicao,
	a.data_nascimento,
	a.bairro,
	a.CEP,
	a.cidade as cidade_aluno,
	a.uf,
	a.telefone as telefone_aluno,
	a.celular,
	a.email as email_aluno,
	su.nome as nome_super,
	su.formacao,
	su.email as email_super,
	su.telefone as telefone_super
	from estagios as es 
		join empresa as em on es.id_empresa = em.id_empresa
		join aluno as a on es.id_aluno = a.id_aluno
		left join supervisor_estagio as su on es.id_supervisor = su.id_supervisor
		where es.id_estagio =".$id)->row_array();
		
	}
	
	
		function cadastraAluno($data){
		
			$this->db->insert('aluno', $data); 

			return true;

		}

	
	/*
	function cadastraEstagio($data){
		
		//$this->db->insert('estagios', $data); 
		
				echo  $data['id_aluno'];
				
				$this->db->update('aluno', array(
						'id_status' => 1,
					), array(
						'id_aluno' => $data['id_aluno'],
					));
		var_dump($data);
	die();
		//return true;
		
	}*/
	
	function planoAtividadeEstagio($id){
		
		return $this->db->query('select 
	 			a.nome as nome_aluno, a.curso, 
				e.nome as nome_empresa, su.nome as nome_super, 
				es.data_inicio, es.data_termino, es.objetivo_estagio, es.atividade_prevista, es.outras_info
				from estagios as es
			join aluno as a on es.id_aluno = a.id_aluno 
			join empresa as e on e.id_empresa = es.id_empresa
			left join supervisor_estagio as su on es.id_supervisor = su.id_supervisor
				where es.id_estagio = '.$id)->row_array(); 
		
	}
	
	function confirmacaoEmpresa($id){
		
		return $this->db->query('				
	select 
		a.nome as nome_aluno, a.curso,
		es.transporte, es.alimentacao, es.remuneracao, es.agente_integracao,
		em.nome as nome_empresa, em.razao_social,
		em.cnpj, em.ramo_atividade, em.endereco,
		em.cidade, em.telefone, em.email, em.rep_legal, em.rep_cargo,
		sup.nome as nome_super, sup.formacao,
		es.*
		from estagios as es
	join empresa as em on es.id_empresa = em.id_empresa
	join aluno as a on es.id_aluno = a.id_aluno
	left join supervisor_estagio as sup on es.id_supervisor = sup.id_supervisor
		where es.id_estagio = '.$id)->row_array(); 
		
	}
	
	function avaliacaoestagioEmpresa($id){
		
		return $this->db->query('select 
				a.nome as aluno, a.curso as curso,
				e.nome as empresa, e.telefone, e.cidade, 
				su.nome as supervisor,
				es.data_inicio, es.data_termino, es.carga_horaria
			from estagios as es 
			join aluno as a on es.id_aluno = a.id_aluno
			join empresa as e on es.id_empresa = e.id_empresa
			left join supervisor_estagio as su on es.id_supervisor = su.id_supervisor
				where es.id_estagio ='. $id)->row_array();

	}
	
	
	//LOGIN
	function login($user, $senha){
		
		return $this->db->query('select * from usuarios as u
				join perfil as p on u.perfil_id = p.perfil_id
			where u.email like "'.$user.'" and u.senha like "'.md5($senha).'"')->row_array();
	
	}
	
	//Função que verifica se o aluno ja existe no sistema
	function verificao_aluno($cpf,$nome,$rg){
		
		return $this->db->query('select nome from  aluno where cpf = '.$cpf)->row_array();
	
	}

	///Função que verifica se o professor ja existe no sistema
	function verificao_professor($email,$nome){
		
		return $this->db->query('select nome from professores where email = "'.$email.'" and nome like "'.$nome.'"')->row_array();
	
	}
	
	///Função que verifica se a empressa ja existe no sistema
	function verificao_empresa($razao,$cnpj){
		
		return $this->db->query('select nome from empresa where cnpj = "'.$cnpj.'" and razao_social like "'.$razao.'"')->row_array();
	
	}
	
	function sendEmailInicio(){
		
		//ini_set('display_errors', 1);
		//error_reporting(E_ALL);

			$from = "wesley.s.gomes@hotmail.com";
			$to = "ueslei.greeio@gmail.com";
			$assunto = "Verificando o correio do PHP";
			$email = "O correio do PHP funciona bem";
			$headers = "De:". $from;

			mail($to, $assunto, $email, $headers);

			echo "A mensagem de e-mail foi enviada.";
		
		
	}
	
			/**
	 * Configurações para envio de e-mail.
	 * @return void
	 */
	function initEmail() {
		
		$this->load->library('email');
		
		$config['protocol']  = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "noreplay.ifrsestagios@gmail.com"; 
		$config['smtp_pass'] = "Mkt20Q30t80";
		$config['charset']   = "utf-8";
		$config['mailtype']  = "html";
		$config['newline']   = "\r\n";
		
		$this->email->initialize($config);
		$this->email->from('noreplay.ifrsestagios@gmail.com', 'Estagios IFRS Osorio');
	}
	
	
	
	



}

?>
