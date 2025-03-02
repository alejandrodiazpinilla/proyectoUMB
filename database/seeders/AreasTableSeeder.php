<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{

    public function run()
    {
        $areas = [
            [
                'nombre' => 'Desarrollo',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Comercial',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Operaciones',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Recursos Humanos',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Contabilidad',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Sistema Integrado de Gestión',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Gestión Documental',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Gerencia',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'nombre' => 'Cliente',
                'user_id' => 1,
                'empresa_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($areas as $value) {
            Area::create($value);
        }
    }
}
