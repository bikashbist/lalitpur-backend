<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceFlow;
use Illuminate\Http\Request;

class ServiceFlowController extends Controller
{
    public function index()
    {
        $services = ServiceFlow::orderBy('order')->get();
        return view('admin.service-flows.index', compact('services'));
    }

    public function create()
    {
        return view('admin.service-flows.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_slug' => 'required|string|max:255|unique:service_flows',
            'service_description' => 'required|string',
            'steps' => 'required|array',
            'steps.*.title' => 'required|string',
            'steps.*.description' => 'required|string',
            'steps.*.documents' => 'nullable|array',
            'steps.*.duration' => 'nullable|string',
            'steps.*.fee' => 'nullable|string',
            'steps.*.download_link' => 'nullable|url',
            'notes' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        ServiceFlow::create($validated);

        return redirect()->route('admin.service-flows.index')
            ->with('success', 'Service flow created successfully.');
    }
    public function edit(ServiceFlow $serviceFlow)
    {
        return view('admin.service-flows.edit', compact('serviceFlow'));
    }

    public function update(Request $request, ServiceFlow $serviceFlow)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'service_slug' => 'required|string|max:255|unique:service_flows,service_slug,'.$serviceFlow->id,
            'service_description' => 'required|string',
            'steps' => 'required|array',
            'steps.*.title' => 'required|string',
            'steps.*.description' => 'required|string',
            'steps.*.documents' => 'nullable|array',
            'steps.*.duration' => 'nullable|string',
            'steps.*.fee' => 'nullable|string',
            'steps.*.download_link' => 'nullable|url',
            'notes' => 'nullable|array',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean'
        ]);

        $serviceFlow->update($validated);

        return redirect()->route('admin.service-flows.index')
            ->with('success', 'Service flow updated successfully.');
    }

    public function destroy(ServiceFlow $serviceFlow)
    {
        $serviceFlow->delete();
        return redirect()->route('admin.service-flows.index')
            ->with('success', 'Service flow deleted successfully.');
    }
}