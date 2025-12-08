@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Tambah Produk</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.catalog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga (angka saja)</label>
            <input type="number" name="price" class="form-control" required>
            <small class="text-muted">Contoh: 145000 (untuk Rp 145.000)</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Tipe/Kategori</label>
            <select name="type" class="form-control">
                <option value="Artificial Flower">Artificial Flower</option>
                <option value="Butterfly">Butterfly</option>
                <option value="Money">Money</option>
                <option value="Photo">Photo</option>
                <option value="Revision">Revision</option>
                <option value="Snack">Snack</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Foto Produk</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
            <small class="text-muted">Format: JPG, PNG, JPEG. Maksimal 2MB</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="ACTIVE">ACTIVE</option>
                <option value="INACTIVE">INACTIVE</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.catalog.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection