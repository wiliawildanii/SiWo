<?php
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


      for ($i=1; $i <=3 ; $i++) {
        $config['file_name']            = $i . '.png';
        $this->load->library('upload',$config);
          if(!empty($_FILES['filefoto'.$i]['name'])){
              if(!$this->upload->do_upload('filefoto'.$i))
                  $this->upload->display_errors();
              else
                  echo "Foto berhasil di upload";
          }
      }

      return $date;
    }
<?php for ($i=1; $i <=3 ; $i++) :?>
          <input type="file" name="filefoto<?php echo $i;?>"><br/>
      <?php endfor;?>
<td>
                            <?php for($i=0; $i<3; $i++){ ?>
                                <img src="<?php echo base_url() . 'uploads/' . $dekorasi->foto ?> <?php if($i==0) echo '/1.png'; else echo '/1' . $i .'.png';?>" alt="" class="image-display">
                             <?php } ?>

                            <?= $dekorasi->nama_dekorasi ?> </td>

    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Dekorasi extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(array(
                'dekorasi_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ),
                'nama_dekorasi' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 15,
                ),
                'deskripsi' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'harga_dekorasi' => array(
                    'type' => 'DECIMAL',
                    'constraint' => 11
                ),
                'foto' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                )
            ));
            $this->dbforge->add_key('dekorasi_id',TRUE);
            $this->dbforge->create_table('dekorasi');
        }

        public function down() {
            $this->dbforge->drop_table('dekorasi');
        }
    }
//