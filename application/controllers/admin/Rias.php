<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rias extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|png';
        $config['max-size'] = 10240;

        $this->load->library('upload',$config);
    }

    public function index()
    {
        $data['riases'] = $this->db->get('rias');

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/rias/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    private function validation() {
        $this->form_validation->set_rules('nama_rias','nama_rias Rias','required');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('harga_rias','Harga','required|numeric');
    }

    public function create()
    {
        $this->template('create');
    }

    public function store()
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            if (!$this->upload->do_upload('gambar')) {
                $error = array('error' => $this->upload->display_errors());
            }
            else {
                $error = null;
            }
            $this->template('create',$error);
            return;
        } else {
            $data = array(
                'nama_rias' => $this->input->post('nama_rias'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_rias' => $this->input->post('harga_rias')
            );

            // UPLOAD IMAGE
            $this->upload->do_upload('gambar');
            $data['gambar'] = $this->upload->data('file_name');

            // INSERT INTO DATABASE
            $this->db->insert('rias',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil disimpan!');
            redirect(base_url() . 'admin/rias/');
        }
    }

    public function edit($id)
    {
        // jika id tidak ada maka halaman akan dialihkan
        if ($id == null) {
            redirect(base_url() . 'admin/rias');
        }

        // mengambil data dari table user berdasarkan id
        $result = $this->db->get_where('rias',['rias_id' => $id]);
        $data['rias'] = $result->row();
        $this->template('edit',$data);
    }

    public function update($id)
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            if ($this->input->post('gambar') != null) {
                if (!$this->upload->do_upload('gambar')) {
                    $error = array('error' => $this->upload->display_errors());
                }
            }
            $this->template('edit',$error);
            return;
        } else {
            $data = array(
                'nama_rias' => $this->input->post('nama_rias'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_rias' => $this->input->post('harga_rias')
            );

            if ($this->input->post('gambar') != null) {
                // UPLOAD IMAGE
                $this->upload->do_upload('gambar');
                $data['gambar'] = $this->upload->data('file_name');
            }

            // INSERT INTO DATABASE
            $this->db->where('rias_id',$id);
            $this->db->update('rias',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil diperbarui!');
            redirect(base_url() . 'admin/rias/');
        }
    }

    public function delete($id)
    {
        $data = $this->db->get_where('rias',['rias_id' => $id])->row();

        // DELETING IMAGE
        unlink('uploads/' . $data->gambar);

        $this->db->delete('rias',['rias_id' => $id]);

        $this->session->set_flashdata('success','Data berhasil dihapus!');
        redirect(base_url() . 'admin/rias/');
    }
}

/* End of file Controllername.php */
