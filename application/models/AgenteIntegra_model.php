<?php

class AgenteIntegra_model extends CI_Model {

	function getAgenteById($id){
		return $this->db->where('id_agente_integracao',$id)->get('agente_integracao')->row_array(0);
	}

    function cadastraAgente($data){
		$this->db->insert('agente_integracao', $data); 
		return true;
	}
	
	function getAgentes(){
		return  $this->db->get('agente_integracao')->result_array();
	}

	function editarAgente($d){
		$this->db->update('agente_integracao', array(
			'nome' => $d['nome'],
		), array(
			'id_agente_integracao' => $d['id_agente_integracao']
		));
		return true;
	}
	
	function excluirAgente($id){

		$this->db->where('id_agente_integracao', $id);
		$this->db->delete('agente_integracao');
		return true;
	}
}


?>
