<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\General;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General::updateOrCreate([
            'id' => 1
        ],[
            'address' => 'Av. Sin numero',
            'inside' => 'Oficina xxx - Piso x',
            'district' => 'Lima',
            'schedule' => "De Lunes a Viernes de 9:00am a 6:00pm y Sábados de 9:00am a 1:00pm",
            'city' => 'Lima',
            'country' => 'Perú',
            'cellphone' => '999-999-999' ,
            'office_phone' => '9999-999' ,
            'email' => 'usuario@phoenix.pe',
            'facebook' => 'www.facebook.com',
            'instagram' => 'www.instagram.com',
            'youtube' => 'www.youtube.com',
            'twitter' => 'www.twitter.com',
            'whatsapp' => '51123456789' ,
            'form_email' => 'usuario@phoenix.pe',
            'business_hours' => 'horas',
            'mensaje_whatsapp' => 'Hola estamos atentos a lo que ud desee',
            'htop' =>'',
            'aboutus' => 'Maecenas accumsan tortor vitae felis mollis suscipit. In hac habitasse platea dictumst.'
        ]);
    }
}
