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
		
		$data = [

                'name' => 'Команда 4',
                'id' =>'4'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 5',
                'id' =>'5'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 6',
                'id' =>'6'
            ];
            $this->db->table('team')->insert($data);
		
		$data = [

                'name' => 'Команда 7',
                'id' =>'7'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 7',
                'id' =>'7'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 8',
                'id' =>'8'
            ];
            $this->db->table('team')->insert($data);
		
		 $data = [

                'name' => 'Команда 9',
                'id' =>'9'
            ];
            $this->db->table('team')->insert($data);

            $data = [

                'name' => 'Команда 10',
                'id' =>'10'
            ];
            $this->db->table('team')->insert($data);
        }
	}
}
