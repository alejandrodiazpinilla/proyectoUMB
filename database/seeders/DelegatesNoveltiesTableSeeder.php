<?php
namespace Database\Seeders;

use App\Models\DelegateNovelty;
use Illuminate\Database\Seeder;

class DelegatesNoveltiesTableSeeder extends Seeder
{

    public function run()
    {
        $novedades = [
            [
                'name' => 'Cliente',
                'user_id' => 1,
                'created_at' => '2022-04-20 01:08:20',
                'updated_at' => '2022-04-20 05:08:20'
            ],
            [
                'name' => 'Jefe Inmediato',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ]
        ];

        foreach ($novedades as $value) {
            DelegateNovelty::create($value);
        }
    }
}
