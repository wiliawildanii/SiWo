
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Dokumentasi extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(array(
                'dokumentasi_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ),
                'nama_dokumentasi' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'deskripsi' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'harga_dokumentasi' => array(
                    'type' => 'DECIMAL',
                    'constraint' => 11
                )
            ));
            $this->dbforge->add_key('dokumentasi_id',TRUE);
            $this->dbforge->create_table('dokumentasi');
        }

        public function down() {
            $this->dbforge->drop_table('dokumentasi');
        }
    }
