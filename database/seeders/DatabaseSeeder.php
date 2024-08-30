<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->admin()->createOne([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'phone' => '111111111',
            'password' => Hash::make('password'),
        ]);

        $student = User::factory()->student()->createOne([
            'name' => 'Student',
            'email' => 'student@demo.com',
            'phone' => '222222222',
            'password' => Hash::make('password'),
        ]);

        $this->command->table(['ID', 'Name', 'Email', 'Phone', 'Password', 'Type', 'Type Code'], [
            [$admin->id, $admin->name, $admin->email, $admin->phone, 'password', 'Admin', $admin->type],
            [
                $student->id,
                $student->name,
                $student->email,
                $student->phone,
                'password',
                'Student',
                $student->type,
            ],
        ]);

        $this->call([
            BookSeeder::class,
        ]);
    }
}
