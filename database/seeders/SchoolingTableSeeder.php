<?php

namespace Database\Seeders;

use App\Models\Schooling;
use Illuminate\Database\Seeder;

class SchoolingTableSeeder extends Seeder
{

    public function run()
    {
        $values = [
            [
                'name' => 'Básica Primaria',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Básica Secundaria',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Media Académica',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Media Técnica',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Técnica Profesional',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Especialización Técnica Profesional',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Tecnología',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Especialización Tecnológica',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Profesional / Universitario',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Especialización',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Maestría',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Doctorado',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Postgrado',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Curso',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ],
            [
                'name' => 'Diplomado',
                'user_id' => 1,
                'created_at' => '2022-11-20 00:08:20',
                'updated_at' => '2022-11-20 00:08:20'
            ]
        ];

        foreach ($values as $value) {
            Schooling::create($value);
        }
    }
}
