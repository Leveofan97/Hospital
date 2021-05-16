<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class GooglAddgoogleid extends Migration
{
    public function up()
    {
        if ($this->db->tableexists('users'))
        {
            $this->forge->addColumn('users',array(
                'google_id' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE)
            ));
        }
    }
    public function down()
    {
        $this->forge->dropColumn('users', 'google_id');
    }
}
