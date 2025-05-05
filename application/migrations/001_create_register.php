<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Migration_Create_register
 * @property CI_DB_forge $dbforge
 */
class Migration_Create_register extends CI_Migration
{
    public function up()
    {
        $a = $this->dbforge;

        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 45,
                'null' => FALSE
            ],
            'password' => [
                'type' => 'TEXT',
                'null' => FALSE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ],
            'phone' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'language' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'gender' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'qualification' => [
                'type' => 'TEXT',
                'null' => TRUE
            ],
            'added_on' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => TRUE
            ],
            'updated_on' => [
                'type' => 'TIMESTAMP',
                'null' => TRUE,
            ],
            'status' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => TRUE
            ]
        ]);

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('register');
    }

    public function down()
    {
        $this->dbforge->drop_table('register');
    }
}