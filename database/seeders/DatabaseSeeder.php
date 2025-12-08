<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Controller
{
    public function run()
    {
        // Create admin user
        User::create([
            'name' => 'Admin Cifaw',
            'email' => 'admincifaw@gmail.com',
            'password' => Hash::make('admin123'),
            'whatsapp_number' => '6282196562082',
            'role' => 'admin',
        ]);

        echo "Admin user created successfully!\n";
        echo "Email: admincifaw@gmail.com\n";
        echo "Password: admin123\n";
    }
}