<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'titulo' => 'Nombre del proyecto aquí',
                'descripcion' => 'Mauris euismod vehicula eros egestas venenatis. Vestibulum non pulvinar risus. Praesent hendrerit lectus ultrices purus consectetur, eu sollicitudin libero pretium.',
                'imagen' => 'storage/images/imagen/fl85XXUtND_Ima2.png',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:46',
                'updated_at' => '2024-08-02 23:57:40',
            ],
            [
                'titulo' => 'La oportunidad',
                'descripcion' => 'Quisque pharetra aliquet nibh bibendum vestibulum. Praesent mollis velit at dui venenatis, eu egestas neque suscipit. Maecenas et molestie augue, et rutrum augue. Aliquam mattis urna et nisi dignissim mattis.',
                'imagen' => 'storage/images/imagen/i4pfzlPd8d_Ima2.png',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],
            [
                'titulo' => 'Lo que hicimos',
                'descripcion' => 'Quisque pharetra aliquet nibh bibendum vestibulum. Praesent mollis velit at dui venenatis, eu egestas neque suscipit. Maecenas et molestie augue, et rutrum augue. Aliquam mattis urna et nisi dignissim mattis.',
                'imagen' => 'storage/images/imagen/i4pfzlPd8d_Ima2.png',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],
            [
                'titulo' => 'El resultado',
                'descripcion' => 'Quisque pharetra aliquet nibh bibendum vestibulum. Praesent mollis velit at dui venenatis, eu egestas neque suscipit. Maecenas et molestie augue, et rutrum augue. Aliquam mattis urna et nisi dignissim mattis.',
                'imagen' => 'storage/images/imagen/i4pfzlPd8d_Ima2.png',
                'status' => 1,
                'created_at' => '2024-08-02 21:33:56',
                'updated_at' => '2024-08-03 00:22:01',
            ],
        ]);
    }
    
}
