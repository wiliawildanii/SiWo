<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->checkUser();
    }

    public function checkUser()
    {
        if ($this->session->userdata('validate') == null OR $this->session->userdata('validate') != TRUE) {
            redirect(base_url());
        }       
        elseif ($this->session->userdata('role') == 'admin') {
            redirect(base_url() . 'admin');
        }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
    }
}

class Admin_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        return $this->cekUser();
    }

    protected function cekUser()
    {
        if ($this->session->userdata('validate') !== TRUE) {
            redirect(base_url() . "admin/login");
        }
        elseif ($this->session->userdata('role') == 'guest') {
            redirect(base_url() . 'pelanggan');
        }
    }
}



?>