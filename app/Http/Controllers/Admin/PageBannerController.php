<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBanner;

class PageBannerController extends Controller
{
    public function index()
    {
        $banners = PageBanner::all();
        return view('admin.pages.page-banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.pages.page-banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page' => 'required|string',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        // Standardized image upload
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/page-banners', $filename);

        PageBanner::create([
            'page' => $request->page,
            'title' => $request->title,
            'image' => 'uploads/page-banners/' . $filename,
        ]);

        return redirect()->route('page-banners.index')->with('success', 'Page banner created successfully.');
    }

    public function edit($id)
    {
        $banner = PageBanner::findOrFail($id);
        return view('admin.pages.page-banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'page' => 'required|string',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        $banner = PageBanner::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($banner->image && file_exists($banner->image)) {
                unlink($banner->image);
            }

            // Standardized image upload
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/page-banners', $filename);
            $banner->image = 'uploads/page-banners/' . $filename;
        }

        $banner->page = $request->page;
        $banner->title = $request->title;
        $banner->save();

        return redirect()->route('page-banners.index')->with('success', 'Page banner updated successfully.');
    }

    public function destroy($id)
    {
        $banner = PageBanner::findOrFail($id);

        if ($banner->image && file_exists($banner->image)) {
            unlink($banner->image);
        }

        $banner->delete();

        return redirect()->route('page-banners.index')->with('success', 'Page banner deleted successfully.');
    }
}