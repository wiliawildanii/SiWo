<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Katering extends Admin_Controller {

    public function index()
    {
        $data['caterings'] = $this->db->get('katering');

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/katering/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    private function validation() {
        $this->form_validation->set_rules('nama_katering','Nama katering','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('jumlah','Jumlah','required|numeric');
        $this->form_validation->set_rules('harga_katering','Harga','required|numeric');
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
                'nama_katering' => $this->input->post('nama_katering'),
                'deskripsi' => $this->input->post('deskripsi'),
                'jumlah' => $this->input->post('jumlah'),
                'harga_katering' => $this->input->post('harga_katering')
            );

            // INSERT INTO DATABASE
            $this->db->insert('katering',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil disimpan!');
            redirect(base_url() . 'admin/katering/');
        }
    }

    public function edit($id)
    {
        // jika id tidak ada maka halaman akan dialihkan
        if ($id == null) {
            redirect(base_url() . 'admin/katering');
        }

        // mengambil data dari table user berdasarkan id
        $result = $this->db->get_where('katering',['katering_id' => $id]);
        $data['katering'] = $result->row();
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
                'nama_katering' => $this->input->post('nama_katering'),
                'deskripsi' => $this->input->post('deskripsi'),
                'jumlah' => $this->input->post('jumlah'),
                'harga_katering' => $this->input->post('harga_katering')
            );

            // INSERT INTO DATABASE
            $this->db->where('katering_id',$id);
            $this->db->update('katering',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil diperbarui!');
            redirect(base_url() . 'admin/katering/');
        }
    }

    public function delete($id)
    {
        $this->db->where('katering_id',$id);
        $this->db->delete('katering');

        $this->session->set_flashdata('success','Data berhasil dihapus!');
        redirect(base_url() . 'admin/katering/');
    }
}

/* End of file Controllername.php */
