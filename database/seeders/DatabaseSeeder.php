<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Admin SmartDrain',
            'email' => 'admin@smartdrain.test',
            'password' => 'password',
        ]);
        User::factory()->create([
            'name' => 'Dryhus Warga',
            'email' => 'dryhus@smartdrain.test',
            'password' => 'password',
        ]);
    }
}
