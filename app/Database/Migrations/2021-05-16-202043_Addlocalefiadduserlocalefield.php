<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddlocalefiAdduserlocalefield extends Migration
{
    public function up()
    {
        if ($this->db->tableexists('users')) {
            $this->forge->addColumn('users', array(
                'locale' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE)
            ));
        }
    }

    public function down()
    {
        $this->forge->dropColumn('user', 'locale');
    }
}