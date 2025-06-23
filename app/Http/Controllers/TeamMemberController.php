<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;

class TeamMemberController extends Controller
{
    // Admin index
    public function index()
    {
        $members = TeamMember::latest()->paginate(10);
        return view('admin.team-members.index', compact('members'));
    }

    // Admin create form
    public function create()
    {
        return view('admin.team-members.create');
    }

    // Store data
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_np' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/team', $filename);

        TeamMember::create([
            'name_en' => $request->name_en,
            'name_np' => $request->name_np,
            'position_en' => $request->position_en,
            'position_np' => $request->position_np,
            'image' => 'uploads/team/' . $filename,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.team-members.index')->with('success', 'Team member added successfully.');
    }

    // Edit page
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    // Update data
    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_np' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'name_en' => $request->name_en,
            'name_np' => $request->name_np,
            'position_en' => $request->position_en,
            'position_np' => $request->position_np,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('image')) {
            if ($teamMember->image && file_exists($teamMember->image)) {
                unlink($teamMember->image);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/team', $filename);
            $data['image'] = 'uploads/team/' . $filename;
        }

        $teamMember->update($data);

        return redirect()->route('admin.team-members.index')->with('success', 'Team member updated successfully.');
    }

    // Delete
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image && file_exists($teamMember->image)) {
            unlink($teamMember->image);
        }

        $teamMember->delete();

        return redirect()->route('admin.team-members.index')->with('success', 'Team member deleted successfully.');
    }

    // Frontend display
    public function team()
    {
        $members = TeamMember::active()->ordered()->get();
        return view('frontend.team', compact('members'));
    }
}
