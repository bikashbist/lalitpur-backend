<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->latest()->get();
        return view('admin.pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Generate unique filename
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        
        // Move to uploads/categories directory
        $request->image->move('uploads/categories', $filename);

        // Create category
        Category::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/categories/' . $filename,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category)
    {
        return view('admin.pages.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($category->image && file_exists($category->image)) {
                unlink($category->image);
            }

            // Upload new image
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/categories', $filename);
            $data['image'] = 'uploads/categories/' . $filename;
        }

        $category->update($data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Delete image if exists
        if ($category->image && file_exists($category->image)) {
            unlink($category->image);
        }
        
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}