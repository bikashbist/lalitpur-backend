<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create', [
            'categories' => Gallery::CATEGORIES
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|in:photo,video',
            'image_name_en' => 'required|string|max:255',
            'image_name_np' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_np' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url'
        ]);

        $data = [
            'category' => $request->category,
            'image_name_en' => $request->image_name_en,
            'image_name_np' => $request->image_name_np,
            'title_en' => $request->title_en,
            'title_np' => $request->title_np,
            'video_url' => $request->video_url
        ];

        if ($request->hasFile('image')) {
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads/gallery', $filename);
            $data['image_path'] = 'uploads/gallery/'.$filename;
        }

        Gallery::create($data);

        return redirect()->route('gallery.index')
               ->with('success', 'Gallery item added successfully!');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        return view('admin.pages.gallery.edit', [
            'gallery' => $gallery,
            'categories' => Gallery::CATEGORIES
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'category' => 'required|in:photo,video',
            'image_name_en' => 'required|string|max:255',
            'image_name_np' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_np' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_url' => 'nullable|url'
        ]);

        $data = [
            'category' => $request->category,
            'image_name_en' => $request->image_name_en,
            'image_name_np' => $request->image_name_np,
            'title_en' => $request->title_en,
            'title_np' => $request->title_np,
            'video_url' => $request->video_url
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($gallery->image_path && file_exists($gallery->image_path)) {
                unlink($gallery->image_path);
            }

            // Upload new image
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads/gallery', $filename);
            $data['image_path'] = 'uploads/gallery/'.$filename;
        }

        $gallery->update($data);

        return redirect()->route('gallery.index')
               ->with('success', 'Gallery item updated successfully!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete image if exists
        if ($gallery->image_path && file_exists($gallery->image_path)) {
            unlink($gallery->image_path);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
               ->with('success', 'Gallery item deleted successfully!');
    }
}