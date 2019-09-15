<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KonfirmasiModel extends CI_Model {

  public function getConfirmation()
  {
    $this->db->select('*');
    $this->db->from('konfirmasi');
    $this->db->join('pelanggan','pelanggan.pelanggan_id = konfirmasi.pelanggan_id','left');
    $this->db->join('pemesanan','pemesanan.id_pemesanan = konfirmasi.pemesanan_id','left');
    $query = $this->db->get();
    return $query->result();
  }

}

/* End of file ModelName.php */
