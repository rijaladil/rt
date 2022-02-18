<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class pemasukan extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();	
		$this->load->model('t_pemasukan');
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
		$data['pemasukan'] = $this->t_pemasukan->get_data()->result();
		$data['coa'] = $this->t_pemasukan->get_data_coa()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Pemasukan/datatable',$data);
		$this->load->view('template/footer/index');
	}

	// process input
	 public function p_input(){
	 	$id_coa = $this->input->post('id_coa');
	 	$date = $this->input->post('date');
	 	$information = $this->input->post('information');
	 	$nominal = $this->input->post('nominal');
	 	$note = $this->input->post('note');
		

		$data = array(
			'id_coa' => $id_coa,
			'date' => $date,
			'information' => $information,
			'nominal' => $nominal,
			'note' => $note

			);

		$this->t_pemasukan->input_data($data,'amara_t_pemasukan');
		redirect('Pemasukan');
	}

	// display input
	public function input(){
		$data['pemasukan'] = $this->t_pemasukan->get_data()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Pemasukan/input',$data);
		$this->load->view('template/footer/index');

	}

 	// process update
	 public function update(){
		$id= $this->input->post('id');
	 	$id_coa = $this->input->post('id_coa');
	 	$date = $this->input->post('date');
	 	$information = $this->input->post('information');
	 	$nominal = $this->input->post('nominal');
	 	$note = $this->input->post('note');

		$data = array(
			'id_coa' => $id_coa,
			'date' => $date,
			'information' => $information,
			'nominal' => $nominal,
			'note' => $note,
			'editDate'=>date('Y-m-d H:i:s')
		);

		$where = array(
			'id' => $id
		);

		$this->t_pemasukan->update_data($where,$data,'amara_t_pemasukan');
		redirect('Pemasukan/index');
		// var_dump ($data);
	}

	//display get data edit
	public function edit($id=''){
		$where = array('id' => $id);
		$data['pemasukan'] = $this->t_pemasukan->get_data_edit($where,'amara_t_pemasukan')->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/Pemasukan/edit',$data);
		$this->load->view('template/footer/index');
	}

	// process delete
	public function delete($id){
		$where = array('id' => $id);
		$this->t_pemasukan->delete_data($where,'amara_t_pemasukan');
		redirect('Pemasukan/index');
	}



}