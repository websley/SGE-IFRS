<?php

class Supervisor_model extends CI_Model {

	function getSupervisoresID(){
		
		return $this->db->query('select id_supervisor, nome from supervisor_estagio where status = "A"')->result_array();
		
	}
	
	function excluirSupervisor($id){
					
					$this->db->update('supervisor_estagio', array(
						'status' => 'I',
					), array(
						'id_supervisor' => $id
					));
					
					
					return true;
	}
	
	function editarSupervisor($d){
		
			$this->db->update('supervisor_estagio', array(
							'nome' => $d['nome'],
							'email' => $d['email'],
							'telefone' => $d['telefone'],
							'formacao' => $d['formacao'],
							'id_empresa' => $d['id_empresa']
					), array(
						'id_supervisor' => $d['id_supervisor']
					));
		
		return true;
		
	}
	
		
	function getSupervisores(){
		
		$array = $this->db->query('
				select *, null as qtd from supervisor_estagio where status = "A"'.
				(!empty($_SESSION[session_prefix]['id_cadastro']) ? ' and id_empresa ='.$_SESSION[session_prefix]['id_cadastro'] : '')
				)->result_array();
				
		echo 'select *, null as qtd from supervisor_estagio where status = "A"'.
				(!empty($_SESSION[session_prefix]['id_cadastro']) ? ' and id_empresa ='.$_SESSION[session_prefix]['id_cadastro'] : '')
				;
				
		foreach($array as &$a){
			
			$qtd = $this->db->query('select count(a.id_aluno) as qtd from supervisor_estagio as sup
				left join estagios as es on sup.id_supervisor = es.id_supervisor
				left join aluno as a on es.id_aluno = a.id_aluno
					where es.id_status not in (4,5)
					and sup.id_supervisor = '.$a['id_supervisor'])->row(0);
			
			$a['qtd'] = $qtd->qtd;
		}
		
		

	return $array;
	
		
	}
	
		
}

?>
