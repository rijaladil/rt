<?php 

 class t_jurnal extends CI_Model{
	public function get_data(){
		return $this->db->query("SELECT 
								    ti.id,
								    ti.pay_date,
								    'i' AS mutasi,
								    ti.nominal AS pendapatan,
								    '' AS pengeluaran,
									w.name as keterangan,
								    ti.pay_month_year AS  note,
								    ti.createDate
								FROM
								    amara_t_iuran  ti
								    LEFT JOIN amara_m_warga  w
								    ON w.id = ti.id_warga
								UNION SELECT 
								    id, 
								    date, 
								    'd', 
								    nominal AS pendapatan, 
								    '', 
								    information, 
								    note, 
								    createDate
								FROM
								    amara_t_pemasukan 
								UNION SELECT 
								    id, 
								    date, 
								    'k',
								    '', 
								    nominal AS pengeuaran, 
								    information, 
								    note, 
								    createDate
								FROM
								    amara_t_pengeluaran
								ORDER BY pay_date DESC
");
	}


}

?>