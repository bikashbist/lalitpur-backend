<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.pages.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.pages.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name_en' => 'required|string|max:255',
            'image_name_np' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/banner', $filename);

        Banner::create([
            'image_name_en' => $request->image_name_en,
            'image_name_np' => $request->image_name_np,
            'image' => 'uploads/banner/' . $filename,
        ]);

        return redirect()->route('banner.index')->with('success', __('Banner created successfully.'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.pages.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
         $request->validate([
            'image_name_en' => 'required|string|max:255',
            'image_name_np' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
        ], [
            'image.required' => 'Please select an image file',
            'image.image' => 'The file must be an image',
            'image.mimes' => 'Only jpeg, png, jpg, and gif images are allowed',
            'image.max' => 'The image size must be less than 2MB',
            'image_name_en.required' => 'English title is required',
            'image_name_np.required' => 'Nepali title is required',
        ]);

        if ($request->hasFile('image')) {
            if ($banner->image && file_exists($banner->image)) {
                unlink($banner->image);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/banner', $filename);
            $imagePath = 'uploads/banner/' . $filename;
        } else {
            $imagePath = $banner->image;
        }

        $banner->update([
            'image_name_en' => $request->image_name_en,
            'image_name_np' => $request->image_name_np,
            'image' => $imagePath,
        ]);

        return redirect()->route('banner.index')->with('success', __('Banner updated successfully.'));
    }

    public function destroy(Banner $banner)
    {
        if ($banner->image && file_exists($banner->image)) {
            unlink($banner->image);
        }

        $banner->delete();
        return redirect()->route('banner.index')->with('success', __('Banner deleted successfully.'));
    }
}