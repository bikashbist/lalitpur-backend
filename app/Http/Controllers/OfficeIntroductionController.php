<?php

namespace App\Http\Controllers;

use App\Models\OfficeIntroduction;
use Illuminate\Http\Request;

class OfficeIntroductionController extends Controller
{
    public function index()
    {
        $introductions = OfficeIntroduction::latest()->paginate(10);
        return view('admin.office-introductions.index', compact('introductions'));
    }

    public function create()
    {
        return view('admin.office-introductions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_np' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_np' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'objectives_en' => 'required|array',
            'objectives_en.*' => 'required|string',
            'objectives_np' => 'required|array',
            'objectives_np.*' => 'required|string',
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_np' => $request->title_np,
            'description_en' => $request->description_en,
            'description_np' => $request->description_np,
            'objectives_en' => $request->objectives_en,
            'objectives_np' => $request->objectives_np,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/office-introduction', $filename);
            $data['image'] = 'uploads/office-introduction/' . $filename;
        }

        OfficeIntroduction::create($data);

        return redirect()->route('admin.office-introduction.index')->with('success', 'Office introduction created successfully.');
    }

    public function edit(OfficeIntroduction $officeIntroduction)
    {
        return view('admin.office-introductions.edit', compact('officeIntroduction'));
    }

    public function update(Request $request, OfficeIntroduction $officeIntroduction)
    {
        $request->validate([
            'title_en' => 'required|string|max:255',
            'title_np' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_np' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'objectives_en' => 'required|array',
            'objectives_en.*' => 'required|string',
            'objectives_np' => 'required|array',
            'objectives_np.*' => 'required|string',
        ]);

        $data = [
            'title_en' => $request->title_en,
            'title_np' => $request->title_np,
            'description_en' => $request->description_en,
            'description_np' => $request->description_np,
            'objectives_en' => $request->objectives_en,
            'objectives_np' => $request->objectives_np,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('image')) {
            if ($officeIntroduction->image && file_exists($officeIntroduction->image)) {
                unlink($officeIntroduction->image);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/office-introduction', $filename);
            $data['image'] = 'uploads/office-introduction/' . $filename;
        }

        $officeIntroduction->update($data);

        return redirect()->route('admin.office-introduction.index')->with('success', 'Office introduction updated successfully.');
    }

    public function destroy(OfficeIntroduction $officeIntroduction)
    {
        if ($officeIntroduction->image && file_exists($officeIntroduction->image)) {
            unlink($officeIntroduction->image);
        }

        $officeIntroduction->delete();

        return redirect()->route('admin.office-introduction.index')->with('success', 'Office introduction deleted successfully.');
    }

   
}
