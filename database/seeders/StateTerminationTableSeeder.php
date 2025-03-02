<?php

namespace Database\Seeders;

use App\Models\StateTermination;
use Illuminate\Database\Seeder;

class StateTerminationTableSeeder extends Seeder
{

    public function run()
    {
        $value = [
            [
                'name' => 'Aprobado por Operaciones',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por Operaciones',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Aprobado por Contabilidad',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por Contabilidad',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Aprobado por RRHH',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por RRHH',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Aprobado por Comercial',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por Comercial',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Aprobado por Gestión Documental',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por Gestión Documental',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Aprobado por Calidad',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por Calidad',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Aprobado por Subgerencia',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Rechazado por Subgerencia',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Por Gestionar',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ],
            [
                'name' => 'Corregido',
                'user_id' => 1,
                'created_at' => '2022-10-04 00:08:20',
                'updated_at' => '2022-10-04 00:08:20'
            ]
        ];

        foreach ($value as $val) {
            StateTermination::create($val);
        }
    }
}
