<?php 

 class T_iuran extends CI_Model{
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

  public function get_data_realtime(){
		return $this->db->query('SELECT 
								iuran.id, 
								warga.name, 
								warga.address_domisili, 
								iuran.id_warga,
							    iuran.pay_date, 
							    iuran.pay_month_year, 
							    iuran.nominal,
								iuran.keterangan 
							FROM amara_t_iuran iuran 
							LEFT JOIN amara_m_warga warga 
							ON iuran.id_warga = warga.id 
							WHERE warga.status_retribusi = 1
							AND iuran.createDate >= NOW() - INTERVAL 1 DAY
							ORDER BY iuran.createDate DESC
		
		');
	}


  public function get_data_show($id){


		$query = $this->db->query("SELECT * FROM amara_m_month where pay_month_year NOT IN 
			(SELECT pay_month_year FROM amara_t_iuran WHERE id_warga = $id)
			 AND pay_month_year BETWEEN 
			 (SELECT start_living from amara_m_warga where id = $id) 
			 AND NOW()");

		return $query->result();

	}
	
public function get_data_month(){
	return $this->db->query('SELECT * FROM amara_m_month ORDER BY id DESC');
	
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