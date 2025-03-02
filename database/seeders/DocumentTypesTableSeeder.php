<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Seeder;

class DocumentTypesTableSeeder extends Seeder
{

    public function run()
    {
        $docs = [
            [
                'name' => 'Cédula',
                'abbreviation' => 'CC',
                'document_category_id' => 1,
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Cédula de Extranjería',
                'abbreviation' => 'CE',
                'document_category_id' => 1,
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Pasaporte',
                'abbreviation' => 'PA',
                'document_category_id' => 1,
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ],
            [
                'name' => 'Permiso Especial de Permanencia',
                'abbreviation' => 'PEP',
                'document_category_id' => 1,
                'user_id' => 1,
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($docs as $value) {
            DocumentType::create($value);
        }
    }
}
