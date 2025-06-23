<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $categories = MenuCategory::latest()->get();
        return view('admin.pages.menu-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.menu-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Standardized image upload
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/menu_categories', $filename);

        MenuCategory::create([
            'name' => $request->name,
            'image' => 'uploads/menu_categories/' . $filename,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(MenuCategory $menuCategory)
    {
        return view('admin.pages.menu-categories.edit', compact('menuCategory'));
    }

    public function update(Request $request, MenuCategory $menuCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($menuCategory->image && file_exists($menuCategory->image)) {
                unlink($menuCategory->image);
            }

            // Standardized image upload
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/menu_categories', $filename);
            $menuCategory->image = 'uploads/menu_categories/' . $filename;
        }

        $menuCategory->update([
            'name' => $request->name,
        ]);

        return redirect()->route('menu-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(MenuCategory $menuCategory)
    {
        if ($menuCategory->image && file_exists($menuCategory->image)) {
            unlink($menuCategory->image);
        }

        $menuCategory->delete();

        return redirect()->route('menu-categories.index')->with('success', 'Category deleted successfully.');
    }
}