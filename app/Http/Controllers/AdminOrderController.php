<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    // LIST ALL ORDERS
    public function index()
    {
        $orders = Order::latest()->paginate(10);
        return view('admin.orders.index', compact('orders'));
    }

    // SHOW ORDER DETAILS
    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    // ACCEPT ORDER
    public function accept(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'accepted';
        $order->save();

        return redirect()->route('admin.orders')->with('success', 'Order berhasil diterima!');
    }
}