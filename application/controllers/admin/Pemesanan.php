<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends Admin_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('TransaksiModel');
    }

    public function index()
    {
        $data['transaksis'] = $this->TransaksiModel->getTransaction();

        // var_dump($data);

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/pemesanan/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    public function update($id)
    {
      $this->db->where('id_pemesanan',$id);
      $this->db->update('pemesanan',['status' => 'active']);

      redirect(base_url() . 'admin/pemesanan/');
    }

    public function show($id)
    {
      $data['detail'] = $this->TransaksiModel->getDataById($id);
      // var_dump($data);

      $this->template('show_detail',$data);
    }

}

/* End of file Controllername.php */
