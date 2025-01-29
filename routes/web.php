<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\BlogsControllerNew;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Event\Code\Test;

// Route::get('/', function () {
//     return view('logon');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');

Route::fallback(function() {
    return response("
        <html>
            <head>
                <title>Womp womp~ page gone!</title>
                <style>
                    body {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                        text-align: center;
                    }
                    img {
                        max-width: 300px;
                        height: auto;
                        margin-bottom: 20px;
                    }
                </style>
            </head>
            <body>
                <div>
                    <h1>The page you have requested is missing! Try checking under the couch next time!</h1>
                    <img src='" . asset('images/missing page ni isaq.jpg') . "' alt='Image Missing'>
                </div>
            </body>
        </html>
    ", 404);
});


Route::group(['prefix' => 'admin'], function(){
    // Route::get('home', function() {
    //     return "Sample Home Page";
    // });


    Route::get('user/{id}/{name}', function($id, $name) {
        return "<a href=' ".route("settingsPage",['id' => $id, 'name' => $name])." '>"."About</a>";
    });

    // Route::get('about', function() {
    //     return "About Page";
    // })->name("aboutPage");

    Route::get('settings/{id}/{name}', function($id, $name) {
        return $id . " " . $name;
    })->name("settingsPage");

    Route::get('sample', function(){
        return view('layout.master');
    })->name('hello');

    Route::get('activity2', function(){
        return view('layout.activity2');
    })->name('act2');


    // Route::get('home', function(){
    //     $home = 'This home page';
    //     return view ('common.home', compact('home'));
    // });

    // Route::get('blogs', function(){
    //     $blogs = [
    //         [
    //             'title' => 'Title one',
    //             'body' => 'This is body',
    //             'status' => 0
    //         ],

    //         [
    //             'title' => 'Title two',
    //             'body' => 'This is body',
    //             'status' => 1
    //         ],

    //         [
    //             'title' => 'Title three',
    //             'body' => 'This is body',
    //             'status' => 0
    //         ],

    //         [
    //             'title' => 'Title four',
    //             'body' => 'This is body',
    //             'status' => 1
    //         ],

    //         [
    //             'title' => 'Title five',
    //             'body' => 'This is body',
    //             'status' => 0
    //         ],

    //         [
    //             'title' => 'Title six',
    //             'body' => 'This is body',
    //             'status' => 1
    //         ],

    //         [
    //             'title' => 'Title seven',
    //             'body' => 'This is body',
    //             'status' => 0
    //         ]
    //         ];
    //     return view ('common.blogs', compact('blogs'));
    // });

    Route::get('contacts', function(){
        $contacts = 'This contacts page';
        return view ('common.contacts', compact('contacts'));
    });

    Route::get('about', function(){
        $about = 'This about page';
        $test = 'test ni isaq';
        //return view('common.about', ['about' => $about]);
        return view ('common.about', compact('about', 'test'));
    });

    Route::get('home', function(){
        return view ('common.home');
    });
    // Route::get('login', function(){
    //     $login = 'This login page';
    //     return view ('common.login', compact('login'));
    // });
    
    // Route::get('login', [LoginController::class, 'index']) -> name('login');

    // //Route::get('blogs', [BlogsController::class, 'index']);

    // Route::post('/login', [LoginController::class, 'loginSubmit']) -> name('login.submit');

    //Route::resources('home', [HomeController::class]);

    //CRUD Database

    //Route::get('blogs', [BlogsController::class, 'index']);

    Route::get('get-blogs', [BlogsController::class, 'getBlogsData']);

    Route::get('insert-blogs', [BlogsController::class, 'insertBlogsData']);

    Route::get('update-blogs', [BlogsController::class, 'updateBlogsData']);

    Route::get('delete-blogs', [BlogsController::class, 'deleteBlogsData']);

    Route::get('retrieve-blogs', [BlogsController::class, 'retrieveBlogsPerCat']);

    Route::get('blogs-model', [BlogsController::class, 'getBlogsModel']);

    Route::get('insert-blog-model', [BlogsController::class, 'insertUsingModel']);

    //Route::get('/blogs/{id}/{title}', [BlogsController::class, 'modelSamples']);

    // Route::get('blogs', [BlogsControllerNew::class, 'createBlogs'])->name('blogs.index');

    // Route::get('/blogs/create', [BlogsControllerNew::class, 'create'])->name('blogs.create');

    // Route::post('/blogs/store', [BlogsControllerNew::class, 'store'])->name('blogs.store');

    // Route::get('/data', [BlogsControllerNew::class, 'data']);

});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'registerPost'])->name('register');
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'loginSubmit'])->name('login.submit');

    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'loginSubmit'])->name('login.submit');
});

Route::group(['middleware' => 'custom.auth'], function(){
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

});

Route::group(['middleware' => 'custom.auth'], function() {
    Route::get('blogs', [BlogsControllerNew::class, 'createBlogs'])->name('blogs.index');
    Route::get('/blogs/create', [BlogsControllerNew::class, 'create'])->name('blogs.create');
    Route::post('/blogs/store', [BlogsControllerNew::class, 'store'])->name('blogs.store');
    Route::get('/data', [BlogsControllerNew::class, 'data']);
});