<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class lastpay extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();	
		$this->load->model('t_iuran');
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
	public function index(){
		$data['iuran'] = $this->t_iuran->get_data_iuran_all()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Lastpay/datatable',$data);
		$this->load->view('template/footer/index');
	}
}