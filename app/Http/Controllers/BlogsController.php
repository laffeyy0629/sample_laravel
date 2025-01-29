<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\MyBlog;
use Illuminate\Container\Attributes\DB as AttributesDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BlogsController extends Controller
{
    public function index()
    {
        // Log::info("==========================> INDEX START");
        // Log::debug("debug");
        // Log::info("info");
        // Log::notice("notice");
        // Log::warning("warning");
        // Log::error("error");
        // Log::critical("critical");
        // Log::alert("alert");
        // Log::emergency("emergency");
    
        // $blogs = [
        //     [
        //         'title' => 'Title one',
        //         'body' => 'This is body',
        //         'status' => 0
        //     ],

        //     [
        //         'title' => 'Title two',
        //         'body' => 'This is body',
        //         'status' => 1
        //     ],

        //     [
        //         'title' => 'Title three',
        //         'body' => 'This is body',
        //         'status' => 0
        //     ],

        //     [
        //         'title' => 'Title four',
        //         'body' => 'This is body',
        //         'status' => 1
        //     ],

        //     [
        //         'title' => 'Title five',
        //         'body' => 'This is body',
        //         'status' => 0
        //     ],

        //     [
        //         'title' => 'Title six',
        //         'body' => 'This is body',
        //         'status' => 1
        //     ],

        //     [
        //         'title' => 'Title seven',
        //         'body' => 'This is body',
        //         'status' => 0
        //     ]
        //     ];
            
            //Log::info("==========================> INDEX END");
        $blogs = Blog::all();
        return view ('common.blogs', compact('blogs'));
    }

    public function getBlogsData()
    {
        //$result = DB::table('blogs')->get();
        //$result = DB::table('blogs')->find(7);
        //SELECT * FROM blogs WHERE id = 7;
        $result = DB::table('blogs')
            //->where('title', '') //first is the column, second is the name inside the column
            //->where('status', '=', 1)
            //->get();    
            ->pluck('title');
        // $result = DB::table('blogs')
        //     ->where('title', '')
        //     ->orwhere('', '')
        //     ->get();

        return $result;
    }

    public function insertBlogsData()
    {
        $result = DB::table('blogs')->insert([
            'title' => 'dinnes',
            'description' => 'matikas',
            'status' => 1
        ]);

        return $result;
    }

    public function updateBlogsData()
    {
        DB::table('blogs')->where('id', 2)->update(['description' => 'SAmple']);
    }

    public function deleteBlogsData()
    {
        DB::table('blogs')->where('id', 13)->delete();
    }

    public function retrieveBlogsPerCat()
    {
        $blogs = DB::table('blogs as a')
        ->select('title', 'description', 'name', 'status')
        ->join('category as b', 'b.id', '=', 'a.category_id')
        ->get();

        //return $result;
        //$blogs = Blog::all();
        return view ('common.blogs', compact('blogs'));
    }

    public function getBlogsModel()
    {
        //$result = Blog::all();
        //$result = MyBlog::all();
        //$result = Blog::find(7); //calls specific column
        //return $result->title;

        //$result = Blog::findOrFail(7);
        $result = Blog::where('status', '1')
        ->get();

        return $result;
    }
    protected $guarded = ['description'];

    public function insertUsingModel()
    {  
        $blog = new Blog();

        // if($status == 0)
        // {
        //     $blog->title = 'Sample1';
        // }
        // else 
        // {
        //     $blog->title = 'Sample2';
        // }

        $blog->title = 'Sample';
        $blog->description = 'Sample';
        $blog->status = '0';
        $blog->category_id = '1';

        $blog->save();
    }

    public function modelSamples($id, $title)
    {
        // return $blog = Blog::all();
        // $blog = Blog::findOrFail($id);
        // $title = $blog->title;
        // $title = "Title: ". $blog->title. " Description: ". $blog->description;
        
        // //SELECT * FROM blogs WHERE status != 1 AND category_id = 2;
        // $blog = Blog::where('status', '!=', '1')
        //             ->orWhere('category_id', '2')
        //             ->get();

        // return $blog;

        $post = new Blog();
        $post->title = 'testtest'; 
        $post->description = 'Description Blog1'; 
        $post->status = 0; 
        $post->category_id = 3; 
        $post->author_id = 1;

        $post->save();
        return $post;
        
    //     $post = Blog::find($id);
    //     $post->title = $title;
    //     $post->save();
    //     return $post;

    //     //Delete
    //     $post = Blog::findOrFail(14)->delete();

    //     echo $post;

    //     $post = Blog::insert([
    //         [
    //             'title' => 'Sample1234',
    //             'description' => 'sampleDesc',
    //             'status' => 0,
    //             'category_id' => 2,
    //             'author_id' => 1,
    //         ],
    //         [
    //             'title' => 'Sample12345',
    //             'description' => 'sampleDesc',
    //             'status' => 0,
    //             'category_id' => 2,
    //             'author_id' => 1,
    //         ],
    //         [
    //             'title' => 'Sample12346',
    //             'description' => 'sampleDesc',
    //             'status' => 0,
    //             'category_id' => 2,
    //             'author_id' => 1,
    //         ]
    //     ]);

    //     $post = Blog::where('status', '!=', 1)
    //     ->where('category_id', 2)
    //     ->update([
    //         'status' => '1'
    //     ]);

    //     return $post;

    //     //Soft Delete
    //     $post = Blog::find($id)->delete();
    //     return $post;

    //     //ALL DATA NOT DELETED
    //     $post = Blog::all();

    //     //ALL DATA REGARDLESS IF DELETED
    //     $post = Blog::withTrashed()->get();

    //     //ALL DATA THAT WAS DELETED
    //     $post = Blog::onlyTrashed()->get();

    //     //To recover
    //     $post = Blog::withTrashed()->find(170)->restore();

    //     //Permanent delete forced
    //     $post = Blog::withTrashed()->find(170)->forcedDelete();
    //     return $post;
    }

    public function createBlogs()
    {
        $blogs = Blog::with('category')->get();
        $categories = Category::all(); // Assuming you have a Category model
        return view('common.create-blogs', compact('blogs', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Blog::create([
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Blog created successfully!');
    }

}

