
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Rias extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(array(
                'rias_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ),
                'nama_rias' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50
                ),
                'gambar' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'deskripsi' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'harga_rias' => array(
                    'type' => 'DECIMAL',
                    'constraint' => 11
                )
            ));
            $this->dbforge->add_key('rias_id',TRUE);
            $this->dbforge->create_table('rias');
        }

        public function down() {
            $this->dbforge->drop_table('rias');
        }
    }
