<?php 

 class T_mudik extends CI_Model{
	public function get_data(){
		// return $this->db->query('select * from  amara_t_iuran');
		return $this->db->query('SELECT 
										m.id, 
										w.name,
										w.address_domisili,
										m.id_warga, 
										m.contact, 
										m.start, 
										m.finish, 
										m.tujuan, 
										m.penjaga, 
										m.penjaga_name, 
										m.penjaga_contact, 
										m.penjaga_nik, 
										m.keterangan
								 FROM amara_t_mudik m
								 LEFT JOIN amara_m_warga w 
								 ON m.id_Warga = w.id
								 ');
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