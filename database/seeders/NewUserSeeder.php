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
            'email' => 'admin@phoenix-fitness.fit'
        ],[
            'name' => 'admin',
            'email' => 'admin@phoenix-fitness.fit',
            'password' => Hash::make('@phoenix2025#'),
        ])->assignRole('Admin');
    }
}
