<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class AddNameField extends Migration
{
    public function up()
    {
        if ($this->db->tableexists('player'))
        {
            $this->forge->addColumn('player',array(
                'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE)
            ));
        }
    }
    public function down()
    {
        $this->forge->dropColumn('player', 'name');
    }
}
