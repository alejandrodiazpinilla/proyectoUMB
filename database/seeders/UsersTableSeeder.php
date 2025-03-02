<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'username' => 'Admin',
                'email' => 'admin@gmail.co',
                'password' => '$2y$10$MU6AiCtZ75wbFhEGaoJZCuO0TMZX0o3DedTH451JXT0FsHbHUziz2',
                'cargo' => 'Desarrollador Fullstack',
                'remember_token' => null,
                'signature' => null,
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
        ];

        foreach ($users as $value) {
            User::create($value);
        }
    }
}
