<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class iuran extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();	
		$this->load->model('t_iuran');
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
		$data['month'] = $this->t_iuran->get_data_month()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$data['iuran_now'] = $this->t_iuran->get_data_realtime()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iuran/datatable',$data);
		$this->load->view('template/footer/index');
	}

	// process input
	 public function p_input(){
	 	$id_warga = $this->input->post('id_warga');
	 	$pay_date = $this->input->post('pay_date');
	 	$pay_month_year = $this->input->post('pay_month_year');
	 	$nominal = $this->input->post('nominal');
	 	$keterangan = $this->input->post('keterangan');
		

		$data = array(
			'id_warga' => $id_warga,
			'pay_date' => $pay_date,
			'pay_month_year' => $pay_month_year,
			'nominal' => $nominal,
			'keterangan' => $keterangan

			);

		$this->t_iuran->input_data($data,'amara_t_iuran');
		redirect('iuran');
	}

	// display input
	public function input(){
		$data['iuran'] = $this->t_iuran->get_data()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iuran/input',$data);
		$this->load->view('template/footer/index');

	}

 	// process update
	 public function update(){
		$id= $this->input->post('id');
	 	$pay_date = $this->input->post('pay_date');
	 	$pay_month_year = $this->input->post('pay_month_year');
	 	$nominal = $this->input->post('nominal');
	 	$keterangan = $this->input->post('keterangan');
	 	$id_coa = $this->input->post('id_coa');

		$data = array(
			'pay_date' => $pay_date,
			'pay_month_year' => $pay_month_year,
			'nominal' => $nominal,
			'keterangan' => $keterangan,
			'id_coa' => $id_coa,
			'editDate'=>date('Y-m-d H:i:s')
		);

		$where = array(
			'id' => $id
		);

		$this->t_iuran->update_data($where,$data,'amara_t_iuran');
		redirect('iuran/index');
		// var_dump ($data);
	}

	//display get data edit
	public function edit($id=''){
		$where = array('id' => $id);
		$data['iuran'] = $this->t_iuran->get_data_edit($where,'amara_t_iuran')->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iuran/edit',$data);
		$this->load->view('template/footer/index');
	}

	// process delete
	public function delete($id){
		$where = array('id' => $id);
		$this->t_iuran->delete_data($where,'amara_t_iuran');
		redirect('iuran/index');
	}


	public function show($id=''){
		$data['show'] = $this->t_iuran->get_data_show($id);
		$data['show_last_pay'] = $this->t_iuran->get_data_show_last_pay($id);
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$data['id'] = $id;
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Iuran/show',$data);
		$this->load->view('template/footer/index');
	}


}