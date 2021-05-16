<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class AddAvatarField extends Migration
{
    public function up()
    {
        if ($this->db->tableexists('users'))
        {
            $this->forge->addColumn('users',array(
                'picture_url' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => TRUE)
            ));
        }
    }
    public function down()
    {
        $this->forge->dropColumn('users', 'picture_url');
    }
}