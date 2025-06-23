<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\AboutUsGroup;

class AboutUsController extends Controller
{
    public function index()
    {
        $groups = AboutUsGroup::with('aboutUsEntries')->get();
        return view('admin.pages.about-us.index', compact('groups'));
    }
    
    public function create()
    {
        return view('admin.pages.about-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title.*' => 'required|string|max:255',
            'description.*' => 'required|string',
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $group = AboutUsGroup::create();

        foreach ($request->title as $index => $title) {
            $description = $request->description[$index];
            
            $image = $request->file("image.$index");
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/about', $filename);
            
            AboutUs::create([
                'about_us_group_id' => $group->id,
                'title' => $title,
                'description' => $description,
                'image' => 'uploads/about/' . $filename,
            ]);
        }

        return redirect()->route('about-us.index')->with('success', 'About Us entries created successfully.');
    }

    public function edit($groupId)
    {
        $group = AboutUsGroup::with('aboutUsEntries')->findOrFail($groupId);
        return view('admin.pages.about-us.edit', compact('group'));
    }

    public function update(Request $request, $groupId)
    {
        $request->validate([
            'title.*' => 'required|string|max:255',
            'description.*' => 'required|string',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $group = AboutUsGroup::findOrFail($groupId);
        $existingEntryIds = $request->entry_ids ?? [];
    
        // Delete entries not in submission
        foreach ($group->aboutUsEntries as $entry) {
            if (!in_array($entry->id, $existingEntryIds)) {
                if ($entry->image && file_exists($entry->image)) {
                    unlink($entry->image);
                }
                $entry->delete();
            }
        }
    
        // Update or create entries
        foreach ($request->title as $index => $title) {
            $description = $request->description[$index];
            $entryId = $request->entry_ids[$index] ?? null;
    
            if ($entryId) {
                // Update existing entry
                $entry = AboutUs::find($entryId);
                if (!$entry) continue;
    
                $entry->title = $title;
                $entry->description = $description;
    
                if ($request->hasFile("image.$index")) {
                    // Delete old image
                    if ($entry->image && file_exists($entry->image)) {
                        unlink($entry->image);
                    }
    
                    // Standardized image upload
                    $image = $request->file("image.$index");
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads/about', $filename);
                    $entry->image = 'uploads/about/' . $filename;
                }
    
                $entry->save();
            } else {
                // Create new entry
                if ($request->hasFile("image.$index")) {
                    $image = $request->file("image.$index");
                    $filename = time() . '.' . $image->getClientOriginalExtension();
                    $image->move('uploads/about', $filename);
                    $imagePath = 'uploads/about/' . $filename;
                } else {
                    $imagePath = null;
                }
    
                AboutUs::create([
                    'about_us_group_id' => $group->id,
                    'title' => $title,
                    'description' => $description,
                    'image' => $imagePath,
                ]);
            }
        }
    
        return redirect()->route('about-us.index')->with('success', 'About Us entries updated successfully.');
    }

    public function destroy($groupId)
    {
        $group = AboutUsGroup::with('aboutUsEntries')->findOrFail($groupId);

        // Delete all related entries and images
        foreach ($group->aboutUsEntries as $entry) {
            if ($entry->image && file_exists($entry->image)) {
                unlink($entry->image);
            }
            $entry->delete();
        }

        // Delete the group itself
        $group->delete();

        return redirect()->route('about-us.index')->with('success', 'About Us group deleted successfully.');
    }
}