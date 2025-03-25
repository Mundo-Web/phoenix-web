<?php

namespace Database\Seeders;

use App\Models\HomeView;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HomeView::updateOrCreate([
            'id' => 1
        ],[

            'subtitle1section' => 'Sobre Pheonix Fitness',
            'title1section' => 'Mas que *un* gimnasio, *somos una comunidad*',
            'description1section' => 'Nuestros valores inspiran cada entrenamiento y cada historia de éxito.',
            'url_image1section' => '',

            'title2section' => 'Descubre *nuestras* disciplinas',
            'description2section' => 'Explora nuestra amplia variedad de suplementos para heladerías. Cada categoría está diseñada para ayudarte a crear helados únicos y deliciosos que sorprenderán a tus clientes.',
           
            'subtitle3section' => 'Team Pheonix Fitness',
            'title3section' => 'Tu mejor version comienza *aqui*',
            'url_image3section' => '', 

        ]);
    }
}
