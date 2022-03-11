<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('dashboard.blogs.index', compact('blogs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.blogs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $filename = time().'-'.$request->image_path->getClientOriginalName();

        Blog::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->content,
            'image_path' => $filename,
            'author_id' => auth()->user()->id,
            'category_id' => $request->category_id
        ]);

        $request->image_path->storeAs('images/blogs', $filename);

        return back()->with('success', 'Blog Created Successfully');
    }

    public function show(Blog $blog)
    {
        $category = $blog->category;
        $relatedBlogs = $category->blog()->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('frontend.pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

    public function edit(Blog $blog)
    {
        if(auth()->user()->id !== $blog->user->id){
            abort(403);
        }

        $categories = Category::all();
        return view('dashboard.blogs.edit', compact('blog', 'categories'));
    }

    public function update(Request $request, Blog $blog)
    {
        if(auth()->user()->id !== $blog->user->id){
            abort(403);
        }

        $input = $request->all();

        if($image = $request->file('image_path')) {
            $filename = time().'-'.$request->image_path->getClientOriginalName();
            $request->image_path->storeAs('images/blogs', $filename);
            $input['image_path'] = $filename;
        }else {
            unset($input['image_path']);
        }

        $blog->update($input);

        return redirect()->route('blogs.index')->with('success', 'Blog Updated Successfully');
    }

    public function destroy(Blog $blog)
    {
        if(auth()->user()->id !== $blog->user->id){
            abort(403);
        }

        Storage::delete('frontend/images/blogs/'.$blog->image_path);
        $blog->delete();

        return back()->with('success', 'Blog Deleted Successfully!');
    }
}
