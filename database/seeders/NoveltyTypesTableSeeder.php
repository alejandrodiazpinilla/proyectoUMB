<?php
namespace Database\Seeders;

use App\Models\NoveltyType;
use Illuminate\Database\Seeder;

class NoveltyTypesTableSeeder extends Seeder
{

  public function run()
  {
    $values = [
      [
        'name' => 'Cambio de Turno',
        'area_id' => 3,
        'delegate_id' => 1,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ],
      [
        'name' => 'Novedad en el Servicio',
        'area_id' => 3,
        'delegate_id' => 1,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ],
      [
        'name' => 'Novedad en el Servicio',
        'area_id' => 3,
        'delegate_id' => 2,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ],
      [
        'name' => 'Frente a Guarda',
        'area_id' => 3,
        'delegate_id' => 2,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ],
      [
        'name' => 'Incapacidad',
        'area_id' => 4,
        'delegate_id' => 3,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ],
      [
        'name' => 'Sanción',
        'area_id' => 4,
        'delegate_id' => 3,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ],
      [
        'name' => 'Ausencia Injustificada',
        'area_id' => 4,
        'delegate_id' => 3,
        'user_id' => 1,
        'created_at' => '2022-04-20 00:08:20',
        'updated_at' => '2022-04-20 00:08:20'
      ]
    ];

    foreach ($values as $val) {
      NoveltyType::create($val);
    }
  }
}
