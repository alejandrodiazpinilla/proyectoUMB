<?php

namespace Database\Seeders;

use App\Models\DocumentCategory;
use Illuminate\Database\Seeder;

class DocumentCategoryTableSeeder extends Seeder
{

    public function run()
    {
        $docs_category = [
            [
                'name' => 'Persona',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Otros Documentos Curriculum',
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($docs_category as $value) {
            DocumentCategory::create($value);
        }
    }
}
