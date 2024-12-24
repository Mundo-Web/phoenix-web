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
                'descripcionshort' => '15',
                'titulo' => 'Años de Experiencia',
                'descripcion' => 'Proveemos a heladerías profesionales en todo el país.',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:46',
                'updated_at' => '2024-08-02 23:57:40',
            ],
            [   
                'descripcionshort' => '80+',
                'titulo' => 'Productos en Nuestro Catálogo',
                'descripcion' => 'Ofrecemos una amplia gama de suplementos para cubrir todas tus necesidades.',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],
            [
                'descripcionshort' => '99%',
                'titulo' => 'Clientes Satisfechos',
                'descripcion' => 'La mayoría de nuestros clientes recomiendan nuestros productos por su calidad y efectividad.',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],

        ]);
    }
}
