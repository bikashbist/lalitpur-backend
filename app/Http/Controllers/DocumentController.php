<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Display all documents
    public function index()
    {
        $documents = Document::all();
        return view('admin.pages.documents.index', compact('documents'));
    }

    // Show form for creating a new document
    public function create()
    {
        return view('admin.pages.documents.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'name_np' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $imagePath = null;
        $pdfPath = null;

        // Upload image if exists
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/documents', $imageName);
            $imagePath = 'uploads/documents/' . $imageName;
        }

        // Upload PDF if exists
        if ($request->hasFile('pdf')) {
            $pdfName = time() . '_doc.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->move('uploads/documents', $pdfName);
            $pdfPath = 'uploads/documents/' . $pdfName;
        }

        // Create document
        Document::create([
            'name_en' => $request->name_en,
            'name_np' => $request->name_np,
            'image_path' => $imagePath,
            'pdf_path' => $pdfPath,
        ]);

        return redirect()->route('documents.index')->with('success', 'Document created successfully.');
    }



    // Show form for editing a document
    public function edit(Document $document)
    {
        return view('admin.pages.documents.edit', compact('document'));
    }

    // Update an existing document
    public function update(Request $request, Document $document)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'pdf' => 'nullable|mimes:pdf|max:10000',
        ]);

        $updateData = ['name' => $request->name];

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($document->image_path && file_exists(public_path($document->image_path))) {
                unlink(public_path($document->image_path));
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/documents', $imageName);
            $updateData['image_path'] = 'uploads/documents/' . $imageName;
        }

        // Handle PDF upload if new PDF is provided
        if ($request->hasFile('pdf')) {
            // Delete old PDF if exists
            if ($document->pdf_path && file_exists(public_path($document->pdf_path))) {
                unlink(public_path($document->pdf_path));
            }

            $pdfName = time() . '_doc.' . $request->pdf->getClientOriginalExtension();
            $request->pdf->move('uploads/documents', $pdfName);
            $updateData['pdf_path'] = 'uploads/documents/' . $pdfName;
        }

        $document->update($updateData);

        return redirect()->route('documents.index')
                         ->with('success', 'Document updated successfully.');
    }

    // Delete a document and its files
    public function destroy(Document $document)
    {
        // Delete image file if exists
        if ($document->image_path && file_exists(public_path($document->image_path))) {
            unlink(public_path($document->image_path));
        }

        // Delete PDF file if exists
        if ($document->pdf_path && file_exists(public_path($document->pdf_path))) {
            unlink(public_path($document->pdf_path));
        }

        $document->delete();

        return redirect()->route('documents.index')
                         ->with('success', 'Document deleted successfully.');
    }
}
