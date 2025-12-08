<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Bucket;

class BucketSeeder extends Seeder
{
    public function run(): void
    {
        $buckets = [
            [
                'name' => 'Buket Bunga Mawar Artificial Premium',
                'description' => 'Buket bunga mawar artificial berkualitas tinggi dengan desain elegan dan tahan lama',
                'price' => 175000,
                'image' => 'bucket1.jpg',
                'category' => 'Artificial Flower Bucket'
            ],
            [
                'name' => 'Buket Butterfly Romantic',
                'description' => 'Buket cantik dengan hiasan kupu-kupu dan bunga artificial yang romantis',
                'price' => 145000,
                'image' => 'bucket2.jpg',
                'category' => 'Butterfly Bucket'
            ],
            [
                'name' => 'Money Bucket Luxury Edition',
                'description' => 'Buket uang mewah dengan rangkaian yang elegan dan kemasan premium',
                'price' => 250000,
                'image' => 'bucket3.jpg',
                'category' => 'Money Bucket'
            ],
            [
                'name' => 'Photo Bucket Memory Lane',
                'description' => 'Buket spesial dengan frame foto untuk mengabadikan momen berharga',
                'price' => 195000,
                'image' => 'bucket4.jpg',
                'category' => 'Photo Bucket'
            ],
            [
                'name' => 'Snack Bucket Delight',
                'description' => 'Buket snack lengkap dengan berbagai makanan ringan favorit',
                'price' => 120000,
                'image' => 'bucket5.jpg',
                'category' => 'Snack Bucket'
            ],
            [
                'name' => 'Revision Bucket Custom',
                'description' => 'Layanan revisi buket sesuai permintaan dengan proses 7 hari kerja',
                'price' => 80000,
                'image' => 'bucket6.jpg',
                'category' => 'Revision Bucket'
            ],
        ];

        foreach ($buckets as $bucket) {
            Bucket::create($bucket);
        }
    }
}