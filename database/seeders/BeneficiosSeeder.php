<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Strength;

class BeneficiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Strength::updateOrCreate([
            'id' => 1
        ], [
            'titulo' => 'Entrega gratis',
            'descripcionshort' => 'Wide Leg',
            'descripcion' => '',
            'icono' => 'images\img\box.png'
        ]);
    }
}
