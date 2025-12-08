@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Manajemen Pesanan</h2>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Produk</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->product_name }}</td>
                <td>
                    <span class="badge bg-info">{{ $order->status }}</span>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.orders.update-status', $order->id) }}">
                        @csrf
                        <select name="status" onchange="this.form.submit()" class="form-select">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="accepted" {{ $order->status == 'accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="done" {{ $order->status == 'done' ? 'selected' : '' }}>Selesai</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection
