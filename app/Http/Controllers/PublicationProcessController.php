<?php

namespace App\Http\Controllers;

use App\Models\PublicationProcess;
use Illuminate\Http\Request;

class PublicationProcessController extends Controller
{
    // Admin methods
    public function index()
    {
        $processes = PublicationProcess::latest()->paginate(10);
        return view('admin.publication-processes.index', compact('processes'));
    }

    public function create()
    {
        return view('admin.publication-processes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'page_title' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'section_description' => 'required|string',
            'process_steps.*.title' => 'required|string|max:255',
            'process_steps.*.description' => 'required|string',
            'required_documents.*' => 'required|string',
            'download_links.*.text' => 'required|string|max:255',
            'download_links.*.url' => 'required|url',
            'order' => 'nullable|integer',
        ]);

        PublicationProcess::create([
            'page_title' => $request->page_title,
            'section_title' => $request->section_title,
            'section_description' => $request->section_description,
            'process_steps' => $request->process_steps,
            'required_documents' => $request->required_documents,
            'download_links' => $request->download_links,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.publication-processes.index')
            ->with('success', 'Publication process added successfully.');
    }

    public function edit(PublicationProcess $publicationProcess)
    {
        return view('admin.publication-processes.edit', compact('publicationProcess'));
    }

    public function update(Request $request, PublicationProcess $publicationProcess)
    {
        $request->validate([
            'page_title' => 'required|string|max:255',
            'section_title' => 'required|string|max:255',
            'section_description' => 'required|string',
            'process_steps.*.title' => 'required|string|max:255',
            'process_steps.*.description' => 'required|string',
            'required_documents.*' => 'required|string',
            'download_links.*.text' => 'required|string|max:255',
            'download_links.*.url' => 'required|url',
            'order' => 'nullable|integer',
        ]);

        $publicationProcess->update([
            'page_title' => $request->page_title,
            'section_title' => $request->section_title,
            'section_description' => $request->section_description,
            'process_steps' => $request->process_steps,
            'required_documents' => $request->required_documents,
            'download_links' => $request->download_links,
            'order' => $request->order ?? 0,
            'status' => $request->has('status'),
        ]);

        return redirect()->route('admin.publication-processes.index')
            ->with('success', 'Publication process updated successfully.');
    }

    public function destroy(PublicationProcess $publicationProcess)
    {
        $publicationProcess->delete();
        return redirect()->route('admin.publication-processes.index')
            ->with('success', 'Publication process deleted successfully.');
    }

    // Frontend display
    public function show()
    {
        $process = PublicationProcess::active()->ordered()->first();
        return view('users.publication-process', compact('process'));
    }
}