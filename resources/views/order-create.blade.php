@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <h3>Order Details</h3>

    <form action="{{ route('order.store') }}" method="POST">

        @csrf

        <input type="hidden" name="product_id" value="{{ $id }}">

        <label>Nama</label>
        <input required type="text" name="name" class="form-control mb-2">

        <label>Alamat</label>
        <textarea required name="address" class="form-control mb-2"></textarea>

        <label>No WhatsApp</label>
        <input required type="text" name="whatsapp" class="form-control mb-2">

        <label>Catatan (Optional)</label>
        <textarea name="note" class="form-control mb-2"></textarea>

        <button type="submit" class="btn btn-success mt-3">
            Konfirmasi Pesanan
        </button>

    </form>

</div>

@endsection
