<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    // Admin methods
    public function index()
    {
        $rules = Rule::latest()->paginate(10);
        return view('admin.rules.index', compact('rules'));
    }

    public function create()
    {
        return view('admin.rules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:5120',
            'order' => 'nullable|integer',
        ]);

        $file = $request->file('file');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move('uploads/rules', $filename);

        Rule::create([
            'title' => $request->title,
            'file_path' => 'uploads/rules/'.$filename,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.rules.index')->with('success', 'Rule added successfully.');
    }

    public function edit(Rule $rule)
    {
        return view('admin.rules.edit', compact('rule'));
    }

    public function update(Request $request, Rule $rule)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
            'order' => 'nullable|integer',
        ]);

        $data = [
            'title' => $request->title,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ];

        if ($request->hasFile('file')) {
            // Delete old file
            if ($rule->file_path && file_exists($rule->file_path)) {
                unlink($rule->file_path);
            }

            $file = $request->file('file');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move('uploads/rules', $filename);
            $data['file_path'] = 'uploads/rules/'.$filename;
        }

        $rule->update($data);

        return redirect()->route('admin.rules.index')->with('success', 'Rule updated successfully.');
    }

    public function destroy(Rule $rule)
    {
        // Delete file
        if ($rule->file_path && file_exists($rule->file_path)) {
            unlink($rule->file_path);
        }

        $rule->delete();

        return redirect()->route('admin.rules.index')->with('success', 'Rule deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $rules = Rule::active()->ordered()->get();
        return view('rules', compact('rules'));
    }
}