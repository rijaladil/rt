<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class iurannew extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
	
		$this->load->model('t_iuran');
		$this->load->model('m_data_warga');
		$this->load->helper('url');
		$this->load->helper('form');
	}


	// halaman utama 
	public function index(){
		$data['iuran'] = $this->t_iuran->get_data()->result();
		$data['month'] = $this->t_iuran->get_data_month()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$data['iuran_now'] = $this->t_iuran->get_data_realtime()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iurannew/iuran',$data);
		$this->load->view('template/footer/index');
	}












}