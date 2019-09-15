<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends My_Controller {

    public function __construct()
    {
      parent::__construct();
      $config['upload_path'] = './uploads/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max-size'] = 10240;

      $this->load->library('upload',$config);
      $this->load->model('KonfirmasiModel');
      $this->load->model('TransaksiModel');
    }

    public function index()
    {
      $transaksi['transaksi'] = $this->TransaksiModel->myTransaction();
      $this->template('index',$transaksi);
    }

    public function template($page, $data)
    {
      $this->load->view('templates/pelanggan/header');
      $this->load->view('templates/pelanggan/sidemenu');
      $this->load->view('pelanggan/konfirmasi/'.$page,$data);
      $this->load->view('templates/pelanggan/footer');
    }

    public function store()
    {
        if (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->template('index',$error);
            return;
        }

        $data = array(
            'pelanggan_id' => $this->session->userdata('user_id'),
            'pemesanan_id' => $this->input->post('pemesanan_id'),
            'nama_bank' => $this->input->post('nama_bank'),
            'no_rek' => $this->input->post('no_rek'),
            'pemilik' => $this->input->post('pemilik')
        );

        // UPLOAD IMAGE
        $this->upload->do_upload('foto');
        $data['foto'] = $this->upload->data('file_name');

        // var_dump($data);

        // INSERT INTO DATABASE
        $this->db->insert('konfirmasi',$data);

        // REDIRECT TO USER PAGE
        $this->session->set_flashdata('success','Konfirmasi berhasil dilakukan!');
        redirect(base_url() . 'pelanggan/');
    }

}

/* End of file Controllername.php */
