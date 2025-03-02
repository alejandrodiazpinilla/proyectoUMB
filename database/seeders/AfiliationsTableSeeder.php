<?php

namespace Database\Seeders;

use App\Models\Affiliation;
use Illuminate\Database\Seeder;

class AfiliationsTableSeeder extends Seeder
{

    public function run()
    {
        $areas = [
            [
                'name' => 'Empresa Prestadora de Salud (EPS)',
                'user_id' => 1,
                'created_at' => '2022-04-08 00:08:20',
                'updated_at' => '2022-04-08 00:08:20'
            ],
            [
                'name' => 'Administradora de Riesgos Laborales (ARL)',
                'user_id' => 1,
                'created_at' => '2022-04-08 00:08:20',
                'updated_at' => '2022-04-08 00:08:20'
            ],
            [
                'name' => 'Fondo de Pensiones (AFP)',
                'user_id' => 1,
                'created_at' => '2022-04-08 00:08:20',
                'updated_at' => '2022-04-08 00:08:20'
            ],
            [
                'name' => 'Cesantías',
                'user_id' => 1,
                'created_at' => '2022-04-08 00:08:20',
                'updated_at' => '2022-04-08 00:08:20'
            ],
            [
                'name' => 'Caja de Compensación Familiar (CCF)',
                'user_id' => 1,
                'created_at' => '2022-04-08 00:08:20',
                'updated_at' => '2022-04-08 00:08:20'
            ],
        ];

        foreach ($areas as $value) {
            Affiliation::create($value);
        }
    }
}
