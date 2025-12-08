<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function showOrderDetails($id)
    {
        $product = $this->getProductById($id);
        return view('order-details', compact('product'));
    }

    public function storeOrder(Request $request)
{
    try {
        \Log::info('📦 ORDER STORE STARTED', $request->all());
        
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_address' => 'required|string',
            'product_name' => 'required|string',
            'product_price' => 'required|numeric'
        ]);

        \Log::info('✅ VALIDATION PASSED');

        // Simpan order ke database
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'total_price' => $request->product_price,
            'status' => 'pending',
            'order_date' => now()
        ]);

        \Log::info('💾 ORDER SAVED TO DATABASE', ['order_id' => $order->id]);

        // Format pesan WhatsApp
        $formattedPrice = number_format($request->product_price, 0, ',', '.');
        
        $whatsappMessage = "Halo Cifaw Buketin! Saya ingin memesan:\n\n";
        $whatsappMessage .= "*PRODUK:* {$request->product_name}\n";
        $whatsappMessage .= "*JENIS:* " . ($request->product_type ?? 'Artificial Flower') . "\n";
        $whatsappMessage .= "*HARGA:* Rp {$formattedPrice}\n\n";
        $whatsappMessage .= "*DATA PELANGGAN:*\n";
        $whatsappMessage .= "• Nama: {$request->customer_name}\n";
        $whatsappMessage .= "• WhatsApp: {$request->customer_phone}\n";
        $whatsappMessage .= "• Alamat: {$request->customer_address}\n\n";
        $whatsappMessage .= "*ORDER ID:* #{$order->id}\n\n";
        $whatsappMessage .= "Saya ingin konfirmasi pemesanan ini. Terima kasih!";

        $encodedMessage = urlencode($whatsappMessage);
        $phoneNumber = "6282196562082";

        \Log::info('📤 REDIRECTING TO WHATSAPP');

        // Redirect ke WhatsApp
        return redirect()->away("https://wa.me/{$phoneNumber}?text={$encodedMessage}");

    } catch (\Exception $e) {
        \Log::error('❌ ORDER STORE ERROR: ' . $e->getMessage());
        \Log::error('Stack trace:', ['exception' => $e]);
        
        // Jika error, tetap redirect ke WhatsApp tanpa order ID
        $formattedPrice = number_format($request->product_price, 0, ',', '.');
        
        $whatsappMessage = "Halo Cifaw Buketin! Saya ingin memesan:\n\n";
        $whatsappMessage .= "*PRODUK:* {$request->product_name}\n";
        $whatsappMessage .= "*HARGA:* Rp {$formattedPrice}\n\n";
        $whatsappMessage .= "*DATA PELANGGAN:*\n";
        $whatsappMessage .= "• Nama: {$request->customer_name}\n";
        $whatsappMessage .= "• WhatsApp: {$request->customer_phone}\n";
        $whatsappMessage .= "• Alamat: {$request->customer_address}\n\n";
        $whatsappMessage .= "Saya ingin konfirmasi pemesanan ini. Terima kasih!";

        $encodedMessage = urlencode($whatsappMessage);
        
        return redirect()->away("https://wa.me/6282196562082?text={$encodedMessage}");
    }
}

    private function getProductById($id)
    {
        // Data produk dummy - sesuaikan dengan database Anda
        $products = [
            1 => ['id' => 1, 'name' => 'Buket Bunga Mawar', 'price' => 175000, 'image' => 'bucket1.jpg', 'type' => 'Artificial Flower'],
            2 => ['id' => 2, 'name' => 'Buket Butterfly Romantic', 'price' => 145000, 'image' => 'bucket2.jpg', 'type' => 'Butterfly'],
            3 => ['id' => 3, 'name' => 'Money Bucket Luxury', 'price' => 250000, 'image' => 'bucket3.jpg', 'type' => 'Money'],
            4 => ['id' => 4, 'name' => 'Photo Bucket Memory', 'price' => 195000, 'image' => 'bucket4.jpg', 'type' => 'Photo'],
            5 => ['id' => 5, 'name' => 'Snack Bucket Deluxe', 'price' => 165000, 'image' => 'bucket5.jpg', 'type' => 'Snack'],
            6 => ['id' => 6, 'name' => 'Revision Bucket Special', 'price' => 220000, 'image' => 'bucket6.jpg', 'type' => 'Revision']
        ];

        return $products[$id] ?? $products[1];
    }
}