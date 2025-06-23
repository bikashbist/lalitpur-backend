<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = Subcategory::with('category')->latest()->get();
        return view('admin.pages.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.pages.subcategories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Generate unique filename
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        
        // Move to public/uploads/subcategories directory
        $request->image->move(public_path('uploads/subcategories'), $filename);

        // Create subcategory
        Subcategory::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/subcategories/' . $filename,
        ]);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory created successfully.');
    }

    public function show(Subcategory $subcategory)
    {
        return view('admin.pages.subcategories.show', compact('subcategory'));
    }

    public function edit(Subcategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.pages.subcategories.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($subcategory->image && file_exists(public_path($subcategory->image))) {
                unlink(public_path($subcategory->image));
            }

            // Upload new image
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/subcategories'), $filename);
            $data['image'] = 'uploads/subcategories/' . $filename;
        }

        $subcategory->update($data);

        return redirect()->route('subcategories.index')->with('success', 'Subcategory updated successfully.');
    }

    public function destroy(Subcategory $subcategory)
    {
        // Delete image if exists
        if ($subcategory->image && file_exists(public_path($subcategory->image))) {
            unlink(public_path($subcategory->image));
        }
        
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Subcategory deleted successfully.');
    }
}