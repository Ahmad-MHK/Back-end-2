<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ImagesShow;

class ImageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        ImagesShow::create([
            'image' => $imageName,
        ]);

        return redirect()->back()->with('success','Image Uploaded successfully.');
    }

    public function index()
    {
        $images = ImagesShow::all();
        return view('app', compact('images'));
    }
}
