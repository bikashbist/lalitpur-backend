<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use Illuminate\Support\Facades\File;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->get();
        return view('admin.pages.location.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.pages.location.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_category' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'map' => 'nullable|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Changed to required
        ]);
        
        // Standardized image upload
        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/locations', $filename);
        
        Location::create([
            'location_category' => $request->location_category,
            'contact_name' => $request->contact_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'map' => $request->map,
            'image' => 'uploads/locations/' . $filename,
        ]);

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('admin.pages.location.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'location_category' => 'required|string|max:255',
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'address' => 'required|string',
            'map' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($location->image && File::exists(public_path($location->image))) {
                File::delete(public_path($location->image));
            }
            
            // Standardized image upload
            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/locations', $filename);
            $location->image = 'uploads/locations/' . $filename;
        }

        $location->update([
            'location_category' => $request->location_category,
            'contact_name' => $request->contact_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'map' => $request->map,
            // image is handled separately above
        ]);

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        if ($location->image && File::exists(public_path($location->image))) {
            File::delete(public_path($location->image));
        }
        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}