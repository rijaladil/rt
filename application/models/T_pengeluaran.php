<?php 

 class t_pengeluaran extends CI_Model{
	public function get_data(){
		return $this->db->query('select p.id,
										c.no_rek,
										p.id_coa,
										p.date,
										p.information,
										p.nominal,
										p.note 
								 from  amara_t_pengeluaran p 
								 LEFT JOIN amara_m_coa c
							      ON p.id_coa = c.id
								  ORDER BY date DESC');
	}

	public function get_data_coa(){
		return $this->db->query('SELECT * FROM amara_m_coa');
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