@extends('admin.layout')

@section('content')
<h2 class="text-xl font-bold mb-4">Detail Pesanan</h2>

<div class="p-4 bg-white shadow rounded">
    <p><strong>Nama:</strong> {{ $order->customer_name }}</p>
    <p><strong>Telepon:</strong> {{ $order->customer_phone }}</p>
    <p><strong>Produk:</strong> {{ $order->product_name }}</p>
    <p><strong>Harga:</strong> Rp{{ $order->product_price }}</p>

    @if ($order->status == 'pending')
        <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST">
            @csrf
            <button class="mt-4 px-4 py-2 bg-green-600 text-white rounded">ACC Pesanan</button>
        </form>
    @else
        <p class="mt-4 text-green-600 font-bold">Pesanan sudah diterima ✔</p>
    @endif
</div>
@endsection
