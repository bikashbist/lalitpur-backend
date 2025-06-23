<?php

namespace App\Http\Controllers;

use App\Models\OfficeChief;
use Illuminate\Http\Request;

class OfficeChiefController extends Controller
{
    public function index()
    {
        $chiefs = OfficeChief::latest()->paginate(10);
        return view('admin.office-chiefs.index', compact('chiefs'));
    }

    public function create()
    {
        return view('admin.office-chiefs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_np' => 'required|string|max:255',
            'office_en' => 'required|string|max:255',
            'office_np' => 'required|string|max:255',
            'message_en' => 'required|string',
            'message_np' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/chiefs', $filename);

        OfficeChief::create([
            'name_en' => $request->name_en,
            'name_np' => $request->name_np,
            'position_en' => $request->position_en,
            'position_np' => $request->position_np,
            'office_en' => $request->office_en,
            'office_np' => $request->office_np,
            'message_en' => $request->message_en,
            'message_np' => $request->message_np,
            'image' => 'uploads/chiefs/' . $filename,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.office-chiefs.index')->with('success', 'Office chief added successfully.');
    }

    public function edit(OfficeChief $officeChief)
    {
        return view('admin.office-chiefs.edit', compact('officeChief'));
    }

    public function update(Request $request, OfficeChief $officeChief)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_np' => 'required|string|max:255',
            'office_en' => 'required|string|max:255',
            'office_np' => 'required|string|max:255',
            'message_en' => 'required|string',
            'message_np' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'name_en' => $request->name_en,
            'name_np' => $request->name_np,
            'position_en' => $request->position_en,
            'position_np' => $request->position_np,
            'office_en' => $request->office_en,
            'office_np' => $request->office_np,
            'message_en' => $request->message_en,
            'message_np' => $request->message_np,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('image')) {
            if ($officeChief->image && file_exists($officeChief->image)) {
                unlink($officeChief->image);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/chiefs', $filename);
            $data['image'] = 'uploads/chiefs/' . $filename;
        }

        $officeChief->update($data);

        return redirect()->route('admin.office-chiefs.index')->with('success', 'Office chief updated successfully.');
    }

    public function destroy(OfficeChief $officeChief)
    {
        if ($officeChief->image && file_exists($officeChief->image)) {
            unlink($officeChief->image);
        }

        $officeChief->delete();

        return redirect()->route('admin.office-chiefs.index')->with('success', 'Office chief deleted successfully.');
    }

    // Optional: frontend display
    public function show()
    {
        $chief = OfficeChief::active()->first();
        return view('office-chief', compact('chief'));
    }
}
