<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusTableSeeder extends Seeder
{

    public function run()
    {
        $marital_status = [
            [
                'name' => 'Soltero(a)',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Casado(a)',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Unión Libre',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Separado(a)',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Divorciado(a)',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Viudo(a)',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($marital_status as $value) {
            MaritalStatus::create($value);
        }
    }
}
