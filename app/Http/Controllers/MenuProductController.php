<?php
namespace App\Http\Controllers;

use App\Models\MenuProduct;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuProductController extends Controller
{
    public function index()
    {
        $products = MenuProduct::with('category')->get();
        return view('admin.pages.menu-products.index', compact('products'));
    }

    public function create()
    {
        $categories = MenuCategory::all();
        return view('admin.pages.menu-products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'reasons_to_study' => 'nullable|string',
            'scholarships' => 'nullable|string',
            'application_process' => 'nullable|string',
        ]);

        $uploadPath = 'uploads/menu_products/';
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move($uploadPath, $filename);

        MenuProduct::create([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'image' => $uploadPath . $filename,
            'description' => $request->description,
            'reasons_to_study' => $request->reasons_to_study,
            'scholarships' => $request->scholarships,
            'application_process' => $request->application_process,
        ]);

        return redirect()->route('menu-products.index')->with('success', 'Product created successfully.');
    }

    public function edit(MenuProduct $menuProduct)
    {
        $categories = MenuCategory::all();
        return view('admin.pages.menu-products.edit', compact('menuProduct', 'categories'));
    }

    public function update(Request $request, MenuProduct $menuProduct)
    {
        $request->validate([
            'menu_category_id' => 'required|exists:menu_categories,id',
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'reasons_to_study' => 'nullable|string',
            'scholarships' => 'nullable|string',
            'application_process' => 'nullable|string',
        ]);

        $uploadPath = 'uploads/menu_products/';

        if ($request->hasFile('image')) {
            // Delete old image
            if ($menuProduct->image && File::exists($menuProduct->image)) {
                File::delete($menuProduct->image);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move($uploadPath, $filename);
            $menuProduct->image = $uploadPath . $filename;
        }

        $menuProduct->update([
            'menu_category_id' => $request->menu_category_id,
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'reasons_to_study' => $request->reasons_to_study,
            'scholarships' => $request->scholarships,
            'application_process' => $request->application_process,
        ]);

        return redirect()->route('menu-products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(MenuProduct $menuProduct)
    {
        if ($menuProduct->image && File::exists($menuProduct->image)) {
            File::delete($menuProduct->image);
        }

        $menuProduct->delete();

        return redirect()->route('menu-products.index')->with('success', 'Product deleted successfully.');
    }
}
