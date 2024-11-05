<?php

namespace Database\Seeders;

use App\Models\Shortcode;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShortcodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Shortcode::create([
            'head' => ' ',
            'body' => ' ',
        ]);
    }
}