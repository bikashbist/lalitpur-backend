<?php

namespace App\Http\Controllers;

use App\Models\CitizenService;
use Illuminate\Http\Request;

class CitizenServiceController extends Controller
{
    // Admin methods
    public function index()
    {
        $services = CitizenService::latest()->paginate(10);
        return view('admin.citizen-services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.citizen-services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'required_documents' => 'required|array',
            'required_documents.*' => 'required|string',
        ]);

        CitizenService::create([
            'title' => $request->title,
            'service_name' => $request->service_name,
            'required_documents' => $request->required_documents,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.citizen-services.index')->with('success', 'Service added successfully.');
    }

    public function edit(CitizenService $citizenService)
    {
        return view('admin.citizen-services.edit', compact('citizenService'));
    }

    public function update(Request $request, CitizenService $citizenService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'service_name' => 'required|string|max:255',
            'required_documents' => 'required|array',
            'required_documents.*' => 'required|string',
        ]);

        $citizenService->update([
            'title' => $request->title,
            'service_name' => $request->service_name,
            'required_documents' => $request->required_documents,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.citizen-services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(CitizenService $citizenService)
    {
        $citizenService->delete();
        return redirect()->route('admin.citizen-services.index')->with('success', 'Service deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $services = CitizenService::active()->ordered()->get();
        return view('citizen-services', compact('services'));
    }
}