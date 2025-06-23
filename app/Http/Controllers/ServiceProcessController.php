<?php

namespace App\Http\Controllers;

use App\Models\ServiceProcess;
use Illuminate\Http\Request;

class ServiceProcessController extends Controller
{
    // Admin methods
    public function index()
    {
        $processes = ServiceProcess::latest()->paginate(10);
        return view('admin.service-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.service-processes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'services' => 'required|array',
            'services.*' => 'required|string',
            'documents' => 'required|array',
            'documents.*' => 'required|string',
        ]);

        ServiceProcess::create([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'services' => $request->services,
            'documents' => $request->documents,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.service-processes.index')->with('success', 'Service process created successfully.');
    }

    public function edit(ServiceProcess $serviceProcess)
    {
        return view('admin.service-processes.edit', compact('serviceProcess'));
    }

    public function update(Request $request, ServiceProcess $serviceProcess)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'services' => 'required|array',
            'services.*' => 'required|string',
            'documents' => 'required|array',
            'documents.*' => 'required|string',
        ]);

        $serviceProcess->update([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'services' => $request->services,
            'documents' => $request->documents,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.service-processes.index')->with('success', 'Service process updated successfully.');
    }

    public function destroy(ServiceProcess $serviceProcess)
    {
        $serviceProcess->delete();
        return redirect()->route('admin.service-processes.index')->with('success', 'Service process deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $process = ServiceProcess::active()->first();
        return view('service-process', compact('process'));
    }
}