<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('admin.pages.service-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.pages.service-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
            // Create directories if they don't exist
            if (!file_exists('uploads/service-categories')) {
                mkdir('uploads/service-categories', 0777, true);
            }
            if (!file_exists('uploads/service-categories/icons')) {
                mkdir('uploads/service-categories/icons', 0777, true);
            }

            // Handle main image upload
            $imageFilename = time() . '_main.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/service-categories', $imageFilename);
            $imagePath = 'uploads/service-categories/' . $imageFilename;

            // Handle icon upload
            $iconFilename = time() . '_icon.' . $request->image_icon->getClientOriginalExtension();
            $request->image_icon->move('uploads/service-categories/icons', $iconFilename);
            $iconPath = 'uploads/service-categories/icons/' . $iconFilename;

            ServiceCategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $imagePath,
                'image_icon' => $iconPath,
            ]);

            return redirect()->route('service-categories.index')
                             ->with('success', 'Service category created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error creating category: ' . $e->getMessage());
        }
    }

    public function show(ServiceCategory $serviceCategory)
    {
        return view('admin.pages.service-categories.show', compact('serviceCategory'));
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.pages.service-categories.edit', compact('serviceCategory'));
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:service_categories,name,' . $serviceCategory->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image_icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        // Handle main image update
        if ($request->hasFile('image')) {
            if ($serviceCategory->image && file_exists($serviceCategory->image)) {
                File::delete($serviceCategory->image);
            }

            $imageFilename = time() . '_main.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/service-categories', $imageFilename);
            $data['image'] = 'uploads/service-categories/' . $imageFilename;
        }

        // Handle icon update
        if ($request->hasFile('image_icon')) {
            if ($serviceCategory->image_icon && file_exists($serviceCategory->image_icon)) {
                File::delete($serviceCategory->image_icon);
            }

            $iconFilename = time() . '_icon.' . $request->image_icon->getClientOriginalExtension();
            $request->image_icon->move('uploads/service-categories/icons', $iconFilename);
            $data['image_icon'] = 'uploads/service-categories/icons/' . $iconFilename;
        }

        $serviceCategory->update($data);

        return redirect()->route('service-categories.index')
                         ->with('success', 'Service category updated successfully.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        if ($serviceCategory->image && file_exists($serviceCategory->image)) {
            File::delete($serviceCategory->image);
        }

        if ($serviceCategory->image_icon && file_exists($serviceCategory->image_icon)) {
            File::delete($serviceCategory->image_icon);
        }

        $serviceCategory->delete();

        return redirect()->route('service-categories.index')
                         ->with('success', 'Service category deleted successfully.');
    }
}
