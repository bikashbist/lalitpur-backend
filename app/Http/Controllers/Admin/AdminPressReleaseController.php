<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PressRelease;
use Illuminate\Http\Request;

class AdminPressReleaseController extends Controller
{
    public function index()
    {
        $pressReleases = PressRelease::latest()->paginate(10);
        return view('admin.press.index', compact('pressReleases'));
    }

    public function create()
    {
        return view('admin.press.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf|max:4096',
        ]);

        $filePath = null;
        if ($request->hasFile('file_path')) {
            $filename = time() . '.' . $request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move('uploads/press', $filename);
            $filePath = 'uploads/press/' . $filename;
        }

        PressRelease::create([
            'title' => $request->title,
            'date' => $request->date,
            'content' => $request->content,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.press.index')->with('success', 'Press release created successfully.');
    }

    public function edit(PressRelease $press)
    {
        return view('admin.press.edit', compact('press'));
    }

    public function update(Request $request, PressRelease $press)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'content' => 'required|string',
            'file_path' => 'nullable|file|mimes:pdf|max:4096',
        ]);

        $filePath = $press->file_path;

        if ($request->hasFile('file_path')) {
            if ($filePath && file_exists($filePath)) {
                unlink($filePath);
            }
            $filename = time() . '.' . $request->file('file_path')->getClientOriginalExtension();
            $request->file('file_path')->move('uploads/press', $filename);
            $filePath = 'uploads/press/' . $filename;
        }

        $press->update([
            'title' => $request->title,
            'date' => $request->date,
            'content' => $request->content,
            'file_path' => $filePath,
        ]);

        return redirect()->route('admin.press.index')->with('success', 'Press release updated successfully.');
    }

    public function destroy(PressRelease $press)
    {
        if ($press->file_path && file_exists($press->file_path)) {
            unlink($press->file_path);
        }

        $press->delete();
        return redirect()->route('admin.press.index')->with('success', 'Press release deleted.');
    }
}
