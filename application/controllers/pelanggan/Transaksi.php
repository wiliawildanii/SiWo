<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends My_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('TransaksiModel');
    }

    public function index()
    {

    }

    public function template($page, $data)
    {
      $this->load->view('templates/pelanggan/header');
      $this->load->view('templates/pelanggan/sidemenu');
      $this->load->view('pelanggan/transaksi/'.$page,$data);
      $this->load->view('templates/pelanggan/footer');
    }

    public function store()
    {

      $id_transaksi = str_replace('-','',$this->input->post('tgl_acara')) . $this->session->userdata('user_id');

      $data = [
        'id_pemesanan' => $id_transaksi,
        'user_id' => $this->session->user_id,
        'tgl_acara' => $this->input->post('tgl_acara'),
        'status' => 'pending'
      ];

      // Input transaksi
      $this->TransaksiModel->simpanTransaksi($data);

      // Input data transaksi
      $data_transaksi = [
        'gedung' => $this->input->post('gedung'),
        'rias' => $this->input->post('rias'),
        'katering' => $this->input->post('katering'),
        'dekorasi' => $this->input->post('dekorasi'),
        'dokumentasi' => $this->input->post('dokumentasi')
      ];

      // var_dump($data_transaksi);

      $this->TransaksiModel->simpanDetailTransaksi($id_transaksi,$data_transaksi);

      redirect(base_url() . 'lihat/transaksi/'.$id_transaksi);
    }

    public function show($id)
    {
      // echo $id;
      $data['detail'] = $this->TransaksiModel->getDataById($id);

      // var_dump($data);

      $this->template('show_detail',$data);
    }

}

/* End of file Controllername.php */
