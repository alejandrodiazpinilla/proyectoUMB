<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            CiudadesTableSeeder::class,
            LocalitiesTableSeeder::class,
            NeighborhoodsTableSeeder::class,
            NotificationTypesTableSeeder::class,
            EmpresasTableSeeder::class,
            EmpresaUserSeeder::class,
            AreasTableSeeder::class,
            AreaUserSeeder::class,
            RolesAndPermissionsSeeder::class,
            AfiliationsTableSeeder::class,
            DocumentCategoryTableSeeder::class,
            DocumentTypesTableSeeder::class,
            BloodTypesTableSeeder::class,
            MaritalStatusTableSeeder::class,
            DelegatesNoveltiesTableSeeder::class,
            NoveltyTypesTableSeeder::class,
            ActionTypesTableSeeder::class,
            VisitTypesTableSeeder::class,
            GarmentsTableSeeder::class,
            RetirementTypesSeeder::class,
            StateTerminationTableSeeder::class,
            VacantTypesTableSeeder::class,
            ContratTypesTableSeeder::class,
            SchoolingTableSeeder::class,
            TypesDisciplinaryRecordTableSeeder::class,
            TrainingEntitiesTableSeeder::class,
            PaymentConditionTableSeeder::class
        ]);
    } 
}
