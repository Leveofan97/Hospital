<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addpictureurlfield extends Migration
{
    public function up()
    {
        if ($this->db->tableexists('player'))
        {
            $this->forge->addColumn('player',array(
                'picture_url' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE)
            ));
        }
    }
    public function down()
    {
        $this->forge->dropColumn('player', 'picture_url');
    }
}