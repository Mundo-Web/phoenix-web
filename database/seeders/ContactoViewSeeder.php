<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContactoView;

class ContactoViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactoView::updateOrCreate([
            'id' => 1
        ],[
            'title1section' => 'Ponerse en *Contacto*',
            'title1section2' => '¿Quieres contactar con nosotros directamente?',
            'description1section' => 'Ponte en contacto con los expertos en sistemas automáticos de gran trayectoria y alta efectividad.',
            'subtitle2section' => 'Team Pheonix Fitness',
            'title2section' => 'Tu mejor version comienza *aqui*',
            'description3section' => '¿Tienes dudas? Escríbenos',
            'url_image2section' => '',
            'title3section' => 'Preguntas *frecuentes*',
            
        ]);
    }
}
