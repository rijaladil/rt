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


	public function get_data_iuran_tahun(){
		return $this->db->query('
        SELECT 
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-01-01") AND DATE_FORMAT(NOW(),"%Y-01-31")) as bln1,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-02-01") AND DATE_FORMAT(NOW(),"%Y-02-31")) as bln2,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-03-01") AND DATE_FORMAT(NOW(),"%Y-03-31")) as bln3,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-04-01") AND DATE_FORMAT(NOW(),"%Y-04-31")) as bln4,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-05-01") AND DATE_FORMAT(NOW(),"%Y-05-31")) as bln5,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-06-01") AND DATE_FORMAT(NOW(),"%Y-06-31")) as bln6,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-07-01") AND DATE_FORMAT(NOW(),"%Y-07-31")) as bln7,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-08-01") AND DATE_FORMAT(NOW(),"%Y-08-31")) as bln8,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-09-01") AND DATE_FORMAT(NOW(),"%Y-09-31")) as bln9,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-10-01") AND DATE_FORMAT(NOW(),"%Y-10-31")) as bln10,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-11-01") AND DATE_FORMAT(NOW(),"%Y-11-31")) as bln11,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW(),"%Y-12-01") AND DATE_FORMAT(NOW(),"%Y-12-31")) as bln12,


        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-01-01") AND DATE_FORMAT(NOW(),"%Y-01-31")) as iuran_bln1,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-02-01") AND DATE_FORMAT(NOW(),"%Y-02-31")) as iuran_bln2,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-03-01") AND DATE_FORMAT(NOW(),"%Y-03-31")) as iuran_bln3,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-04-01") AND DATE_FORMAT(NOW(),"%Y-04-31")) as iuran_bln4,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-05-01") AND DATE_FORMAT(NOW(),"%Y-05-31")) as iuran_bln5,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-06-01") AND DATE_FORMAT(NOW(),"%Y-06-31")) as iuran_bln6,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-07-01") AND DATE_FORMAT(NOW(),"%Y-07-31")) as iuran_bln7,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-08-01") AND DATE_FORMAT(NOW(),"%Y-08-31")) as iuran_bln8,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-09-01") AND DATE_FORMAT(NOW(),"%Y-09-31")) as iuran_bln9,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-10-01") AND DATE_FORMAT(NOW(),"%Y-10-31")) as iuran_bln10,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-11-01") AND DATE_FORMAT(NOW(),"%Y-11-31")) as iuran_bln11,
		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date AND date BETWEEN DATE_FORMAT(NOW(),"%Y-12-01") AND DATE_FORMAT(NOW(),"%Y-12-31")) as iuran_bln12,


        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-01-01") AND DATE_FORMAT(NOW(),"%Y-01-31")) as bln_my1,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-02-01") AND DATE_FORMAT(NOW(),"%Y-02-31")) as bln_my2,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-03-01") AND DATE_FORMAT(NOW(),"%Y-03-31")) as bln_my3,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-04-01") AND DATE_FORMAT(NOW(),"%Y-04-31")) as bln_my4,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-05-01") AND DATE_FORMAT(NOW(),"%Y-05-31")) as bln_my5,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-06-01") AND DATE_FORMAT(NOW(),"%Y-06-31")) as bln_my6,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-07-01") AND DATE_FORMAT(NOW(),"%Y-07-31")) as bln_my7,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-08-01") AND DATE_FORMAT(NOW(),"%Y-08-31")) as bln_my8,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-09-01") AND DATE_FORMAT(NOW(),"%Y-09-31")) as bln_my9,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-10-01") AND DATE_FORMAT(NOW(),"%Y-10-31")) as bln_my10,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-11-01") AND DATE_FORMAT(NOW(),"%Y-11-31")) as bln_my11,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW(),"%Y-12-01") AND DATE_FORMAT(NOW(),"%Y-12-31")) as bln_my12
	    
	    
		');
	}


	public function get_data_iuran_tahun_last(){
		return $this->db->query('
        SELECT 
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-31")) as blnl1,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-31")) as blnl2,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-31")) as blnl3,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-31")) as blnl4,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-31")) as blnl5,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-31")) as blnl6,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-31")) as blnl7,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-31")) as blnl8,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-31")) as blnl9,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-31")) as blnl10,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-31")) as blnl11,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-31")) as blnl12,


		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-31")) as iuran_blnl1,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-31")) as iuran_blnl2,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-31")) as iuran_blnl3,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-31")) as iuran_blnl4,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-31")) as iuran_blnl5,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-31")) as iuran_blnl6,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-31")) as iuran_blnl7,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-31")) as iuran_blnl8,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-31")) as iuran_blnl9,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-31")) as iuran_blnl10,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-31")) as iuran_blnl11,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-31")) as iuran_blnl12,


        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-31")) as blnl_my1,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-31")) as blnl_my2,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-31")) as blnl_my3,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-31")) as blnl_my4,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-31")) as blnl_my5,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-31")) as blnl_my6,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-31")) as blnl_my7,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-31")) as blnl_my8,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-31")) as blnl_my9,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-31")) as blnl_my10,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-31")) as blnl_my11,
        (SELECT sum(nominal)FROM `amara_t_iuran` WHERE pay_month_year BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-31")) as blnl_my12
	    
	    
		');
	}


	public function get_data_pemasukan_pengeluaran(){
		return $this->db->query('
        SELECT 


		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-01-01") AND DATE_FORMAT(NOW(),"%Y-01-31")) as yukl_blnl1,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-02-01") AND DATE_FORMAT(NOW(),"%Y-02-31")) as yukl_blnl2,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-03-01") AND DATE_FORMAT(NOW(),"%Y-03-31")) as yukl_blnl3,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-04-01") AND DATE_FORMAT(NOW(),"%Y-04-31")) as yukl_blnl4,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-05-01") AND DATE_FORMAT(NOW(),"%Y-05-31")) as yukl_blnl5,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-06-01") AND DATE_FORMAT(NOW(),"%Y-06-31")) as yukl_blnl6,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-07-01") AND DATE_FORMAT(NOW(),"%Y-07-31")) as yukl_blnl7,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-08-01") AND DATE_FORMAT(NOW(),"%Y-08-31")) as yukl_blnl8,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-09-01") AND DATE_FORMAT(NOW(),"%Y-09-31")) as yukl_blnl9,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-10-01") AND DATE_FORMAT(NOW(),"%Y-10-31")) as yukl_blnl10,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-11-01") AND DATE_FORMAT(NOW(),"%Y-11-31")) as yukl_blnl11,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW(),"%Y-12-01") AND DATE_FORMAT(NOW(),"%Y-12-31")) as yukl_blnl12,


		(SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-01-01") AND DATE_FORMAT(NOW(),"%Y-01-31")) as yuml_blnl1,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-02-01") AND DATE_FORMAT(NOW(),"%Y-02-31")) as yuml_blnl2,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-03-01") AND DATE_FORMAT(NOW(),"%Y-03-31")) as yuml_blnl3,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-04-01") AND DATE_FORMAT(NOW(),"%Y-04-31")) as yuml_blnl4,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-05-01") AND DATE_FORMAT(NOW(),"%Y-05-31")) as yuml_blnl5,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-06-01") AND DATE_FORMAT(NOW(),"%Y-06-31")) as yuml_blnl6,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-07-01") AND DATE_FORMAT(NOW(),"%Y-07-31")) as yuml_blnl7,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-08-01") AND DATE_FORMAT(NOW(),"%Y-08-31")) as yuml_blnl8,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-09-01") AND DATE_FORMAT(NOW(),"%Y-09-31")) as yuml_blnl9,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-10-01") AND DATE_FORMAT(NOW(),"%Y-10-31")) as yuml_blnl10,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-11-01") AND DATE_FORMAT(NOW(),"%Y-11-31")) as yuml_blnl11,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW(),"%Y-12-01") AND DATE_FORMAT(NOW(),"%Y-12-31")) as yuml_blnl12,



		(SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-31")) as ukl_blnl1,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-31")) as ukl_blnl2,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-31")) as ukl_blnl3,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-31")) as ukl_blnl4,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-31")) as ukl_blnl5,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-31")) as ukl_blnl6,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-31")) as ukl_blnl7,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-31")) as ukl_blnl8,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-31")) as ukl_blnl9,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-31")) as ukl_blnl10,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-31")) as ukl_blnl11,
        (SELECT sum(nominal) FROM `amara_t_pengeluaran`  WHERE `information` NOT LIKE "%iuran%" AND date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-31")) as ukl_blnl12,


		(SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-01-31")) as uml_blnl1,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-02-31")) as uml_blnl2,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-03-31")) as uml_blnl3,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-04-31")) as uml_blnl4,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-05-31")) as uml_blnl5,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-06-31")) as uml_blnl6,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-07-31")) as uml_blnl7,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-08-31")) as uml_blnl8,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-09-31")) as uml_blnl9,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-10-31")) as uml_blnl10,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-11-31")) as uml_blnl11,
        (SELECT sum(nominal) FROM `amara_t_pemasukan`  WHERE date BETWEEN DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-01") AND DATE_FORMAT(NOW() - INTERVAL 1 YEAR,"%Y-12-31")) as uml_blnl12


		');
	}




}

?>