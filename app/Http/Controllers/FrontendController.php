<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Project;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function home()
    {
        $latestBlogs = Blog::latest()->take(3)->get();
        $projects = Project::orderBy('id', 'desc')->get();
        return view('frontend.pages.app', compact('projects', 'latestBlogs'));
    }

    public function blogs(Request $request)
    {
        $latestBlogs = Blog::latest()->take(2)->get();

        if($request->search){
            $blogs = Blog::where('title', 'like', '%'.$request->search.'%')
                    ->orWhere('content', 'like', '%'.$request->search.'%')->latest()->paginate(4);
        } elseif ($request->category){
            $blogs = Category::where('name', $request->category)->firstOrFail()->blog()->paginate(4)->withQueryString();
        } elseif ($request->author){
            $blogs = User::where('id', $request->author)->firstOrFail()->blogs()->paginate(4)->withQueryString();
        }
        else {
            $blogs = Blog::latest()->get();
        }

        $category = $request->category;
        $categories = Category::all();

        return view('frontend.pages.blogs-page', compact('blogs', 'categories', 'latestBlogs', 'category'));
    }

    public function blogDetail($id)
    {
        $blog = Blog::findOrFail($id);
        $category = $blog->category;

        $relatedBlogs = $category->blog()->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('frontend.pages.blog-detail', compact('blog', 'relatedBlogs'));
    }

}
