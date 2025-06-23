<?php

namespace App\Http\Controllers;

use App\Models\ContactInfo;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contactInfo = ContactInfo::first();
        return view('admin.pages.contact-info.index', compact('contactInfo'));
    }

    public function create()
    {
        return view('admin.pages.contact-info.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Standardized image upload
        $filename = time() . '.' . $request->logo->getClientOriginalExtension();
        $request->logo->move('uploads/contact_info', $filename);

        ContactInfo::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'logo' => 'uploads/contact_info/' . $filename,
        ]);

        return redirect()->route('contact-info.index')->with('success', 'Contact Info created successfully.');
    }

    public function edit($id)
    {
        $contactInfo = ContactInfo::findOrFail($id);
        return view('admin.pages.contact-info.edit', compact('contactInfo'));
    }

    public function update(Request $request, ContactInfo $contactInfo)
    {
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($contactInfo->logo && file_exists($contactInfo->logo)) {
                unlink($contactInfo->logo);
            }

            // Standardized image upload
            $filename = time() . '.' . $request->logo->getClientOriginalExtension();
            $request->logo->move('uploads/contact_info', $filename);
            $contactInfo->logo = 'uploads/contact_info/' . $filename;
        }

        $contactInfo->update([
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
        ]);

        return redirect()->route('contact-info.index')->with('success', 'Contact Info updated successfully.');
    }

    public function destroy(ContactInfo $contactInfo)
    {
        if ($contactInfo->logo && file_exists($contactInfo->logo)) {
            unlink($contactInfo->logo);
        }
        $contactInfo->delete();
        return redirect()->route('contact-info.index')->with('success', 'Contact Info deleted successfully.');
    }
}