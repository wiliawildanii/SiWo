
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
