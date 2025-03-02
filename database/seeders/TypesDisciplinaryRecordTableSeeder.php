<?php
namespace Database\Seeders;

use App\Models\TypesDisciplinaryRecord;
use Illuminate\Database\Seeder;

class TypesDisciplinaryRecordTableSeeder extends Seeder
{

    public function run()
    {
        $values = [
            [
                'name' => 'Procuraduría',
                'url' => 'https://www.procuraduria.gov.co/Pages/Consulta-de-Antecedentes.aspx',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Policía',
                'url' => 'https://antecedentes.policia.gov.co:7005/WebJudicial/',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Inhabilidades por delitos sexuales',
                'url' => 'https://inhabilidades.policia.gov.co:8080/',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Personería Bogota',
                'url' => 'https://www.personeriabogota.gov.co/al-servicio-de-la-ciudad/expedicion-de-antecedentes',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Rama Judicial',
                'url' => 'https://antecedentesdisciplinarios.ramajudicial.gov.co/',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Contraloría',
                'url' => 'https://www.contraloria.gov.co/control-fiscal/responsabilidad-fiscal/certificado-de-antecedentes-fiscales',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            [
                'name' => 'Cancillería',
                'url' => 'https://www.cancilleria.gov.co/tt_ss/constancia-antecedentes-judiciales',
                'user_id' => 1,
                'created_at' => '2022-04-20 00:08:20',
                'updated_at' => '2022-04-20 00:08:20'
            ],
            
        ];

        foreach ($values as $value) {
            TypesDisciplinaryRecord::create($value);
        }
    }
}
