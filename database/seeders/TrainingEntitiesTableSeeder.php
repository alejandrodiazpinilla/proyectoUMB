<?php

namespace Database\Seeders;

use App\Models\TrainingEntity;
use Illuminate\Database\Seeder;

class TrainingEntitiesTableSeeder extends Seeder
{
    public function run()
    {
        $values = [
            [
                'name' => 'Axa Colpatria',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Compensar',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Famisanar',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Nueva EPS',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Porvenir',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Protección',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'SABICO',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($values as $value) {
            TrainingEntity::create($value);
        }
    }
}
