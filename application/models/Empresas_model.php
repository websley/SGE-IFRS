<?php

class Empresas_model extends CI_Model {


  function getEmpresas(){

		$array = $this->db->query('select *, null as qtd from empresa where status = "A"')->result_array();
	
		foreach($array as &$a){
			
			$qtd = $this->db->query('select count(a.id_aluno) as qtd from empresa as em
				left join estagios as es on em.id_empresa = es.id_empresa
				left join aluno as a on es.id_aluno = a.id_aluno
					where es.id_status not in (4,5)
					and em.id_empresa = '.$a['id_empresa'])->row(0);
						
			$a['qtd'] = $qtd->qtd;
		}
	
		return $array;
	}
	
	function getEstagiosEmpresas(){
		
		return $this->db->query('select a.nome, a.telefone, a.email, es.id_empresa
		from aluno as a 
			join estagios as es on a.id_aluno = es.id_aluno
			join empresa as em on es.id_empresa = em.id_empresa')->result_array();

	}

	
	function getEmpresasID(){
		
		return $this->db->query('select id_empresa, nome from empresa where status = "A"')->result_array();
		
	}
	
	function cadastraEmpresa($data){
		
			$att_user = null;
		if(!empty($data['senha'])){
			//cria senha aleatoria
			$att_user = 1;
			$senha = md5($data['senha']);
			$_SESSION[session_prefix]['usuario'] = $data['nome'];
			$_SESSION[session_prefix]['perfil'] = 4;
		}else{
			$senha = md5(mt_rand(10000,99999));
		}
	
		unset($data['senha']);
		
		$this->db->insert('empresa', $data); 
		$last_id = $this->db->insert_id();
		
		if($att_user)
			$_SESSION[session_prefix]['id_cadastro'] = $last_id;
		
		$usuario = array(
			'senha' => $senha,
			'id_cadastro' => $last_id,
			'nome' => $data['nome'],
			'email' => $data['email'],
			'perfil_id' => 4,
		);
						
		$this->db->insert('usuarios',$usuario); 
		
		return true;
	}
	
	function cadastraSupervisor($data){
		
		$this->db->insert('supervisor_estagio', $data); 
		
		return true;
	}
	
	function pesquisaSupervisores($id_empresa){

		return $this->db->where('id_empresa',$id_empresa)->get('supervisor_estagio')->result_array();
		
	}
	
	function qtdEstagioEmpresa(){
		
		return $this->db->query('select e.id_empresa, count(a.id_aluno) as qtd from empresa as e 
		left join estagios as es on e.id_empresa = es.id_empresa
		left join aluno as a on es.id_aluno = a.id_aluno
		group by e.id_empresa')->result_array();
		
	}
	
	function getEmpresabyId($id){
		
		return $this->db->where('id_empresa',$id)->get('empresa')->row_array();
	}
	
	function editarEmpresa($d){
		
		$this->db->update('empresa', 
			array(
				'nome' => $d['nome'],
				'email' => $d['email'],
				'cnpj' => $d['cnpj'],
				'razao_social' => $d['razao_social'],
				'cidade' => $d['cidade'],
				'ramo_atividade' => $d['ramo_atividade'],
				'telefone' => $d['telefone'],
				'endereco' => $d['endereco'],
				'rep_legal' => $d['representante_legal'],
				'rep_cargo' => $d['cargo_representante'],
				'rep_rg' => $d['rep_rg'],
				'rep_orgao_emissor' => $d['rep_orgao_emissor'],
				'rep_data_expedido' => $d['rep_data_expedido'],							
				'rep_cpf' => $d['rep_cpf'],
			), array(
				'id_empresa' => $d['id_empresa']
			));
		
		return true;
	}
		
	function getSupervisorbyId($id){
		
		return $this->db->where('id_supervisor',$id)->get('supervisor_estagio')->row_array();
		
	}

	function getEstagiosEmpresa($id){
		
		return $this->db->query('
			select a.nome, a.email, a.telefone , a.curso, e.data_inicio, e.data_desistencia, 
			e.data_termino, e.id_status from estagios as e
			join aluno as a on a.id_aluno = e.id_aluno
			where id_empresa = '.$id.' order by e.id_status')->result_array();
	}
	
	function  editarDadosEmpresa($d){
	
		$this->db->update('empresa', $d, "id_empresa = ".$_SESSION[session_prefix]['id_cadastro']);
		
		return true;
	}
	
	function excluirEmpresa($id){
					
		$this->db->update('empresa', array(
			'status' => 'I',
		), array(
			'id_empresa' => $id
		));
		
		return true;
	}
}

?>
