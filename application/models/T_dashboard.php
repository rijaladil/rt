<?php 

 class t_dashboard extends CI_Model{
	public function get_data_saldo(){
		return $this->db->query('
			SELECT ( 
			(SELECT SUM(nominal) from amara_t_iuran)+ 
			(SELECT SUM(nominal) from amara_t_pemasukan)- 
			(SELECT SUM(nominal) from amara_t_pengeluaran)) as saldo_kas,
			(SELECT sum(nominal) FROM `amara_t_pemasukan` WHERE MONTH(date) = DATE_FORMAT(NOW(), "%m") AND YEAR(date) = DATE_FORMAT(NOW(), "%Y")) as pemasukan,
			(SELECT sum(nominal) FROM `amara_t_pengeluaran` WHERE MONTH(date) = DATE_FORMAT(NOW(), "%m") AND YEAR(date) = DATE_FORMAT(NOW(), "%Y")) as pengeluaran,
			(SELECT sum(nominal) FROM `amara_t_iuran` WHERE MONTH(pay_month_year) = DATE_FORMAT(NOW(), "%m") AND YEAR(pay_month_year) = DATE_FORMAT(NOW(), "%Y")) as iuran,
			(SELECT sum(nominal) FROM `amara_t_iuran` WHERE MONTH(pay_date) = DATE_FORMAT(NOW(), "%m") AND YEAR(pay_date) = DATE_FORMAT(NOW(), "%Y")) as iuran_per_month,
			(SELECT count(*)  FROM `amara_t_iuran` WHERE MONTH(pay_date) = DATE_FORMAT(NOW(), "%m") AND YEAR(pay_date) = DATE_FORMAT(NOW(), "%Y")) as qty_iuran_per_month,
			((SELECT count(*)  FROM `amara_t_iuran` WHERE MONTH(pay_month_year) = DATE_FORMAT(NOW(), "%m") AND YEAR(pay_month_year) = DATE_FORMAT(NOW(), "%Y"))) as qty_iuran

		');
	}

		



		public function get_data_summary(){
		return $this->db->query('
			SELECT ( 
			(SELECT SUM(nominal) from amara_t_iuran)+ 
			(SELECT SUM(nominal) from amara_t_pemasukan)- 
			(SELECT SUM(nominal) from amara_t_pengeluaran)) as tot_saldo_kas,
			((SELECT SUM(nominal) from amara_t_iuran)+ (SELECT sum(nominal) FROM `amara_t_pemasukan`)) as tot_pemasukan,
			(SELECT sum(nominal) FROM `amara_t_pemasukan`) as tot_pemasukan_lain,
			(SELECT sum(nominal) FROM `amara_t_pengeluaran`) as tot_pengeluaran,
			(SELECT sum(nominal) FROM `amara_t_iuran`) as tot_iuran,
			(SELECT sum(nominal) FROM `amara_t_pengeluaran` WHERE `information` LIKE "%iuran%") as tot_setor_rw,


			(SELECT sum(nominal) FROM `amara_t_pemasukan` WHERE `date` BETWEEN (DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m-01" )) AND (DATE_FORMAT(now(),"%Y-%m-31"))) as tot_triwulan_pemasukan_lain,

			(SELECT sum(nominal) FROM `amara_t_pengeluaran`WHERE `date` BETWEEN (DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m-01" )) AND (DATE_FORMAT(now(),"%Y-%m-31"))) as tot_triwulan_pengeluaran,

			(SELECT sum(nominal) FROM `amara_t_iuran`WHERE `pay_date` BETWEEN (DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m-01" )) AND (DATE_FORMAT(now(),"%Y-%m-31")) ) as tot_triwulan_iuran,

			(SELECT sum(nominal) FROM `amara_t_pengeluaran` WHERE `information` LIKE "%iuran%" AND  `date` BETWEEN (DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m-01" )) AND (DATE_FORMAT(now(),"%Y-%m-31"))) as tot_triwulan_setor_rw

			
		');
	}


		public function get_data_summary_iuran(){
		return $this->db->query('
        SELECT 
        (SELECT sum(nominal) FROM `amara_t_iuran`WHERE (DATE_FORMAT(`pay_date`,"%Y-%m")) = (DATE_FORMAT(now(),"%Y-%m"))) as summary_iuran_1,
         (SELECT sum(nominal) FROM `amara_t_iuran`WHERE `pay_date` BETWEEN (DATE_FORMAT(now() - INTERVAL 1 MONTH,"%Y-%m-01" )) AND (DATE_FORMAT(now() - INTERVAL 1 MONTH,"%Y-%m-31")) ) as summary_iuran_2,
          (SELECT sum(nominal) FROM `amara_t_iuran`WHERE `pay_date` BETWEEN (DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m-01" )) AND (DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m-31")) ) as summary_iuran_3
	    
	    
		');
	}

		public function get_data_summary_pemasukan(){
		return $this->db->query('
        SELECT * FROM `amara_t_pemasukan` WHERE DATE_FORMAT(date, "%Y-%m") >= DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m")
	    
	    
		');
	}

		public function get_data_summary_pengeluaran1(){
		return $this->db->query('
        SELECT * FROM `amara_t_pengeluaran` WHERE `information` LIKE "%iuran%" AND DATE_FORMAT(date, "%Y-%m") >= DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m")
	    
	    
		');
	}


		public function get_data_summary_pengeluaran2(){
		return $this->db->query('
        SELECT * FROM `amara_t_pengeluaran` WHERE `information` NOT LIKE "%iuran%" AND DATE_FORMAT(date, "%Y-%m") >= DATE_FORMAT(now() - INTERVAL 2 MONTH,"%Y-%m")
	    
	    
		');
	}

		public function get_data_iuran(){
		// return $this->db->query('select * from  amara_t_iuran');
		return $this->db->query('
        SELECT *
        FROM amara_t_iuran 
		LEFT JOIN amara_m_warga 
		ON amara_t_iuran.id_warga = amara_m_warga.id 
		 WHERE MONTH(amara_t_iuran.pay_month_year) = DATE_FORMAT(NOW(), "%m") AND YEAR(amara_t_iuran.pay_month_year) = DATE_FORMAT(NOW(), "%Y") 
	    
	    
		');
	}






}

?>