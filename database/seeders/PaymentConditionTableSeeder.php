<?php

namespace Database\Seeders;

use App\Models\PaymentCondition;
use Illuminate\Database\Seeder;

class PaymentConditionTableSeeder extends Seeder
{
    public function run()
    {
        $values = [
            [
                'name' => '15 Días',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => '30 Días',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => '50% Anticipo y 50% Contra Entrega',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => '60 Días',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => '60% Anticipo y 40% Contra Entrega',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => '8 Días',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Anticipado',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Contado',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Contra Entrega',
                'user_id' => 1,
                'state' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($values as $value) {
            PaymentCondition::create($value);
        }
    }
}
