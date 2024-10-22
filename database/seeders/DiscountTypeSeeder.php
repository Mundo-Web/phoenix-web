<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountTypeSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('discount_types')->insert([
            [
                'name' => 'Unidad',
                'created_at' => '2024-10-20 21:33:46',
                'updated_at' => '2024-10-20 23:57:40',
            ],
            [
                'name' => 'Porcentual',
                'created_at' => '2024-10-20 21:33:46',
                'updated_at' => '2024-10-20 23:57:40',
            ],
            // [
            //     'name' => 'Precio',
            //     'created_at' => '2024-10-20 21:33:46',
            //     'updated_at' => '2024-10-20 23:57:40',
            // ],
        ]);
    }
}
