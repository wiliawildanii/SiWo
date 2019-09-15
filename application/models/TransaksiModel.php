<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiModel extends CI_Model {

  public function getTransaction()
  {
    $this->db->select('*');
    $this->db->from('pemesanan');
    $this->db->join('pelanggan','pelanggan.pelanggan_id = pemesanan.user_id');
    $query = $this->db->get();
    return $query->result();
  }

  public function myTransaction()
  {
    $this->db->where('user_id',$this->session->userdata('user_id'));
    return $this->db->get('pemesanan')->row();
  }

  public function simpanTransaksi($data)
  {
    $this->db->insert('pemesanan',$data);
  }

  public function simpanDetailTransaksi($id_transaksi,$data)
  {
    if ($data['gedung'] != null) {
      $data_gedung = [
        'pemesanan_id' => $id_transaksi,
        'gedung_id' => $data['gedung']
      ];
      $this->db->insert('pemesanan_gedung',$data_gedung);
    }

    if ($data['rias'] != null) {
      $data_rias = [
        'pemesanan_id' => $id_transaksi,
        'rias_id' => $data['rias']
      ];
      $this->db->insert('pemesanan_rias',$data_rias);
    }

    if ($data['katering'] != null) {
      $data_katering = [
        'pemesanan_id' => $id_transaksi,
        'katering_id' => $data['katering']
      ];
      $this->db->insert('pemesanan_katering',$data_katering);
    }

    if ($data['dekorasi'] != null) {
      $data_dekorasi = [
        'pemesanan_id' => $id_transaksi,
        'dekorasi_id' => $data['dekorasi']
      ];
      $this->db->insert('pemesanan_dekorasi',$data_dekorasi);
    }

    if ($data['dokumentasi'] != null) {
      $data_dokumentasi = [
        'pemesanan_id' => $id_transaksi,
        'dokumentasi_id' => $data['dokumentasi']
      ];
      $this->db->insert('pemesanan_dokumentasi',$data_dokumentasi);
    }
  }

  public function getDataById($id)
  {
    $this->db->select('*');
    $this->db->from('pemesanan');
    $this->db->where('id_pemesanan',$id);
    $this->db->join('pelanggan','pelanggan_id = pemesanan.user_id','left');
    $this->db->join('pemesanan_dekorasi','pemesanan_dekorasi.pemesanan_id = pemesanan.id_pemesanan','left');
    $this->db->join('pemesanan_rias','pemesanan_rias.pemesanan_id = pemesanan.id_pemesanan','left');
    $this->db->join('pemesanan_dokumentasi','pemesanan_dokumentasi.pemesanan_id = pemesanan.id_pemesanan','left');
    $this->db->join('pemesanan_gedung','pemesanan_gedung.pemesanan_id = pemesanan.id_pemesanan','left');
    $this->db->join('pemesanan_katering','pemesanan_katering.pemesanan_id = pemesanan.id_pemesanan','left');
    $this->db->join('gedung','gedung.gedung_id = pemesanan_gedung.gedung_id','left');
    $this->db->join('dekorasi','dekorasi.dekorasi_id = pemesanan_dekorasi.dekorasi_id','left');
    $this->db->join('rias','rias.rias_id = pemesanan_rias.rias_id','left');
    $this->db->join('katering','katering.katering_id = pemesanan_katering.katering_id','left');
    $this->db->join('dokumentasi','dokumentasi.dokumentasi_id = pemesanan_dokumentasi.dokumentasi_id','left');
    $query = $this->db->get();

    return $query->row();
  }

}

/* End of file ModelName.php */
