<?php
namespace Database\Seeders;

use App\Models\Empresa;
use App\Models\EmpresaServicio;
use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{

    public function run()
    {
        $empresas = [
            [
                'nombre' => 'Alejandro Ltda',
                'nit' => '234234234234',
                'direccion' => 'Cra. 57 No 170A - 14',
                'telefono' => '234234',
                'celular' => '765565656566',
                'ciudad_id' => 110,
                'vision' => 'La visión de la empresa es...',
                'video_institucional' => 'https://www.youtube.com/embed/U_oocyUc-h0',
                'ubicacion_maps' => '<iframe src="https://www.google.com/maps5" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>',
                'facebook' => 'https://www.facebook.com/profile.php?id=100010417694669',
                'instagram' => 'https://www.instagram.com/alejandro_ltda/',
                'linkedin' => 'https://www.linkedin.com/in/alejandrolta-368a021a4',
                'estado' => 1,
                'logo' => 'alejandro_ltda.png',
                'user_id' => 1,
                'observaciones' => 'Ninguna',
                'created_at' => '2022-03-20 00:08:20',
                'updated_at' => '2022-03-20 00:08:20'
            ]
        ];

        foreach ($empresas as $value) {
            Empresa::create($value);
        }

        $servicios = [
            [
                'empresa_id' => 1,
                'nombre' => 'Tecnologia',
                'imagen' => 'Developer.jpg'
            ],
        ];

        foreach ($servicios as $value) {
            EmpresaServicio::create($value);
        }
    }
}
