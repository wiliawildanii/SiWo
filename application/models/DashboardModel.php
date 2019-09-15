<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardModel extends CI_Model {

  public function dataGedung($tanggal)
  {
    $query = $this->db->select('*, gedung.gedung_id')
                      ->from('gedung')
                      ->join('pemesanan_gedung','pemesanan_gedung.gedung_id = gedung.gedung_id','left')
                      ->join('pemesanan','pemesanan.id_pemesanan = pemesanan_gedung.pemesanan_id','left')
                      ->where('tgl_acara !=',$tanggal)
                      ->or_where('tgl_acara',null)
                      ->get();

    return $query->result();
  }

  public function dataDekorasi($tanggal)
  {
    $query = $this->db->select('*, dekorasi.dekorasi_id')
                      ->from('dekorasi')
                      ->join('pemesanan_dekorasi','pemesanan_dekorasi.dekorasi_id = dekorasi.dekorasi_id','left')
                      ->join('pemesanan','pemesanan.id_pemesanan = pemesanan_dekorasi.pemesanan_id','left')
                      ->where('tgl_acara',null)
                      ->or_where('tgl_acara !=',$tanggal)
                      ->get();

    return $query->result();
  }

}

/* End of file ModelName.php */
