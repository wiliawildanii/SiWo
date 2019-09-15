
          <?php
          defined('BASEPATH') OR exit('No direct script access allowed');
          class Migration_Konfirmasi extends CI_Migration {
              public function up() {
                  $this->dbforge->add_field(array(
                      'id' => array(
                          'type' => 'INT',
                          'constraint' => 11,
                          'auto_increment' => TRUE
                      )
                      'pelanggan_id' => array(
                          'type' => 'INT',
                          'constraint' => 11
                      ),
                      'pemesanan_id' => array(
                          'type' => 'INT',
                          'constraint' => 11
                      ),
                      'no_rek' => array(
                          'type' => 'VARCHAR',
                          'constraint' => 25
                      ),
                      'nama_bank' => array(
                          'type' => 'VARCHAR',
                          'constraint' => 25
                      ),
                      'pemilik' => array(
                          'type' => 'VARCHAR',
                          'constraint' => 25
                      ),
                      'foto' => array(
                          'type' => 'VARCHAR',
                          'constraint' => 255
                      )
                  ));
                  $this->dbforge->add_key('id',TRUE);
                  $this->dbforge->create_table('konfirmasi');
              }

              public function down() {
                  $this->dbforge->drop_table('konfirmasi');
              }
          }
