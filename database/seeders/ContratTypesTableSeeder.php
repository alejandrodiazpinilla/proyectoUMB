<?php
namespace Database\Seeders;

use App\Models\ContratType;
use Illuminate\Database\Seeder;

class ContratTypesTableSeeder extends Seeder
{

    public function run()
    {
        $values = [
            [
                'name' => 'Término Fijo',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Término Indefinido',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Obra o Labor',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Prestación de Servicios',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Contrato de aprendizaje',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Trabajo Ocasional',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ]
        ];

        foreach ($values as $val) {
            ContratType::create($val);
        }
    }
}
