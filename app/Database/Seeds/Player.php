<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Player extends Seeder
{
    public function run()
    {
        $data = [

            'FIO' => 'Иванов Алексей Арестархович',
            'Amplua' => 'Защитник',
            'id_team' =>'1'
        ];
        $this->db->table('player')->insert($data);

        $data = [

            'FIO' => 'Алексеева Иван Артемович',
            'Amplua' => 'Вратарь',
            'id_team' =>'2'
        ];
        $this->db->table('player')->insert($data);

        $data = [

            'FIO' => 'Иванов Иван Дмитриевич',
            'Amplua' => 'Нападающий',
            'id_team' =>'3'
        ];
        $this->db->table('player')->insert($data);
    }
}