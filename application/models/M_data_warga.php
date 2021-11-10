<?php 

 class m_data_warga extends CI_Model{
	public function get_data(){
		return $this->db->query('select * from  amara_m_warga ORDER by address_domisili ASC');
	}

	public function get_data_active(){
		return $this->db->query('select * from  amara_m_warga WHERE status_retribusi = 1 ORDER by address_domisili ASC');
	} 
	
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

 	function get_data_edit($where,$table){		
		 $this->db->get_where($table,$where);
		
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}	

}

?>