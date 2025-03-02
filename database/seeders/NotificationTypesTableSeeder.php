<?php

namespace Database\Seeders;

use App\Models\NotificationType;
use Illuminate\Database\Seeder;

class NotificationTypesTableSeeder extends Seeder
{
    public function run()
    {
        $not = [
            [
                'name' => 'Programar Primera Visita',
                'user_id' => 1,
                'module' => 'comercial',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Contrato por Vencer',
                'user_id' => 1,
                'module' => 'comercial',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Recibido Propuesta Económica',
                'user_id' => 1,
                'module' => 'comercial',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Visita Mensual',
                'user_id' => 1,
                'module' => 'comercial',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Nueva Desvinculación de Trabajador',
                'user_id' => 1,
                'module' => 'Desvinculación',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Desvinculación de Trabajador Aprobada',
                'user_id' => 1,
                'module' => 'Desvinculación',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Curso Por Vencer',
                'user_id' => 1,
                'module' => 'Apodatos',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Afiliaciones Faltantes',
                'user_id' => 1,
                'module' => 'Afiliaciones',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Programación de Exámenes Médicos (2 Meses)',
                'user_id' => 1,
                'module' => 'Exámenes Médicos',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Programación de Exámenes Médicos (37 Días)',
                'user_id' => 1,
                'module' => 'Exámenes Médicos',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Programación de Exámenes Médicos Periódicos',
                'user_id' => 1,
                'module' => 'Exámenes Médicos',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($not as $value) {
            NotificationType::create($value);
        }
    }
}
