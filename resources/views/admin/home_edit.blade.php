@extends('admin.layout')

@section('content')
<h2 class="text-2xl font-bold mb-4">Edit Halaman Home</h2>

<form action="{{ route('admin.home.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label class="font-semibold">Hero Title</label>
    <input
        type="text"
        name="hero_title"
        class="w-full p-2 border mb-3"
        value="{{ old('hero_title', $home->hero_title) }}"
    >

    <label class="font-semibold">Hero Description</label>
    <input
        type="text"
        name="hero_desc"
        class="w-full p-2 border mb-3"
        value="{{ old('hero_desc', $home->hero_desc) }}"
    >

    <label class="font-semibold">Hero Image</label>
    <input
        type="file"
        name="hero_image"
        class="w-full p-2 border"
    >

    @if ($home->hero_image)
        <div class="mt-3">
            <p class="text-sm text-gray-600 mb-1">Gambar Saat Ini:</p>
            <img src="{{ asset('storage/' . $home->hero_image) }}" width="200" class="rounded shadow">
        </div>
    @endif

    <button class="mt-4 px-5 py-2 bg-blue-600 text-white rounded">
        Simpan
    </button>
</form>
@endsection
