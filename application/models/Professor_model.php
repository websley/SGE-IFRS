<?php

class Professor_model extends CI_Model {


  function getProfessores(){

	//return	$this->db->query('select * from professores')->result_array();
	$array = $this->db->query('select *, null as qtd from professores where status = "A"')->result_array();

	
		foreach($array as &$a){
			
			$qtd = $this->db->query('select count(a.id_aluno) as qtd from professores as p 
		left join estagios as e on p.id_professor = e.id_professor
		left join aluno as a on e.id_aluno = a.id_aluno
		 where e.id_status not in (4,5)
		 and p.id_professor ='.$a['id_professor'])->row(0);
			
			$a['qtd'] = $qtd->qtd;
		}
	//var_dump($array);
	
	return $array;
	
	
	}
	
	function getAlunosProfessores(){
		
			return $this->db->query('select nome, curso, turma, email, id_professor from aluno')->result_array();

	}
	
	function cadastraProfessor($data){
				
		$this->db->insert('professores', $data); 
		
		return true;
	}
	

	function getProfessorbyId($id){
		
		
		return $this->db->where('id_professor',$id)->get('professores')->row_array();
		
	}
	
	function editarProfessor($d){
		
			$this->db->update('professores', array(
						'nome' => $d['nome'],
						'email' => $d['email']
					), array(
						'id_professor' => $d['id_professor']
					));
		
		return true;
		
	}
	
	function excluirProfessor($id){
					
					$this->db->update('professores', array(
						'status' => 'I',
					), array(
						'id_professor' => $id
					));
					
					
					return true;
	}
		
}

?>
