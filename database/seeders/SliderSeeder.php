<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::updateOrCreate([
            'id' =>1 
        ],[
            'title' => 'Slide 1',
            'description' => '',
            'botontext1' => '',
            'link1' => '/',
            'botontext2' => 'Comprar Ahora',
        ]);
    }
}
