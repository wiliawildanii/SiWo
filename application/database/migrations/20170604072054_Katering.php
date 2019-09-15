
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Katering extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(array(
                'katering_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ),
                'nama_katering' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 25
                ),
                'deskripsi' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'jumlah' => array(
                    'type' => 'DECIMAL',
                    'constraint' => 5
                ),
                'harga_katering' => array(
                    'type' => 'DECIMAL',
                    'constraint' => 11
                )
            ));
            $this->dbforge->add_key('katering_id',TRUE);
            $this->dbforge->create_table('katering');
        }

        public function down() {
            $this->dbforge->drop_table('katering');
        }
    }
