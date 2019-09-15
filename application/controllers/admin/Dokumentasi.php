<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokumentasi extends Admin_Controller {

    public function index()
    {
        $data['dok'] = $this->db->get('dokumentasi');

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/dokumentasi/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    private function validation() {
        $this->form_validation->set_rules('nama_dokumentasi','Nama Dokumentasi','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('harga_dokumentasi','Harga','required|numeric');
    }

    public function create()
    {
        $this->template('create');
    }

    public function store()
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            $this->template('create');
            return;
        } else {
            $data = array(
                'nama_dokumentasi' => $this->input->post('nama_dokumentasi'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_dokumentasi' => $this->input->post('harga_dokumentasi')
            );

            // INSERT INTO DATABASE
            $this->db->insert('dokumentasi',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil disimpan!');
            redirect(base_url() . 'admin/dokumentasi/');
        }
    }

    public function edit($id)
    {
        // jika id tidak ada maka halaman akan dialihkan
        if ($id == null) {
            redirect(base_url() . 'admin/dokumentasi');
        }

        // mengambil data dari table user berdasarkan id
        $result = $this->db->get_where('dokumentasi',['dokumentasi_id' => $id]);
        $data['dokumentasi'] = $result->row();
        $this->template('edit',$data);
    }

    public function update($id)
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            $this->template('edit');
            return;
        } else {
            $data = array(
                'nama_dokumentasi' => $this->input->post('nama_dokumentasi'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_dokumentasi' => $this->input->post('harga_dokumentasi')
            );

            // INSERT INTO DATABASE
            $this->db->where('dokumentasi_id',$id);
            $this->db->update('dokumentasi',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil diperbarui!');
            redirect(base_url() . 'admin/dokumentasi/');
        }
    }

    public function delete($id)
    {
        $this->db->where('dokumentasi_id',$id);
        $this->db->delete('dokumentasi');

        $this->session->set_flashdata('success','Data berhasil dihapus!');
        redirect(base_url() . 'admin/dokumentasi/');
    }
}

/* End of file Controllername.php */
