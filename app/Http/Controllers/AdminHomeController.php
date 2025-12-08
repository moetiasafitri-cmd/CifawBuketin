<?php

namespace App\Http\Controllers;

use App\Models\HomeSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminHomeController extends Controller
{
    public function edit()
    {
        $home = HomeSetting::first();
        return view('admin.home_edit', compact('home'));
    }

    public function update(Request $request)
    {
        $home = HomeSetting::first();

        if ($request->hasFile('hero_image')) {
            Storage::delete("public/" . $home->hero_image);
            $home->hero_image = $request->file('hero_image')->store('home', 'public');
        }

        $home->hero_title = $request->hero_title;
        $home->hero_desc  = $request->hero_desc;
        $home->save();

        return back()->with('success', 'Home page diperbarui');
    }
}
