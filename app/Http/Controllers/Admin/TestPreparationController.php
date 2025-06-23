<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Models\TestPreparation;

class TestPreparationController extends Controller
{
    public function index(Request $request)
    {
        $categories = ServiceCategory::all();
        
        $query = TestPreparation::with(['items', 'category']);
        
        if ($request->has('category_id')) {
            $query->where('service_category_id', $request->category_id);
        }
        
        $testPreparations = $query->get();
        
        return view('admin.pages.testpreparation.index', compact('testPreparations', 'categories'));
    }

    public function create()
    { 
        $categories = ServiceCategory::all();
        return view('admin.pages.testpreparation.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'row_title.*' => 'nullable',
            'row_description.*' => 'nullable',
            'row_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Store main image
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/testpreparations', $filename);

        $testPreparation = TestPreparation::create([
            'service_category_id' => $request->service_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/testpreparations/' . $filename
        ]);

        // Store dynamic rows
        if ($request->row_title) {
            foreach ($request->row_title as $index => $title) {
                $itemImagePath = null;
                if (isset($request->row_image[$index])) {
                    $itemFilename = time() . '_' . $index . '.' . $request->row_image[$index]->getClientOriginalExtension();
                    $request->row_image[$index]->move('uploads/testpreparations/items', $itemFilename);
                    $itemImagePath = 'uploads/testpreparations/items/' . $itemFilename;
                }

                $testPreparation->items()->create([
                    'title' => $title,
                    'description' => $request->row_description[$index] ?? '',
                    'image' => $itemImagePath
                ]);
            }
        }

        return redirect()->route('testpreparation.index')->with('success', 'Test Preparation created successfully.');
    }

    public function edit($id)
    {
        $categories = ServiceCategory::all();
        $testPreparation = TestPreparation::with('items')->findOrFail($id);
        return view('admin.pages.testpreparation.edit', compact('testPreparation', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'service_category_id' => 'required|exists:service_categories,id',
            'title' => 'required',
            'description' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'row_title.*' => 'nullable',
            'row_description.*' => 'nullable',
            'row_image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $testPreparation = TestPreparation::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($testPreparation->image && file_exists($testPreparation->image)) {
                unlink($testPreparation->image);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/testpreparations', $filename);
            $testPreparation->image = 'uploads/testpreparations/' . $filename;
        }

        $testPreparation->update([
            'service_category_id' => $request->service_category_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Delete old items and their images
        foreach ($testPreparation->items as $item) {
            if ($item->image && file_exists($item->image)) {
                unlink($item->image);
            }
            $item->delete();
        }

        // Store new dynamic rows
        if ($request->row_title) {
            foreach ($request->row_title as $index => $title) {
                $itemImagePath = null;
                if (isset($request->row_image[$index])) {
                    $itemFilename = time() . '_' . $index . '.' . $request->row_image[$index]->getClientOriginalExtension();
                    $request->row_image[$index]->move('uploads/testpreparations/items', $itemFilename);
                    $itemImagePath = 'uploads/testpreparations/items/' . $itemFilename;
                }

                $testPreparation->items()->create([
                    'title' => $title,
                    'description' => $request->row_description[$index] ?? '',
                    'image' => $itemImagePath
                ]);
            }
        }

        return redirect()->route('testpreparation.index')->with('success', 'Test Preparation updated successfully.');
    }

    public function destroy($id)
    {
        $testPreparation = TestPreparation::with('items')->findOrFail($id);
        
        // Delete main image
        if ($testPreparation->image && file_exists($testPreparation->image)) {
            unlink($testPreparation->image);
        }
        
        // Delete item images
        foreach ($testPreparation->items as $item) {
            if ($item->image && file_exists($item->image)) {
                unlink($item->image);
            }
        }
        
        $testPreparation->delete();
        
        return redirect()->route('testpreparation.index')->with('success', 'Test Preparation deleted successfully.');
    }
}