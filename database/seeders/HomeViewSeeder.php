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

            'title1section' => 'Descubre Nuestras Categorías de Productos',
            'description1section' => 'Explora nuestra amplia variedad de suplementos para heladerías. Cada categoría está diseñada para ayudarte a crear helados únicos y deliciosos que sorprenderán a tus clientes.',
            'url_image1section' => '',

            'title2section' => 'Nuestros productos destacados',
            'description2section' => 'Explora nuestra amplia variedad de suplementos para heladerías. Cada categoría está diseñada para ayudarte a crear helados únicos y deliciosos que sorprenderán a tus clientes.',
            'url_image2section' => 'url_de_la_imagen_2', 

            'title3section' => 'Una mejor base, un mejor helado',
            'description3section' => '',
            'url_image3section' => 'url_de_la_imagen_3', 

            'title4section' => 'Ingredientes de Alta Calidad',
            'description4section' => 'Fórmulas desarrolladas para resultados consistentes y sabrosos.',
            'url_image4section' => '', 

            'title5section' => 'Versatilidad de Usos',
            'description5section' => 'Suplementos que se adaptan a todo tipo de recetas y procesos.',
            'url_image5section' => '', 
            
            'title6section' => 'Certificación y Seguridad',
            'description6section' => 'Productos avalados por normas de calidad y seguridad alimentaria.',
            'url_image6section' => '', 

            'title7section' => 'Envíos Rápidos y Soporte Personalizado',
            'description7section' => 'Te asistimos en cada paso del proceso, desde la compra hasta la implementación.',
            'url_image7section' => '',
            
            'title8section' => 'Insumos de Calidad para Heladerías Excepcionales',
            'one_description8section' => '¡Prueba la magia en cada producto!',
            'two_description8section' => 'Encuentra todos los ingredientes y suplementos que tu heladería necesita para destacar. Desde bases cremosas hasta toppings exclusivos, ofrecemos productos que harán que tus creaciones sean irresistibles.',
            'url_image8section' => '',

            'subtitle9section' => '¡Déjanos tu experiencia y forma parte de nuestra historia de sabor!',
            'title9section' => 'Lo Que Dicen Nuestros Clientes',
            'one_description9section' => '¡Déjanos tu experiencia y forma parte de nuestra historia de sabor!',
            'two_description9section' => 'Conoce las opiniones de quienes han disfrutado de nuestros helados artesanales. ¡Descubre por qué nuestros sabores se han convertido en sus favoritos!',

            'title10section' => 'Describe de qué trata tu blog',
            'description10section' => 'Mauris euismod vehicula eros egestas venenatis. Vestibulum non pulvinar risus. Praesent hendrerit lectus ultrices purus consectetur, eu sollicitudin libero pretium.',
            'url_image10section' => '',

            'title11section' => 'Suscríbete a nuestra newsletter',
            'description11section' => 'Mauris euismod vehicula eros egestas venenatis. Vestibulum non pulvinar risus. Praesent hendrerit lectus ultrices purus consectetur, eu sollicitudin libero pretium.',
            'url_image11section' => '',
        ]);
    }
}
