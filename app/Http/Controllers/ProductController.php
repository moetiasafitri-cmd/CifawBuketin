<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        // tampilkan 50 per halaman
        $products = Product::latest()->paginate(50);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'type' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'is_active' => 'nullable',
        ]);

        // SIMPAN DATA
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->type = $request->type;
        $product->is_active = $request->has('is_active') ? 1 : 0;

        // UPLOAD IMAGE
        if ($request->hasFile('image')) {

            // Pastikan direktori ada
            if (!Storage::exists('public/products')) {
                Storage::makeDirectory('public/products');
            }

            // Nama file
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();

            // Simpan file
            $request->image->storeAs('public/products', $imageName);

            // Simpan path ke database
            $product->image = 'products/' . $imageName;
        }

        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully!');
    }
}
