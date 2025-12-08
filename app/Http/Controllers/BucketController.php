<?php

namespace App\Http\Controllers;

use App\Models\Bucket;
use Illuminate\Http\Request;

class BucketController extends Controller
{
    // LIST ALL BUCKETS (Admin)
    public function adminIndex()
    {
        $buckets = Bucket::latest()->paginate(10);
        return view('admin.buckets.index', compact('buckets'));
    }

    // FORM CREATE
    public function create()
    {
        return view('admin.buckets.create');
    }

    // STORE NEW BUCKET
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|max:2048'
        ]);

        $path = $request->file('image')->store('buckets', 'public');

        Bucket::create([
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $path,
        ]);

        return redirect()->route('admin.buckets.index')
            ->with('success', 'Bucket berhasil ditambahkan.');
    }

    // EDIT BUCKET
    public function edit(Bucket $bucket)
    {
        return view('admin.buckets.edit', compact('bucket'));
    }

    // UPDATE BUCKET
    public function update(Request $request, Bucket $bucket)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('buckets', 'public');
            $bucket->image = $path;
        }

        $bucket->name  = $request->name;
        $bucket->price = $request->price;
        $bucket->save();

        return redirect()->route('admin.buckets.index')
            ->with('success', 'Bucket berhasil diperbarui.');
    }

    // DELETE BUCKET
    public function destroy(Bucket $bucket)
    {
        $bucket->delete();

        return back()->with('success', 'Bucket berhasil dihapus.');
    }
}
