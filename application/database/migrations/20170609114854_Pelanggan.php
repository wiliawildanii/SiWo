
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Pelanggan extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(array(
                'pelanggan_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'auto_increment' => TRUE
                ),
                'nama' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 50
                ),
                'no_telp' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 12
                ),
                'alamat' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'email' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255
                ),
                'password' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 11
                )
            ));
            $this->dbforge->add_key('pelanggan_id',TRUE);
            $this->dbforge->create_table('pelanggan');
        }

        public function down() {
            $this->dbforge->drop_table('pelanggan');
        }
    }
