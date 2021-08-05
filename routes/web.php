<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('posts', [
        'posts' => Post::latest()->get()
    ]);
});

//route model binding giving same name to the wild card and to the function
Route::get('posts/{post:slug}', function (Post $post) {
//    $post = Post::findOrFail($id);
    return view('post',[
        'post' => $post
    ]);
});


//load all posts for given category
Route::get('categories/{category:slug}',function(Category $category){
return view('posts', [
    'posts' => $category->posts
]);
});

//load all posts for given author
Route::get('authors/{author:username}',function(User $author){
//    ddd($author);
    return view('posts', [
        'posts' => $author->posts
    ]);
});
