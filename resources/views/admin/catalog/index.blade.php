@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Catalog</h2>

    <a href="{{ route('admin.catalog.create') }}" class="btn btn-primary mb-3">+ Tambah Produk</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($catalog as $item)
            <tr>
                <td><img src="{{ asset('images/' . $item->image) }}" width="80"></td>
                <td>{{ $item->name }}</td>
                <td>Rp {{ number_format($item->price, 0, ',', '.') }}Rp {{ number_format($item->price, 0, ',', '.') }}<td>
                    <a href="{{ route('admin.catalog.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('admin.catalog.delete', $item->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
