<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@alertas.com',
            'password' => Hash::make(config('ADMIN_INITIAL_PASS', 'admin123')),
            'must_change_pass' => true,
            'is_admin' => true,
            'is_active' => true,
        ]);
    }
}
