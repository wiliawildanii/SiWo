<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends Admin_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('KonfirmasiModel');
    }

    public function index()
    {
        $data['transaksis'] = $this->KonfirmasiModel->getConfirmation();

        // var_dump($data);

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/pembayaran/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

}

/* End of file Controllername.php */
