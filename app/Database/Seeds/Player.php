<?php namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Player extends Seeder
{
    public function run()
    {
        $data = [

            'FIO' => 'Иванов Алексей Арестархович',
            'Diagnos' => 'Катаракта',
            'Age' => 50,
            'Sex' => 'Муж',
            'Arrived' => '2021-01-30',
            'Leftleave' => '2021-02-14',
            "Simptoms" => 'Плохо видит',
        ];
        $this->db->table('player')->insert($data);

        $data = [

            'FIO' => 'Максимов Йохан Викторович',
            'Diagnos' => 'Шизофрения',
            'Age' => 30,
            'Sex' => 'Муж',
            'Arrived' => '2021-02-10',
            'Leftleave' => '2021-02-20',
            "Simptoms" => 'Слышит голоса',
        ];
        $this->db->table('player')->insert($data);

        $data = [

            'FIO' => 'Алексеева Иван Артемович',
            'Diagnos' => 'Язва желудка',
            'Age' => 24,
            'Sex' => 'Муж',
            'Arrived' => '2021-02-14',
            'Leftleave' => '2021-02-30',
            "Simptoms" => 'Боли в желудке',
        ];
        $this->db->table('player')->insert($data);
    }
}