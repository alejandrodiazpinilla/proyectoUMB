<?php

namespace Database\Seeders;

use App\Models\VisitType;
use Illuminate\Database\Seeder;

class VisitTypesTableSeeder extends Seeder
{
    public function run()
    {
        $v = [
            [
                'name' => 'Técnica',
                'module' => 'Visita Técnica',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Correctiva',
                'module' => 'Visita Técnica',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Preventiva',
                'module' => 'Visita Técnica',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Mantenimiento',
                'module' => 'Visita Técnica',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Comercial',
                'module' => 'Visita Técnica',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Atendida',
                'module' => 'Visita Domiciliaria',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Aspirante ausente',
                'module' => 'Visita Domiciliaria',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'No abrieron',
                'module' => 'Visita Domiciliaria',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'No habitan la vivienda',
                'module' => 'Visita Domiciliaria',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'La dirección no corresponde',
                'module' => 'Visita Domiciliaria',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Visita Rechazada',
                'module' => 'Visita Domiciliaria',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($v as $value) {
            VisitType::create($value);
        }
    }
}
