
    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Migration_Pemesanan extends CI_Migration {
        public function up() {
            $this->dbforge->add_field(array(
                'id_pemesanan' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 15
                ),
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE
                ),
                'tgl_acara' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 10
                ),
                'status' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 15
                )
            ));
            $this->dbforge->add_key('id_pemesanan',TRUE);
            $this->dbforge->create_table('pemesanan');
        }

        public function down() {
            $this->dbforge->drop_table('pemesanan');
        }
    }
