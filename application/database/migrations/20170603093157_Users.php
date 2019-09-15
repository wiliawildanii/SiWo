<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Users extends CI_Migration {

    public function up() {
        $this->dbforge->add_field(array(
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 35
            ),
            'username' => array(
                'type' => 'VARCHAR',
                'constraint' => 35,
                'unique' => TRUE
            ),
            'no_telp' => array(
                'type' => 'VARCHAR',
                'constraint' => 12,
                'null' => TRUE
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255
            )
        ));
        $this->dbforge->add_key('user_id',TRUE);
        $this->dbforge->create_table('users');
    }

    public function down() {
        $this->dbforge->drop_table('users');
    }

}

/* End of file Class_name.php */
