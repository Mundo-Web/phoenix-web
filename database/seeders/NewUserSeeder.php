<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class NewUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@americanbrands.com'
        ],[
            'name' => 'Admin AB',
            'email' => 'admin@americanbrands.com',
            'password' => Hash::make('@mer1c4B##'),
        ])->assignRole('Admin');
    }
}
