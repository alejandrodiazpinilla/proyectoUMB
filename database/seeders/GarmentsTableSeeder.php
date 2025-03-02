<?php
namespace Database\Seeders;

use App\Models\Garment;
use Illuminate\Database\Seeder;

class GarmentsTableSeeder extends Seeder
{

    public function run()
    {
        $prendas = [
            [
                'name' => 'Camisa',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Pantalon',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Chaqueta',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Corbata',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Corbatin',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Goleana',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Kepis',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Apellido',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Carnet',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Reata',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Botas de Seguridad',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Tapabocas',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Overol',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ]
        ];

        foreach ($prendas as $value) {
            Garment::create($value);
        }
    }
}
