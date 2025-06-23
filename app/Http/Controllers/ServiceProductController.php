<?php

namespace App\Http\Controllers;

use App\Models\ServiceProduct;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{
    public function index()
    {
        $products = ServiceProduct::with('scategory')->get();
        return view('admin.pages.service-products.index', compact('products'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('admin.pages.service-products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadPath = 'uploads/service-products';
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move($uploadPath, $filename);
        $imagePath = $uploadPath . '/' . $filename;

        ServiceProduct::create([
            'service_category_id' => $request->service_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('service-products.index')->with('success', 'Product created successfully.');
    }

    public function edit(ServiceProduct $serviceProduct)
    {
        $categories = ServiceCategory::all();
        return view('admin.pages.service-products.edit', compact('serviceProduct', 'categories'));
    }

    public function update(Request $request, ServiceProduct $serviceProduct)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'service_category_id' => $request->service_category_id,
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image
            if ($serviceProduct->image && file_exists($serviceProduct->image)) {
                unlink($serviceProduct->image);
            }

            $uploadPath = 'uploads/service-products';
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move($uploadPath, $filename);
            $data['image'] = $uploadPath . '/' . $filename;
        }

        $serviceProduct->update($data);

        return redirect()->route('service-products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(ServiceProduct $serviceProduct)
    {
        if ($serviceProduct->image && file_exists($serviceProduct->image)) {
            unlink($serviceProduct->image);
        }

        $serviceProduct->delete();

        return redirect()->route('service-products.index')->with('success', 'Product deleted successfully.');
    }
}
