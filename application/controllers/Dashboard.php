<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class dashboard extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();	
		$this->load->model('t_dashboard');
		$this->load->helper('url');
	}

	private function check_isvalidated()
    {
        if
            (
                (!$this->session->userdata('loggin'))
                ||
                (!in_array($this->session->userdata('level'), array(1,2,3)))
            )
        {
            redirect('login');
        }
	}
	
	//DASHBOARD
	public function index(){
		$data['dashboard_saldo'] = $this->t_dashboard->get_data_saldo()->result();		
	    $data['iuran_now'] = $this->t_dashboard->get_data_iuran()->result();
	    $data['tot_summary'] = $this->t_dashboard->get_data_summary()->result();
	    $data['tot_summary_3'] = $this->t_dashboard->get_data_summary_iuran()->result();
	    $data['tot_summary_pemasukan'] = $this->t_dashboard->get_data_summary_pemasukan()->result();
	    $data['tot_summary_pengeluaran1'] = $this->t_dashboard->get_data_summary_pengeluaran1()->result();
	    $data['tot_summary_pengeluaran2'] = $this->t_dashboard->get_data_summary_pengeluaran2()->result();

	    $data['iuran_bln'] = $this->t_dashboard->get_data_iuran_tahun()->result();
	    $data['iuran_bln_last'] = $this->t_dashboard->get_data_iuran_tahun_last()->result();

		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/dashboard/index',$data);
		$this->load->view('template/footer/index');
	}

	


 	


}