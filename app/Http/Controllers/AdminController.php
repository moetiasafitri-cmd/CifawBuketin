<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // DASHBOARD
    public function dashboard()
    {
        $orderCount = Order::count();
        $pendingCount = Order::where('status', 'pending')->count();

        return view('admin.dashboard', compact('orderCount', 'pendingCount'));
    }

    public function orders()
    {
    $orders = Order::with('user')->latest()->paginate(10);
    return view('admin.orders.index', compact('orders'));
    }

    // UPDATE ORDER STATUS
    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $order->status = $request->status;
        $order->save();

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
    
}
