<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        // Jika sudah login akan di alihkan ke halaman dashboard pelaggan
        if ($this->session->userdata('validate') != null) {
            redirect(base_url() . 'pelanggan');
        }
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function check()
    {
        $username = $this->input->post('email');
        $password = $this->input->post('password');

        $data = $this->db->get_where('pelanggan',[
            'email' => $username,
            'password' => $password
        ]);

        $result = $data->row();

        if ($result == null) {
            $this->session->set_flashdata([
                'email' => $username,
                'errors' => 'Maaf username atau password tidak cocok, silahkan coba lagi'
            ]);
            redirect(base_url() . 'login');
        }
        else {
            $this->session->set_userdata([
                'user_id' => $result->pelanggan_id,
                'email' => $username,
                'nama' => $result->nama,
                'role' => 'guest',
                'password' => $result->password,
                'validate' => true
            ]);
            redirect(base_url() . 'pelanggan');
        }
    }

}

/* End of file Controllername.php */
