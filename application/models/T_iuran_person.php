<?php 

 class T_iuran_person extends CI_Model{
	public function get_data(){
		// return $this->db->query('select * from  amara_t_iuran');
		return $this->db->query('
        SELECT * 
        FROM amara_t_iuran 
		LEFT JOIN amara_m_warga 
		ON amara_t_iuran.id_warga = amara_m_warga.id 
		WHERE amara_m_warga.status_retribusi = 1
        AND amara_t_iuran.id in (SELECT max(amara_t_iuran.id) from `amara_t_iuran` group by amara_t_iuran.id_warga) 
	    
	    
		');
	}



  public function get_data_show($id){


		$query = $this->db->query("SELECT * FROM amara_m_month where pay_month_year NOT IN 
			(SELECT pay_date, pay_month_year FROM amara_t_iuran WHERE id_warga = $id)
			 AND pay_month_year BETWEEN 
			 (SELECT start_living from amara_m_warga where id = $id) 
			 AND NOW()");

		return $query->result();

	}

public function get_data_show_last_pay($id){


		$query = $this->db->query("SELECT * FROM amara_m_month where pay_month_year IN 
			(SELECT pay_date, pay_month_year FROM amara_t_iuran WHERE id_warga = $id)
			");

		return $query->result();

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