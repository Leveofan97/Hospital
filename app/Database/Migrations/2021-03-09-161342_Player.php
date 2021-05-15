<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Curating extends Migration
{
    public function up()
    {

        if (!$this->db->tableexists('team'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'name' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
            ));
            // create table
            $this->forge->createtable('team', TRUE);
        }

        // activity_type
        if (!$this->db->tableexists('player'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'id_team' => array('type' => 'INT','unsigned' => TRUE,'null' => FALSE ),
                'FIO' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
                'Amplua' => array('type' => 'VARCHAR', 'constraint' => '255', 'null' => FALSE),
            ));
            $this->forge->addForeignKey('id_team','team','id','RESTRICT','RESRICT');
            // create table
            $this->forge->createtable('player', TRUE);
        }

        if (!$this->db->tableexists('matsch'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'id_team' => array('type' => 'INT','unsigned' => TRUE, 'null' => FALSE),
            ));
            $this->forge->addForeignKey('id_team','team','id','RESTRICT','RESRICT');
            //$this->forge->addForeignKey('id_player','player','id','RESTRICT','RESRICT');
            // create table
            $this->forge->createtable('matsch', TRUE);
        }

        if (!$this->db->tableexists('gol'))
        {
            $this->forge->addfield(array(
                'time' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE),
                'id_mat4' => array('type' => 'INT','unsigned' => TRUE, 'null' => FALSE),
                'id_player' => array('type' => 'INT','unsigned' => TRUE, 'null' => FALSE),
            ));
            $this->forge->addForeignKey('id_mat4','matsch','id','RESTRICT','RESRICT');
            $this->forge->addForeignKey('id_player','player','id','RESTRICT','RESRICT');
            // create table
            $this->forge->createtable('gol', TRUE);
        }

    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->droptable('team');
        $this->forge->droptable('player');
        $this->forge->droptable('matsch');
        $this->forge->droptable('gol');
    }
}