<?php

namespace App\Http\Controllers;

use App\Models\OtherService;
use Illuminate\Http\Request;

class OtherServiceController extends Controller
{
    // Admin methods
    public function index()
    {
        $services = OtherService::latest()->paginate(10);
        return view('admin.other-services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.other-services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        OtherService::create([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.other-services.index')->with('success', 'Service added successfully.');
    }

    public function edit(OtherService $otherService)
    {
        return view('admin.other-services.edit', compact('otherService'));
    }

    public function update(Request $request, OtherService $otherService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'link' => 'nullable|url',
            'order' => 'nullable|integer',
        ]);

        $otherService->update([
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.other-services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(OtherService $otherService)
    {
        $otherService->delete();
        return redirect()->route('admin.other-services.index')->with('success', 'Service deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $services = OtherService::active()->ordered()->get();
        return view('other-services', compact('services'));
    }
}