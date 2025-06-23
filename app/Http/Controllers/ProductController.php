<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
    
    public function index()
    {
        $products = Product::all();
        return view('admin.pages.products.index', compact('products'));
    }
    
    public function create()
    {
        return view('admin.pages.products.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'brand' => 'nullable|string',
            'condition' => 'nullable|string',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'shop_category' => 'required|string',
        ]);
    
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
    
        // Move the uploaded file to the 'uploads/products' directory in the public folder
        $request->image->move(public_path('uploads/products'), $filename);
    
        // Save the product data, including the correct image path
        Product::create([
            'title' => $request->title,
            'image' => 'uploads/products/' . $filename, // Correct path to the image
            'price' => $request->price,
            'description' => $request->description,
            'brand' => $request->brand,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'category' => $request->category,
            'shop_category' => $request->shop_category,
        ]);
    
        return redirect()->route('products.index')->with('success', 'Product added.');
    }
    
    
    public function edit(Product $product)
    {
        return view('admin.pages.products.edit', compact('product'));
    }
    
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'brand' => 'nullable|string',
            'condition' => 'nullable|string',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'shop_category' => 'required|string',
        ]);
    
        if ($request->hasFile('image')) {
            if ($product->image && file_exists(public_path($product->image))) {
                unlink(public_path($product->image));
            }
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = 'uploads/products/' . $imageName;
            $image->move(public_path('uploads/products'), $imageName);
            $product->image = $imagePath;
        }
    
        $product->update($request->except('image') + ['image' => $product->image]);
    
        return redirect()->route('products.index')->with('success', 'Product updated.');
    }
    
    public function destroy(Product $product)
    {
        if ($product->image && file_exists(public_path($product->image))) {
            unlink(public_path($product->image));
        }
    
        $product->delete();
    
        return redirect()->route('products.index')->with('success', 'Product deleted.');
    }
    
}
