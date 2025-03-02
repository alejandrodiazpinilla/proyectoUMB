<?php

namespace Database\Seeders;

use App\Models\RetirementType;
use Illuminate\Database\Seeder;

class RetirementTypesSeeder extends Seeder
{

    public function run()
    {
        $array = [
            [
                "id" => 1,
                "name" => "Renuncia Aceptada",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 2,
                "name" => "Justa Causa",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 3,
                "name" => "Nunca Laboró",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 4,
                "name" => "Sin Justa Causa Empleador",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 5,
                "name" => "Terminación de Labor",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 6,
                "name" => "Mutuo Acuerdo",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 7,
                "name" => "Vencimiento del Término",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 8,
                "name" => "Muerte del Trabajador",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 9,
                "name" => "Abandono de Cargo",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ],
            [
                "id" => 10,
                "name" => "Periodo de Prueba",
                "user_id" => 1,
                "created_at" => "2022-09-14 01:08:20",
                "updated_at" => "2022-09-14 01:08:20",
            ]
        ];

        foreach ($array as $value) {
            RetirementType::create($value);
        }
    }
}
