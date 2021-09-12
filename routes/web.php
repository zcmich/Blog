<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

//route model binding giving same name to the wild card and to the function
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('register',[RegisterController::class,'create']);
Route::post('register',[RegisterController::class,'store']);


//load all posts for given category
//Route::get('categories/{category:slug}',function(Category $category){
//    return view('posts', [
//        'posts' => $category->posts,
//        'currentCategory' => $category,
//        'categories' => Category::all()
//    ]);
//})->name('category');

//load all posts for given author
//Route::get('authors/{author:username}',function(User $author){
////    ddd($author);
//    return view('posts.index', [
//        'posts' => $author->posts,
////        'categories' => Category::all()    //now passed in the CategoryDropdown component
//    ]);
//});
