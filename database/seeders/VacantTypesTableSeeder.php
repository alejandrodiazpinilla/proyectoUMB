<?php
namespace Database\Seeders;

use App\Models\VacantType;
use Illuminate\Database\Seeder;

class VacantTypesTableSeeder extends Seeder
{

    public function run()
    {
        $values = [
            [
                'name' => 'Cancelación',
                'user_id' => 1,
                'created_at' => '2022-10-06 20:08:20',
                'updated_at' => '2022-10-06 20:08:20'
            ],
            [
                'name' => 'Renuncia',
                'user_id' => 1,
                'created_at' => '2022-10-06 20:08:20',
                'updated_at' => '2022-10-06 20:08:20'
            ],
            [
                'name' => 'Solicitud de Cambio',
                'user_id' => 1,
                'created_at' => '2022-10-06 20:08:20',
                'updated_at' => '2022-10-06 20:08:20'
            ],
            [
                'name' => 'Puesto Nuevo',
                'user_id' => 1,
                'created_at' => '2022-10-06 20:08:20',
                'updated_at' => '2022-10-06 20:08:20'
            ],
            [
                'name' => 'Abandono de puesto',
                'user_id' => 1,
                'created_at' => '2022-10-06 20:08:20',
                'updated_at' => '2022-10-06 20:08:20'
            ]
        ];

        foreach ($values as $val) {
            VacantType::create($val);
        }
    }
}
