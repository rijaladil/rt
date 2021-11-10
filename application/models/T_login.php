<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class T_login extends CI_Model
{

    public function validate(){
        $email = $this->security->xss_clean($this->input->post('email'));
        $password = sha1($this->security->xss_clean($this->input->post('password')));

        $this->db->from('amara_m_user');
        $this->db->where('amara_m_user.email', $email);
        $query=$this->db->get();
        $row = $query->row();

        if($query->num_rows() == 1 && ($password == $row->password))
        {
            $data = array(
                'id'        => $row->id,
                'name'      => $row->name,
                'email'     => $row->email,
                'level'     => $row->user_level,
                'warga_id'  => $row->warga_id,
                'loggin'    => TRUE
            );
            $this->session->set_userdata($data);
             if
                (
                    (in_array($this->session->userdata('level'), array(1,2,3)))
                )
            {
               redirect('Dashboard', 'refresh');
            }else {
                redirect('Dashboard', 'refresh');
            }
            
        }else{
            redirect("login?msg=<strong>Oh snap!</strong> <br>Password yang anda masukan tidak benar.", 'refresh');
        }

    }

}
