<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamLalitpurMember;
use Illuminate\Http\Request;

class TeamLalitpurController extends Controller
{
    /**
     * Display a listing of team members
     */
    public function index()
    {
        $members = TeamLalitpurMember::orderBy('order')->get();
        return view('admin.team-lalitpur.index', compact('members'));
    }

    /**
     * Show the form for creating a new team member
     */
    public function create()
    {
        return view('admin.team-lalitpur.create');
    }

    /**
     * Store a newly created team member
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_np' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'is_spokesperson' => 'sometimes|boolean',
            'order' => 'required|integer'
        ]);

        try {
            // Create upload directory if it doesn't exist
            $uploadPath = public_path('uploads/team-lalitpur');
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }

            // Handle file upload
            $filename = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move($uploadPath, $filename);

            TeamLalitpurMember::create([
                'name_en' => $request->name_en,
                'name_np' => $request->name_np,
                'position_en' => $request->position_en,
                'position_np' => $request->position_np,
                'phone' => $request->phone,
                'email' => $request->email,
                'image_path' => 'uploads/team-lalitpur/'.$filename,
                'is_spokesperson' => $request->boolean('is_spokesperson'),
                'order' => $request->order
            ]);

            return redirect()->route('admin.team-lalitpur-members.index')
                   ->with('success', 'Team member added successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                   ->with('error', 'Error creating member: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified team member
     */
    public function edit(TeamLalitpurMember $team_lalitpur_member)
    {
        return view('admin.team-lalitpur.edit', compact('team_lalitpur_member'));
    }

    /**
     * Update the specified team member
     */
    public function update(Request $request, TeamLalitpurMember $team_lalitpur_member)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'position_en' => 'required|string|max:255',
            'position_np' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_spokesperson' => 'sometimes|boolean',
            'order' => 'required|integer'
        ]);

        try {
            $data = [
                'name_en' => $request->name_en,
                'name_np' => $request->name_np,
                'position_en' => $request->position_en,
                'position_np' => $request->position_np,
                'phone' => $request->phone,
                'email' => $request->email,
                'is_spokesperson' => $request->boolean('is_spokesperson'),
                'order' => $request->order
            ];

            if ($request->hasFile('image')) {
                // Delete old image
                if (file_exists(public_path($team_lalitpur_member->image_path))) {
                    unlink(public_path($team_lalitpur_member->image_path));
                }

                // Upload new image
                $uploadPath = public_path('uploads/team-lalitpur');
                $filename = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move($uploadPath, $filename);
                $data['image_path'] = 'uploads/team-lalitpur/'.$filename;
            }

            $team_lalitpur_member->update($data);

            return redirect()->route('admin.team-lalitpur-members.index')
                   ->with('success', 'Team member updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()
                   ->with('error', 'Error updating member: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified team member
     */
    public function destroy(TeamLalitpurMember $team_lalitpur_member)
    {
        try {
            // Delete image
            if (file_exists(public_path($team_lalitpur_member->image_path))) {
                unlink(public_path($team_lalitpur_member->image_path));
            }
            
            // Delete record
            $team_lalitpur_member->delete();

            return redirect()->route('admin.team-lalitpur-members.index')
                   ->with('success', 'Team member deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error deleting member: ' . $e->getMessage());
        }
    }
}