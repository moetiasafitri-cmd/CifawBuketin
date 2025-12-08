<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display home page with products
     */
    public function index()
    {
        try {
            // Coba ambil data dari database
            $products = Product::where('is_active', true)
                        ->latest()
                        ->get();
            
            // Jika ada data dari database
            if ($products->isNotEmpty()) {
                $categories = [
                    'Artificial Flower Bucket',
                    'Butterfly Bucket', 
                    'Money Bucket',
                    'Photo Bucket',
                    'Revision Bucket',
                    'Snack Bucket'
                ];

                Log::info('Home page - Using database data: ' . $products->count() . ' products');
                
                return view('home', [
                    'products' => $products,
                    'categories' => $categories,
                    'data_source' => 'database'
                ]);
            } else {
                Log::warning('Home page - No active products in database, using fallback');
            }
            
        } catch (\Exception $e) {
            Log::error('Home page database error: ' . $e->getMessage());
        }

        // Fallback: data hardcoded
        $products = [
            [
                'id' => 1, 
                'name' => 'Artificial Flower Bucket', 
                'price' => 175000, 
                'image' => 'bucket1.jpg', 
                'type' => 'Artificial Flower',
                'description' => 'Buket bunga artificial berkualitas tinggi'
            ],
            [
                'id' => 2, 
                'name' => 'Butterfly Bucket', 
                'price' => 145000, 
                'image' => 'bucket2.jpg', 
                'type' => 'Butterfly',
                'description' => 'Buket dengan hiasan kupu-kupu cantik'
            ],
            [
                'id' => 3, 
                'name' => 'Money Bucket', 
                'price' => 250000, 
                'image' => 'bucket3.jpg', 
                'type' => 'Money',
                'description' => 'Buket uang dengan kemasan mewah'
            ],
            [
                'id' => 4, 
                'name' => 'Photo Bucket', 
                'price' => 195000, 
                'image' => 'bucket4.jpg', 
                'type' => 'Photo',
                'description' => 'Buket dengan foto kenangan spesial'
            ],
            [
                'id' => 5, 
                'name' => 'Snack Bucket', 
                'price' => 165000, 
                'image' => 'bucket5.jpg', 
                'type' => 'Snack',
                'description' => 'Buket berisi snack favorit pilihan'
            ],
            [
                'id' => 6, 
                'name' => 'Revision Bucket', 
                'price' => 220000, 
                'image' => 'bucket6.jpg', 
                'type' => 'Revision',
                'description' => 'Buket khusus untuk revisi spesial'
            ]
        ];

        $categories = [
            'Artificial Flower Bucket',
            'Butterfly Bucket', 
            'Money Bucket',
            'Photo Bucket',
            'Revision Bucket',
            'Snack Bucket'
        ];

        return view('home', [
            'products' => $products,
            'categories' => $categories,
            'data_source' => 'hardcoded'
        ]);
    }

    /**
     * Display catalog page with all products
     */
    /**
 * Display catalog page with all products
 */
public function catalog()
{
    try {
        Log::info('📦 CATALOG: Attempting to fetch products from database');
        
        // Cek koneksi database
        DB::connection()->getPdo();
        Log::info('✅ Database connection successful');
        
        // Ambil produk aktif dari database
        $products = Product::where('is_active', true)->latest()->get();
        Log::info('🛒 Active products found: ' . $products->count());
        
        // Jika tidak ada produk aktif, tampilkan semua produk
        if ($products->isEmpty()) {
            $products = Product::all();
            Log::info('⚠️ No active products, showing all: ' . $products->count());
        }
        
        // Log beberapa data produk untuk debugging
        if ($products->isNotEmpty()) {
            Log::info('📝 First product: ID=' . $products->first()->id . ', Name=' . $products->first()->name);
        }
        
        // ✅ PERBAIKAN: Gunakan 'catalog.index' bukan 'catalog'
        return view('catalog.index', [
            'products' => $products,
            'data_source' => 'database'
        ]);
        
    } catch (\Exception $e) {
        Log::error('❌ CATALOG ERROR: ' . $e->getMessage());
        Log::error('🔧 Stack trace: ', ['exception' => $e]);
        
        // Fallback 1: Coba view dengan empty collection
        try {
            Log::info('🔄 CATALOG: Trying fallback with empty collection');
            // ✅ PERBAIKAN: Gunakan 'catalog.index' bukan 'catalog'
            return view('catalog.index', [
                'products' => collect(),
                'data_source' => 'error_fallback'
            ]);
        } catch (\Exception $e2) {
            Log::error('❌ CATALOG FALLBACK ERROR: ' . $e2->getMessage());
            
            // Fallback 2: Data hardcoded sebagai array
            $products = [
                [
                    'id' => 1, 
                    'name' => 'Artificial Flower Bucket', 
                    'price' => 175000, 
                    'image' => 'bucket1.jpg', 
                    'type' => 'Artificial Flower',
                    'description' => 'Buket bunga artificial berkualitas tinggi'
                ],
                [
                    'id' => 2, 
                    'name' => 'Butterfly Bucket', 
                    'price' => 145000, 
                    'image' => 'bucket2.jpg', 
                    'type' => 'Butterfly',
                    'description' => 'Buket dengan hiasan kupu-kupu cantik'
                ],
                [
                    'id' => 3, 
                    'name' => 'Money Bucket', 
                    'price' => 250000, 
                    'image' => 'bucket3.jpg', 
                    'type' => 'Money',
                    'description' => 'Buket uang dengan kemasan mewah'
                ],
                [
                    'id' => 4, 
                    'name' => 'Photo Bucket', 
                    'price' => 195000, 
                    'image' => 'bucket4.jpg', 
                    'type' => 'Photo',
                    'description' => 'Buket dengan foto kenangan spesial'
                ],
                [
                    'id' => 5, 
                    'name' => 'Snack Bucket', 
                    'price' => 165000, 
                    'image' => 'bucket5.jpg', 
                    'type' => 'Snack',
                    'description' => 'Buket berisi snack favorit pilihan'
                ],
                [
                    'id' => 6, 
                    'name' => 'Revision Bucket', 
                    'price' => 220000, 
                    'image' => 'bucket6.jpg', 
                    'type' => 'Revision',
                    'description' => 'Buket khusus untuk revisi spesial'
                ]
            ];
            
            Log::info('🔄 CATALOG: Using hardcoded data with ' . count($products) . ' products');
            
            // ✅ PERBAIKAN: Gunakan 'catalog.index' bukan 'catalog'
            return view('catalog.index', [
                'products' => $products,
                'data_source' => 'hardcoded'
            ]);
        }
    }
}
}