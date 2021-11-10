<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class warga extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();	
		$this->load->model('m_data_warga');
		$this->load->helper('url');
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
		$data['warga'] = $this->m_data_warga->get_data()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/warga/datatable',$data);
		$this->load->view('template/footer/index');
	}

	// process input
	 public function p_input(){
	 	$no_kk = $this->input->post('no_kk');
	 	$no_nip = $this->input->post('no_nip');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$address_ktp = $this->input->post('address_ktp');
		$address_domisili = $this->input->post('address_domisili');
		$status_home = $this->input->post('status_home');
		$status_move = $this->input->post('status_move');
		$status_retribusi = $this->input->post('status_retribusi');
		$contact = $this->input->post('contact');
		$start_living = $this->input->post('start_living');
		$end_living = $this->input->post('end_living');
		

		$data = array(
			'no_kk' => $no_kk,
			'no_nip' => $no_nip,
			'name' => $name,
			'sex' => $sex,
			'address_ktp' => $address_ktp,
			'address_domisili' => $address_domisili,
			'status_home' => $status_home,
			'status_move' => $status_move,
			'status_retribusi' => $status_retribusi,
			'contact' => $contact,
			'start_living' => $start_living,
			'end_living' => $end_living

			);

		$this->m_data_warga->input_data($data,'amara_m_warga');
		redirect('warga');
	}

	// display input
	public function input(){
		$data['warga'] = $this->m_data_Warga->get_data()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/warga/input',$data);
		$this->load->view('template/footer/index');

	}

 	// process update
	 public function update(){
		$id= $this->input->post('id');
		$no_kk = $this->input->post('no_kk');
	 	$no_nip = $this->input->post('no_nip');
		$name = $this->input->post('name');
		$sex = $this->input->post('sex');
		$address_ktp = $this->input->post('address_ktp');
		$address_domisili = $this->input->post('address_domisili');
		$status_home = $this->input->post('status_home');
		$status_move = $this->input->post('status_move');
		$status_retribusi = $this->input->post('status_retribusi');
		$contact = $this->input->post('contact');
		$start_living = $this->input->post('start_living');
		$end_living = $this->input->post('end_living');

		$data = array(
			'no_kk' => $no_kk,
			'no_nip' => $no_nip,
			'name' => $name,
			'sex' => $sex,
			'address_ktp' => $address_ktp,
			'address_domisili' => $address_domisili,
			'status_home' => $status_home,
			'status_move' => $status_move,
			'status_retribusi' => $status_retribusi,
			'contact' => $contact,
			'start_living' => $start_living,
			'end_living' => $end_living,
			'editDate'=>date('Y-m-d H:i:s')
		);

		$where = array(
			'id' => $id
		);

		$this->m_data_warga->update_data($where,$data,'amara_m_warga');
		redirect('warga/index');
		// var_dump ($data);
	}

	//display get data edit
	public function edit($id=''){
		$where = array('id' => $id);
		$data['warga'] = $this->m_data_warga->get_data_edit($where,'amara_m_warga')->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/warga/edit',$data);
		$this->load->view('template/footer/index');
	}

	// process delete
	public function delete($id){
		$where = array('id' => $id);
		$this->m_data_warga->delete_data($where,'amara_m_warga');
		redirect('warga/index');
	}



}