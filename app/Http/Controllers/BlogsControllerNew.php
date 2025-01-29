<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogsControllerNew extends Controller
{
    // public function data()
    // {
    //     $blogs = Blog::with('category')->get();

    //     return $blogs;
    // }

    public function data()
    {
        // Retrieve all categories with their related blogs
        $categories = Category::with('blogs')->get();

        // Retrieve a specific category with ID 2 and its related blogs
        $categories = Category::with('blogs')->find(2);

        return $categories;
    }

    public function index()
    {
        $categories = Category::all();
        $blogs = Blog::orderBy('created_at', 'desc')->with('category')->get();
        return view('common.create-blogs', compact('categories', 'blogs'));
    }

    public function createBlogs()
    {
        $blogs = Blog::with('category')->get();
        $categories = Category::all(); // Assuming you have a Category model
        return view('common.create-blogs', compact('blogs', 'categories'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'category_id' => 'required|exists:categories,id',
    //     ]);

    //     Blog::create([
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'category_id' => $request->category_id,
    //     ]);

    //     return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    // }

    public function store(Request $request)
    {
        $result = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'category_id' => $request->input('category_id'),
            'author_id' => 1,
        ];

        $blog = Blog::create($result);

        $data = Blog::with('category')->find($blog->id);

        return response()->json([
            'message' => 'Blog created successfully!',
            'data' => $data,
        ]);
    }
}
