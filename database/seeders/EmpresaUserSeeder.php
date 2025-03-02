<?php

namespace Database\Seeders;

use App\Models\EmpresaUser;
use Illuminate\Database\Seeder;

class EmpresaUserSeeder extends Seeder
{

    public function run()
    {
        $empresas_users = [
            [
                'user_id' => 1,
                'empresa_id' => 1,
            ],
            [
                'user_id' => 2,
                'empresa_id' => 1,
            ],
            [
                'user_id' => 3,
                'empresa_id' => 1,
            ]
        ];

        foreach ($empresas_users as $value) {
            EmpresaUser::create($value);
        }
    }
}
