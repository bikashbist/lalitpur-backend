<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->get();
        return view('admin.pages.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.pages.team.create');
    }

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


    public function edit(Team $team)
    {
        return view('admin.pages.team.edit', compact('team'));
    }

  

    public function destroy(Team $team)
    {
        if ($team->image && File::exists(public_path($team->image))) {
            File::delete(public_path($team->image));
        }
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team member deleted successfully.');
    }
}