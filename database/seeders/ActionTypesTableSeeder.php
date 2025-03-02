<?php

namespace Database\Seeders;

use App\Models\ActionType;
use Illuminate\Database\Seeder;

class ActionTypesTableSeeder extends Seeder
{

    public function run()
    {
        $actions = [
            [
                'name' => 'Cambio de Guarda',
                'type' => 'Correctiva',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Descargos',
                'type' => 'Correctiva',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Reinducción',
                'type' => 'Correctiva',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Llamado de Atencion Verbal',
                'type' => 'Preventiva',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Llamado de Atencion Escrito',
                'type' => 'Preventiva',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($actions as $value) {
            ActionType::create($value);
        }
    }
}
