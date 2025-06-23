<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.pages.certifications.index', compact('certificates'));
    }

    public function create()
    {
        return view('admin.pages.certifications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('uploads/certificate'), $filename);

        Certificate::create([
            'image_name' => $request->image_name,
            'image_path' => 'uploads/certificate/' . $filename,
        ]);

        return redirect()->route('certificate.index')->with('success', 'Certificate added successfully.');
    }

    public function edit($id)
    {
        $certificate = Certificate::findOrFail($id);
        return view('admin.pages.certifications.edit', compact('certificate'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $request->validate([
            'image_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $certificate->image_path;

        if ($request->hasFile('image')) {
            if (file_exists(public_path($certificate->image_path))) {
                unlink(public_path($certificate->image_path));
            }
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads/certificate'), $filename);
            $imagePath = 'uploads/certificate/' . $filename;
        }

        $certificate->update([
            'image_name' => $request->image_name,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        if (file_exists(public_path($certificate->image_path))) {
            unlink(public_path($certificate->image_path));
        }

        $certificate->delete();

        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully.');
    }
}
