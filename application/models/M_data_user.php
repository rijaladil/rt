<?php 

 
class m_data_user extends CI_Model{
	
	function get_data(){
		return $this->db->get('amara_m_user');
		}

	

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);

	}

 

	function get_data_edit($where,$table){		
		return $this->db->get_where($table,$where);

	}

 

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);

	}	

}

?>