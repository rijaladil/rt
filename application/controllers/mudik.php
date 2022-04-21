<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class mudik extends CI_Controller{

 
	function __construct(){
		parent::__construct();	
		// $this->check_isvalidated();	
		$this->load->model('t_mudik');
		$this->load->model('m_data_warga');
		$this->load->helper('url');
		$this->load->helper('form');
	}

	// private function check_isvalidated()
 //    {
 //        if
 //            (
 //                (!$this->session->userdata('loggin'))
 //                ||
 //                (!in_array($this->session->userdata('level'), array(1,2,3)))
 //            )
 //        {
 //            redirect('login');
 //        }
	// }
	
	// halaman utama 
	public function index(){
		$data['mudik'] = $this->t_mudik->get_data()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/mudik/datatable',$data);
		$this->load->view('template/footer/index');
	}

	// process input
	 public function p_input(){
	 	$id_warga = $this->input->post('id_warga');
	 	$contact = $this->input->post('contact') ;
	 	$start = $this->input->post('start') ;
	 	$finish = $this->input->post('finish');
	 	$tujuan = $this->input->post('tujuan') ; 
	 	$penjaga = $this->input->post('penjaga');
	 	$penjaga_name = $this->input->post('penjaga_name');
	 	$penjaga_contact = $this->input->post('penjaga_contact');
	 	$penjaga_nik = $this->input->post('penjaga_nik');
	 	$keterangan = $this->input->post('keterangan');
		

		$data = array(
			'id_warga' => $id_warga,
			'contact'=>$contact ,
			'start'=>$start ,
			'finish'=>$finish ,
			'tujuan'=>$tujuan ,
			'penjaga'=>$penjaga ,
			'penjaga_name' => $penjaga_name,
			'penjaga_contact' => $penjaga_contact,
			'penjaga_nik' => $penjaga_nik,
			'keterangan' => $keterangan

			);

		$this->t_mudik->input_data($data,'amara_t_mudik');
		redirect('mudik');
	}

	// display input
	public function input(){
		$data['mudik'] = $this->t_mudik->get_data()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/mudik/input',$data);
		$this->load->view('template/footer/index');

	}




	// process delete
	public function delete($id){
		$where = array('id' => $id);
		$this->t_mudik->delete_data($where,'amara_t_mudik');
		redirect('mudik/index');
	}




}