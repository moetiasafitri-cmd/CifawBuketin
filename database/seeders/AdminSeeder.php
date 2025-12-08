<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Cifaw',
            'email' => 'admincifaw@gmail.com',
            'password' => Hash::make('admin123'),
            'whatsapp_number' => '6282196562082',
            'role' => 'admin',
        ]);

        // Sample buckets jika belum ada
        if (\App\Models\Bucket::count() == 0) {
            \App\Models\Bucket::create([
                'name' => 'Artificial Flower Bucket',
                'description' => 'Buket mawar merah yang romantis',
                'price' => 250000,
                'image' => 'bucket1.jpg',
            ]);

            \App\Models\Bucket::create([
                'name' => 'Butterfly Bucket', 
                'description' => 'Buket kupu kupu',
                'price' => 180000,
                'image' => 'bucket2.jpg',
            ]);
        }
    }
}