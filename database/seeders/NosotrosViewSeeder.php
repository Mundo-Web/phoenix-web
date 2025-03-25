<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NosotrosView;

class NosotrosViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NosotrosView::updateOrCreate([
            'id' => 1
        ],[

            'subtitle1section' => 'Sobre Pheonix Fitness',
            'title1section' => 'Describa por que *existe* su empresa',
            'description1section' => 'Explique en qué está trabajando su empresa y el valor que ofrece a sus clientes.',
            'url_image1section' => '',

            'title2section' => 'Resalte el *crecimiento* de su empresa',
            'description2section' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique. Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.',
            'url_image2section' => '',
           
            'title3section' => 'Presenta a tu *equipo*',
            'description3section' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'url_image3section' => '',

            'title3section' => 'Presenta a tu *equipo*',
            'description3section' => 'Duis cursus, mi quis viverra ornare, eros dolor interdum nulla, ut commodo diam libero vitae erat.',
        ]);
    }
}
