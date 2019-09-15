<?php
class UserSeeder extends Seeder {

    private $table = 'users';

    public function run() {
      $this->db->truncate($this->table);

      //seed records manually
      $data = [
          'user_id' => '1',
          'name' => 'Admin',
          'username' => 'admin',
          'no_telp' => '12345',
          'password' => md5('admin')
      ];
      $this->db->insert($this->table, $data);

      echo PHP_EOL;
    }
}
