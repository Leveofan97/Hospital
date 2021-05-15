<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Team extends Seeder
{
	public function run()
	{
        {
            $data = [

                'name' => 'Команда 1',
                'id' =>'1'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 2',
                'id' =>'2'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 3',
                'id' =>'3'
            ];
            $this->db->table('team')->insert($data);
        }
	}
}
