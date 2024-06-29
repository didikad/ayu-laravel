<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('admin.images.index', compact('images'));
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('image');
        $path = $image->store('images', 'public');

        Image::create(['filename' => $path]);

        return redirect()->route('images.index')
            ->with('success', 'Image uploaded successfully.');
    }

    public function destroy($id)
    {
        $image = Image::find($id);

        if (Storage::disk('public')->exists($image->filename)) {
            Storage::disk('public')->delete($image->filename);
        }

        $image->delete();

        return redirect()->route('images.index')
            ->with('success', 'Image deleted successfully.');
    }
}
