<?php

namespace App\Http\Controllers;

use App\Models\TopUniversity;
use Illuminate\Http\Request;

class TopUniversityController extends Controller
{
    public function index()
    {
        $universities = TopUniversity::all();
        return view('admin.pages.topuniversities.index', compact('universities'));
    }

    public function create()
    {
        return view('admin.pages.topuniversities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/topuniversities'), $filename);

        TopUniversity::create([
            'name' => $request->name,
            'image_path' => 'uploads/topuniversities/' . $filename,
            'url' => $request->url,
        ]);

        return redirect()->route('top-university.index')->with('success', 'Top University added successfully.');
    }

    public function edit($id)
    {
        $university = TopUniversity::findOrFail($id);
        return view('admin.pages.topuniversities.edit', compact('university'));
    }

    public function update(Request $request, TopUniversity $topUniversity)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $topUniversity->image_path;

        if ($request->hasFile('image')) {
            if (file_exists(public_path($topUniversity->image_path))) {
                unlink(public_path($topUniversity->image_path));
            }
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/topuniversities'), $filename);
            $imagePath = 'uploads/topuniversities/' . $filename;
        }

        $topUniversity->update([
            'name' => $request->name,
            'image_path' => $imagePath,
            'url' => $request->url,
        ]);

        return redirect()->route('top-university.index')->with('success', 'Top University updated successfully.');
    }

    public function destroy(TopUniversity $topUniversity)
    {
        if (file_exists(public_path($topUniversity->image_path))) {
            unlink(public_path($topUniversity->image_path));
        }

        $topUniversity->delete();

        return redirect()->route('top-university.index')->with('success', 'Top University deleted successfully.');
    }
}
