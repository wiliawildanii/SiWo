<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends Admin_Controller {

    public function index()
    {
        $data['pelanggans'] = $this->db->get('pelanggan');

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/pelanggan/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    private function validation() {
        $this->form_validation->set_rules('nama','Nama Pelanggan','required');
        $this->form_validation->set_rules('no_telp','No Telp','required');
        $this->form_validation->set_rules('alamat','Alamat','required');
        $this->form_validation->set_rules('email','Email','required');
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
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email')
            );

            // INSERT INTO DATABASE
            $this->db->insert('pelanggan',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil disimpan!');
            redirect(base_url() . 'admin/pelanggan/');
        }
    }

    public function edit($id)
    {
        // jika id tidak ada maka halaman akan dialihkan
        if ($id == null) {
            redirect(base_url() . 'admin/pelanggan');
        }

        // mengambil data dari table user berdasarkan id
        $result = $this->db->get_where('pelanggan',['pelanggan_id' => $id]);
        $data['pelanggan'] = $result->row();
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
                'nama' => $this->input->post('nama'),
                'no_telp' => $this->input->post('no_telp'),
                'alamat' => $this->input->post('alamat'),
                'email' => $this->input->post('email')
            );

            // INSERT INTO DATABASE
            $this->db->where('pelanggan_id',$id);
            $this->db->update('pelanggan',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil diperbarui!');
            redirect(base_url() . 'admin/pelanggan/');
        }
    }

    public function delete($id)
    {
        $this->db->where('pelanggan_id',$id);
        $this->db->delete('pelanggan');

        $this->session->set_flashdata('success','Data berhasil dihapus!');
        redirect(base_url() . 'admin/pelanggan/');
    }
}

/* End of file Controllername.php */
