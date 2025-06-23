<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceProController extends Controller
{
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.pages.service.index', compact('services'));
    }

    public function create()
    {
        return view('admin.pages.service.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/services', $filename);
            $imagePath = 'uploads/services/' . $filename;
        }

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('services_product.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service)
    {
        return view('admin.pages.service.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($service->image && file_exists($service->image)) {
                unlink($service->image);
            }

            // Upload new image
            $filename = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/services', $filename);
            $service->image = 'uploads/services/' . $filename;
        }

        $service->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('services_product.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service)
    {
        if ($service->image && file_exists($service->image)) {
            unlink($service->image);
        }

        $service->delete();

        return redirect()->route('services_product.index')->with('success', 'Service deleted successfully.');
    }
}