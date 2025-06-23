<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalStructure;
use Illuminate\Http\Request;

class OrganizationalStructureController extends Controller
{
    // Admin methods
    public function index()
    {
        $structures = OrganizationalStructure::latest()->paginate(10);
        return view('admin.organizational-structures.index', compact('structures'));
    }

    public function create()
    {
        return view('admin.organizational-structures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'departments' => 'required|array',
            'departments.*' => 'required|string',
        ]);

        $filename = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move('uploads/organizational-structures', $filename);

        OrganizationalStructure::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => 'uploads/organizational-structures/'.$filename,
            'departments' => $request->departments,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.organizational-structures.index')->with('success', 'Organizational structure added successfully.');
    }

    public function edit(OrganizationalStructure $organizationalStructure)
    {
        return view('admin.organizational-structures.edit', compact('organizationalStructure'));
    }

    public function update(Request $request, OrganizationalStructure $organizationalStructure)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'departments' => 'required|array',
            'departments.*' => 'required|string',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'departments' => $request->departments,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('image')) {
            if ($organizationalStructure->image && file_exists($organizationalStructure->image)) {
                unlink($organizationalStructure->image);
            }

            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move('uploads/organizational-structures', $filename);
            $data['image'] = 'uploads/organizational-structures/'.$filename;
        }

        $organizationalStructure->update($data);

        return redirect()->route('admin.organizational-structures.index')->with('success', 'Organizational structure updated successfully.');
    }

    public function destroy(OrganizationalStructure $organizationalStructure)
    {
        if ($organizationalStructure->image && file_exists($organizationalStructure->image)) {
            unlink($organizationalStructure->image);
        }

        $organizationalStructure->delete();

        return redirect()->route('admin.organizational-structures.index')->with('success', 'Organizational structure deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $structure = OrganizationalStructure::active()->first();
        return view('organizational-structure', compact('structure'));
    }
}