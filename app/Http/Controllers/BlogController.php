<?php
// app/Http/Controllers/BlogController.php
namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();
        $categories = Blog::getCategories();
        return view('admin.pages.blog.index', compact('blogs', 'categories'));
    }

    public function create()
    {
        $categories = Blog::getCategories();
        return view('admin.pages.blog.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'sub_title_en' => 'required|string|max:255',
            'sub_title_np' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_np' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_np' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:' . implode(',', array_keys(Blog::getCategories())),
        ]);

        $slug = Str::slug($request->title_en);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }

        $filename = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move('uploads/blogs', $filename);

        Blog::create([
            'sub_title_en' => $request->sub_title_en,
            'sub_title_np' => $request->sub_title_np,
            'title_en' => $request->title_en,
            'title_np' => $request->title_np,
            'description_en' => $request->description_en,
            'description_np' => $request->description_np,
            'image_path' => 'uploads/blogs/' . $filename,
            'slug' => $slug,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'category' => $request->category
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog created successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Blog::getCategories();
        return view('admin.pages.blog.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sub_title_en' => 'required|string|max:255',
            'sub_title_np' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'title_np' => 'required|string|max:255',
            'description_en' => 'required|string',
            'description_np' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:' . implode(',', array_keys(Blog::getCategories())),
        ]);

        $blog = Blog::findOrFail($id);
        $data = [
            'sub_title_en' => $request->sub_title_en,
            'sub_title_np' => $request->sub_title_np,
            'title_en' => $request->title_en,
            'title_np' => $request->title_np,
            'description_en' => $request->description_en,
            'description_np' => $request->description_np,
            'is_active' => $request->has('is_active') ? 1 : 0,
            'category' => $request->category
        ];

        if ($blog->title_en !== $request->title_en) {
            $slug = Str::slug($request->title_en);
            $originalSlug = $slug;
            $counter = 1;
            
            while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
            $data['slug'] = $slug;
        }

        if ($request->hasFile('image')) {
            if ($blog->image_path && file_exists($blog->image_path)) {
                unlink($blog->image_path);
            }

            $filename = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('uploads/blogs', $filename);
            $data['image_path'] = 'uploads/blogs/' . $filename;
        }

        $blog->update($data);

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        if ($blog->image_path && file_exists($blog->image_path)) {
            unlink($blog->image_path);
        }
        
        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog deleted successfully!');
    }
}