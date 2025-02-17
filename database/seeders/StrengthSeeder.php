<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StrengthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('strengths')->insert([
           
            [   
                'descripcionshort' => '2010',
                'titulo' => 'Fundada',
                'descripcion' => '',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:46',
                'updated_at' => '2024-08-02 23:57:40',
            ],
            [   
                'descripcionshort' => '12+',
                'titulo' => 'Profesionales',
                'descripcion' => '',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],
            [
                'descripcionshort' => '200+',
                'titulo' => 'Miembros activos',
                'descripcion' => '',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],

        ]);
    }
}
