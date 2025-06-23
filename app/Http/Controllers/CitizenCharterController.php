<?php

namespace App\Http\Controllers;

use App\Models\CitizenCharter;
use Illuminate\Http\Request;

class CitizenCharterController extends Controller
{
    // Admin methods
    public function index()
    {
        $charters = CitizenCharter::latest()->paginate(10);
        return view('admin.citizen-charters.index', compact('charters'));
    }

    public function create()
    {
        return view('admin.citizen-charters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'commitments' => 'required|array',
            'commitments.*' => 'required|string',
            'working_days' => 'required|string',
            'working_hours' => 'required|string',
            'services' => 'required|array',
            'services.*.name' => 'required|string',
            'services.*.duration' => 'required|string',
            'services.*.fee' => 'required|string',
        ]);

        CitizenCharter::create([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'commitments' => $request->commitments,
            'working_days' => $request->working_days,
            'working_hours' => $request->working_hours,
            'services' => $request->services,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.citizen-charters.index')->with('success', 'Citizen charter created successfully.');
    }

    public function edit(CitizenCharter $citizenCharter)
    {
        return view('admin.citizen-charters.edit', compact('citizenCharter'));
    }

    public function update(Request $request, CitizenCharter $citizenCharter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'introduction' => 'required|string',
            'commitments' => 'required|array',
            'commitments.*' => 'required|string',
            'working_days' => 'required|string',
            'working_hours' => 'required|string',
            'services' => 'required|array',
            'services.*.name' => 'required|string',
            'services.*.duration' => 'required|string',
            'services.*.fee' => 'required|string',
        ]);

        $citizenCharter->update([
            'title' => $request->title,
            'introduction' => $request->introduction,
            'commitments' => $request->commitments,
            'working_days' => $request->working_days,
            'working_hours' => $request->working_hours,
            'services' => $request->services,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.citizen-charters.index')->with('success', 'Citizen charter updated successfully.');
    }

    public function destroy(CitizenCharter $citizenCharter)
    {
        $citizenCharter->delete();
        return redirect()->route('admin.citizen-charters.index')->with('success', 'Citizen charter deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $charter = CitizenCharter::active()->first();
        return view('citizen-charter', compact('charter'));
    }
}