<?php

namespace Database\Seeders;

use App\Modules\User\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = 'super_admin@admin.com';
        if (!User::query()->where('email', $email)->exists()) {
            User::query()->create([
                'name' => 'Super Admin',
                'email' => $email,
                'password' => '12345678',
            ]);
        }

    }
}
