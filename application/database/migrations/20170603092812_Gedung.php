<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Gedung extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'gedung_id' => array(
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'nama_gedung' => array(
                'type' => 'VARCHAR',
                'constraint' => 35
            ),
            'deskripsi' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            ),
            'harga_gedung' => array(
                'type' => 'DECIMAL',
                'constraint' => 11
            ),
            'foto' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
        ));
        $this->dbforge->add_key('gedung_id');
        $this->dbforge->create_table('gedung');
    }

    public function down() {
        $this->dbforge->drop_table('gedung');
    }

}

/* End of file Class_name.php */
