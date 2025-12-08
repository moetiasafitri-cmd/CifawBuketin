@extends('admin.layouts.admin')

@section('content')

<h2>Catalog</h2>

<a href="{{ route('admin.buckets.create') }}" class="btn btn-dark mb-3">Tambah Catalog</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach($buckets as $b)
        <tr>
            <td>{{ $b->name }}</td>
            <td>{{ $b->price }}</td>
            <td><img src="/storage/{{ $b->image }}" width="80"></td>
            <td>
                <a href="{{ route('admin.buckets.edit', $b->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <form action="{{ route('admin.buckets.delete', $b->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
