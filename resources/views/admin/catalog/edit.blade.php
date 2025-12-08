@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Edit Produk</h2>

    <form action="{{ route('admin.catalog.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" class="form-control" value="{{ $item->name }}">
        </div>

        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="price" class="form-control" value="{{ $item->price }}">
        </div>

        <div class="mb-3">
            <label>Foto Saat Ini</label><br>
            <img src="{{ asset('images/' . $item->image) }}" width="120">
        </div>

        <div class="mb-3">
            <label>Ganti Foto (opsional)</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.catalog.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
