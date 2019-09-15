<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gedung extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max-size'] = 10240;

        $this->load->library('upload',$config);
    }

    public function index()
    {
        $data['gedungs'] = $this->db->get('gedung');

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/gedung/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    private function validation() {
        $this->form_validation->set_rules('nama_gedung','Nama Gedung','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('harga_gedung','Harga','required|numeric');
    }

    public function create()
    {
        $this->template('create');
    }

    public function store()
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
            }
            else {
                $error = null;
            }
            $this->template('create',$error);
            return;
        } else {
            $data = array(
                'nama_gedung' => $this->input->post('nama_gedung'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_gedung' => $this->input->post('harga_gedung')
            );

            // UPLOAD IMAGE
            $this->upload->do_upload('foto');
            $data['foto'] = $this->upload->data('file_name');

            // var_dump($data);

            // INSERT INTO DATABASE
            $this->db->insert('gedung',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil disimpan!');
            redirect(base_url() . 'admin/gedung/');
        }
    }

    public function edit($id)
    {
        // jika id tidak ada maka halaman akan dialihkan
        if ($id == null) {
            redirect(base_url() . 'admin/gedung');
        }

        // mengambil data dari table user berdasarkan id
        $result = $this->db->get_where('gedung',['gedung_id' => $id]);
        $data['gedung'] = $result->row();
        $this->template('edit',$data);
    }

    public function update($id)
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            if ($this->input->post('foto') != null) {
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());
                }
                else {
                    $error = null;
                }
            }
            $this->template('edit',$error);
            return;
        } else {
            $data = array(
                'nama_gedung' => $this->input->post('nama_gedung'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_gedung' => $this->input->post('harga_gedung')
            );

            if ($this->input->post('foto') != null) {
                // UPLOAD IMAGE
                $this->upload->do_upload('foto');
                $data['foto'] = $this->upload->data('file_name');
            }

            // INSERT INTO DATABASE
            $this->db->where('gedung_id',$id);
            $this->db->update('gedung',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil diperbarui!');
            redirect(base_url() . 'admin/gedung/');
        }
    }

    public function delete($id)
    {
        $data = $this->db->get_where('gedung',['gedung_id' => $id])->row();

        // DELETING IMAGE
        if ($data->foto != '') {
          unlink('uploads/' . $data->foto);
        }

        $this->db->delete('gedung',['gedung_id' => $id]);

        $this->session->set_flashdata('success','Data berhasil dihapus!');
        redirect(base_url() . 'admin/gedung/');
    }
}

/* End of file Controllername.php */
