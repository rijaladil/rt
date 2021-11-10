<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class iuran_person extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();	
		$this->load->model('t_iuran_person');
		$this->load->model('m_data_warga');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	private function check_isvalidated()
    {
        if
            (
                (!$this->session->userdata('loggin'))
                ||
                (!in_array($this->session->userdata('level'), array(1,2)))
            )
        {
            redirect('login');
        }
	}
	
	// halaman utama 
	public function index(){
		$data['iuran'] = $this->t_iuran->get_data()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$data['iuran_now'] = $this->t_iuran->get_data_realtime()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iuran/datatable',$data);
		$this->load->view('template/footer/index');
	}

	public function show($id=''){
		$data['show'] = $this->t_iuran->get_data_show($id);
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$data['id'] = $id;
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iuran/show',$data);
		$this->load->view('template/footer/index');
	}


}