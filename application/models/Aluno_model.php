<?php

class ALuno_model extends CI_Model {

	function getALunobyId($id){

		return $this->db->where('id_aluno',$id)->get('aluno')->row_array(0);

	}
	
			
	function getAlunosID(){
		
		return $this->db->query('select id_aluno, nome from aluno where status = "A"')->result_array();

	}	

	function getAlunos(){

		return  $this->db->where('status', 'A')->order_by('id_aluno','asc')->get('aluno')->result_array();

	}

	function editarAluno($d){
	

		$this->db->where('id_aluno',  $d['id_aluno']);
		$this->db->update('aluno', $d);
		
		
		return true;
		
	}
	
	function detalhesHoras($id){
		
		
		return $this->db->query('
		select e.id_estagio, e.id_status, e.carga_horaria, em.nome,e. data_inicio, data_termino, data_desistencia from estagios  as e
			join empresa as em on e.id_empresa = em.id_empresa
		where id_aluno = '.$id.' and id_status in (4,5)')->result_array();
		
		
	}
	
	function excluirAluno($id){
					
					$this->db->update('aluno', array(
						'status' => 'I',
					), array(
						'id_aluno' => $id
					));
					
					
					return true;
	}









}


?>
