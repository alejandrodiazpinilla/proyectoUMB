<?php

namespace Database\Seeders;

use App\Models\AreaUsers;
use Illuminate\Database\Seeder;

class AreaUserSeeder extends Seeder
{
    public function run()
    {
        $areas_users = [
            [
                'user_id' => 1,
                'area_id' => 1,
            ],
            [
                'user_id' => 2,
                'area_id' => 8,
            ],
            [
                'user_id' => 3,
                'area_id' => 8,
            ]
        ];

        foreach ($areas_users as $value) {
            AreaUsers::create($value);
        }
    }
}
