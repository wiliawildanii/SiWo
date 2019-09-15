<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        if ($this->session->has_userdata('validate')) {
            redirect(base_url() . 'admin' );
        }
        $this->load->view('admin/login');
    }

    public function check()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = $this->db->get_where('users',[
            'username' => $username,
            'password' => md5($password)
        ]);

        $result = $data->row();

        if ($result == null) {
            $this->session->set_flashdata([
                'errors' => 'Maaf username atau password tidak cocok, silahkan coba lagi'
            ]);
            redirect(base_url() . 'admin/login');
        }
        else {
            $this->session->set_userdata([
                'username' => $result->username,
                'nama' => $result->name,
                'role' => 'admin',
                'validate' => true
            ]);
            redirect(base_url() . 'admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['user_id','email','nama','username','password','role','validate']);
        redirect(base_url());
    }

}

/* End of file Controllername.php */
