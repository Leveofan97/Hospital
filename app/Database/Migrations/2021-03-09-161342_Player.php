<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Curating extends Migration
{
    public function up()
    {
        // activity_type
        if (!$this->db->tableexists('player'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'FIO' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
                'Diagnos' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
                'Age' => array('type' => 'INT', 'null' => TRUE),
                'Sex' => array('type' => 'VARCHAR', 'constraint' => '3', 'null' => FALSE),
                'Arrived' => array('type' => 'TEXT', 'null' => TRUE),
                'Leftleave' => array('type' => 'TEXT', 'null' => TRUE),
                'Simptoms' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
            ));
            //$this->forge->addForeignKey('user_id','users','id','RESTRICT','RESRICT');
            // create table
            $this->forge->createtable('player', TRUE);
        }
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->droptable('player');
    }
}