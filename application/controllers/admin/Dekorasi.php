<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dekorasi extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    private function _uploadImage(){
      $date = date("ymdhis");
      mkdir('./uploads/' . $date . '/', 0777, true);
      $config['upload_path']          = './uploads/' . $date . '/';
      $config['allowed_types'] = 'jpg|png|jpeg';
      $config['max-size'] = 10240;

      $up=true;
      for ($i=1; $i <=3 ; $i++) {
        $config['file_name']            = $i . '.png';
        $this->load->library('upload',$config);
          if(!empty($_FILES['filefoto'.$i]['name'])){
              if(!$this->upload->do_upload('filefoto'.$i)){
                $error = "Error";
                $this->template('create',$error);
                $up=false;
                return false;
              }else{
                  echo "Foto berhasil di upload";}
          }
      }

      if($up==true){
        return $date;
      }else{
        return false;
      }
    }

    //     $config['upload_path'] = './uploads/';
    //     $config['allowed_types'] = 'jpg|png|jpeg';
    //     $config['max-size'] = 10240;

    //     $this->load->library('upload',$config);
    // }

    public function index()
    {
        $data['dekor'] = $this->db->get('dekorasi');

        $this->template('index',$data);
    }

    private function template($template,$data = null)
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidemenu');
        $this->load->view('admin/dekorasi/'.$template,$data);
        $this->load->view('templates/admin/footer');
    }

    private function validation() {
        $this->form_validation->set_rules('nama_dekorasi','Nama Dekorasi','required|alpha_numeric_spaces|is_unique[dekorasi.nama_dekorasi]');
        $this->form_validation->set_rules('deskripsi','Deskripsi','required');
        $this->form_validation->set_rules('harga_dekorasi','Harga','required|numeric');
        // $this->form_validation->set_rules('filefoto1','File Foto','image|mimes:jpg,png,jpeg');
        // $this->form_validation->set_rules('filefoto2','File Foto','image|mimes:jpg,png,jpeg');
        // $this->form_validation->set_rules('filefoto3','File Foto','image|mimes:jpg,png,jpeg');
    }

    public function create()
    {
        $this->template('create');
    }

    public function store()
    {
        $this->validation();

        if ($this->form_validation->run() == FALSE) {
            if (!$this->_uploadImage->do_upload('filefoto1')) {
                $error = array('error' => $this->upload->display_errors());
            }elseif (!$this->_uploadImage->do_upload('filefoto2')) {
              $error = array('error' => $this->upload->display_errors());
            }elseif (!$this->_uploadImage->do_upload('filefoto3')) {
              $error = array('error' => $this->upload->display_errors());
            }
            else {
                $error = null;
            }

            $error = validation_errors();
            $this->template('create',$error);
            return;
        } else {
            $data = array(
                'nama_dekorasi' => $this->input->post('nama_dekorasi'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_dekorasi' => $this->input->post('harga_dekorasi')
            );

            // UPLOAD IMAGE
            //$this->upload->do_upload('foto');
            $upload=$this->_uploadImage();
            if($upload==""){
              $error = "Upload gagal";
              $this->template('create',$error);
              $this->session->set_flashdata('success','Upload gagal');
            }else{
              $data['gambar'] = $this->_uploadImage();
              $this->db->insert('dekorasi',$data);
              $this->session->set_flashdata('success','Data berhasil disimpan!');
            }

            // INSERT INTO DATABASE


            // REDIRECT TO USER PAGE
            redirect(base_url() . 'admin/dekorasi/');
        }
    }

    public function edit($id)
    {
        // jika id tidak ada maka halaman akan dialihkan
        if ($id == null) {
            redirect(base_url() . 'admin/dekorasi');
        }

        // mengambil data dari table user berdasarkan id
        $result = $this->db->get_where('dekorasi',['dekorasi_id' => $id]);
        $data['dekorasi'] = $result->row();
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
                'nama_dekorasi' => $this->input->post('nama_dekorasi'),
                'deskripsi' => $this->input->post('deskripsi'),
                'harga_dekorasi' => $this->input->post('harga_dekorasi')
            );

            if ($this->input->post('foto') != null) {
                // UPLOAD IMAGE
                //$this->upload->do_upload('foto');
            }

            // INSERT INTO DATABASE
            $this->db->where('dekorasi_id',$id);
            $this->db->update('dekorasi',$data);

            // REDIRECT TO USER PAGE
            $this->session->set_flashdata('success','Data berhasil diperbarui!');
            redirect(base_url() . 'admin/dekorasi/');
        }
    }

    public function delete($id)
    {
        $data = $this->db->get_where('dekorasi',['dekorasi_id' => $id])->row();

        // DELETING IMAGE
        if ($data->foto != '') {
          unlink('uploads/' . $data->foto);
        }

        $this->db->delete('dekorasi',['dekorasi_id' => $id]);

        $this->session->set_flashdata('success','Data berhasil dihapus!');
        redirect(base_url() . 'admin/dekorasi/');
    }
}

/* End of file Controllername.php */
