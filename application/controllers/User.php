<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class User extends CI_Controller{

 	function __construct(){
		parent::__construct();	
		$this->check_isvalidated();
		$this->load->model('m_data_user');
		$this->load->model('m_data_warga');
		$this->load->helper('url');
	}
	// login
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
	// halaman utama 
	 function index(){
		$data['user'] = $this->m_data_user->get_data()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/user/datatable',$data);
		$this->load->view('template/footer/index');
	}



	// process input
 	public function p_input(){
 		
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$warga_id = $this->input->post('warga_id');
		$user_level = $this->input->post('user_level');

		$data = array(
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'warga_id' => $warga_id,
			'user_level'=> $user_level
			);

		$this->m_data_user->input_data($data,'amara_m_user');
		redirect('user/index');
	}

	// display input
	function input(){
		$data['user'] = $this->m_data_user->get_data()->result();
		$data['warga'] = $this->m_data_warga->get_data_active()->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/user/input',$data);
		$this->load->view('template/footer/index');
	}

 	// process update
	function update(){
		$id= $this->input->post('id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$contact = $this->input->post('contact');
		$user_level = $this->input->post('user_level');
		
		$data = array(
			'name' => $name,
			'email' => $email,
			'contact' => $contact,
			'user_level'=> $user_level
		);
		$where = array(
			'id' => $id
		);

		$this->m_data_user->update_data($where,$data,'amara_m_user');		
		redirect('user/index');
	}

	//display get data edit
	function edit($id=''){
		$where = array('id' => $id);
		$data['user'] = $this->m_data_user->get_data_edit($where,'amara_m_user')->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/user/edit',$data);
		$this->load->view('template/footer/index');
	}

	function update_password(){
		$id= $this->input->post('id');
		$password = $this->input->post('password');
		
		$data = array(
			'password' => sha1($password),
		);
		$where = array(
			'id' => $id
		);

		$this->m_data_user->update_data($where,$data,'amara_m_user');		
		redirect('');
	}
	function edit_password($id=''){
		$where = array('id' => $id);
		$data['user'] = $this->m_data_user->get_data_edit($where,'amara_m_user')->result();
		$this->load->view('template/header/index');
		$this->load->view('template/menu/index');
		$this->load->view('pages/user/edit_password',$data);
		$this->load->view('template/footer/index');
	}

	// process delete
	function delete($id){
		$where = array('id' => $id);
		$this->m_data_user->delete_data($where,'amara_m_user');
		redirect('user/index');
	}



}