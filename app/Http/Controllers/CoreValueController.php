<?php

namespace App\Http\Controllers;

use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueController extends Controller
{
    public function index()
    {
        $coreValues = CoreValue::latest()->get();
        return view('admin.pages.core-values.index', compact('coreValues'));
    }

    public function create()
    {
        return view('admin.pages.core-values.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Added image field
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/core-values', $filename);
            $imagePath = 'uploads/core-values/' . $filename;
        }

        CoreValue::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);

        return redirect()->route('core-values.index')->with('success', 'Core value added successfully.');
    }

    public function show(CoreValue $coreValue)
    {
        return view('admin.pages.core-values.show', compact('coreValue'));
    }

    public function edit(CoreValue $coreValue)
    {
        return view('admin.pages.core-values.edit', compact('coreValue'));
    }

    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($coreValue->image && file_exists($coreValue->image)) {
                unlink($coreValue->image);
            }

            // Upload new image
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/core-values', $filename);
            $data['image'] = 'uploads/core-values/' . $filename;
        }

        $coreValue->update($data);

        return redirect()->route('core-values.index')->with('success', 'Core value updated successfully.');
    }

    public function destroy(CoreValue $coreValue)
    {
        // Delete image if exists
        if ($coreValue->image && file_exists($coreValue->image)) {
            unlink($coreValue->image);
        }

        $coreValue->delete();

        return redirect()->route('core-values.index')->with('success', 'Core value deleted successfully.');
    }
}