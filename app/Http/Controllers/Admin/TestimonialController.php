<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('admin.pages.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.pages.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'desc' => 'required|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Standardized image upload
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/testimonials', $filename);

        Testimonial::create([
            'name' => $request->name,
            'position' => $request->position,
            'desc' => $request->desc,
            'image' => 'uploads/testimonials/' . $filename,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.pages.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required|string',
            'position' => 'required|string',
            'desc' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testimonial->image && file_exists($testimonial->image)) {
                unlink($testimonial->image);
            }

            // Standardized image upload
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/testimonials', $filename);
            $testimonial->image = 'uploads/testimonials/' . $filename;
        }

        $testimonial->update([
            'name' => $request->name,
            'position' => $request->position,
            'desc' => $request->desc,
        ]);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && file_exists($testimonial->image)) {
            unlink($testimonial->image);
        }

        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}