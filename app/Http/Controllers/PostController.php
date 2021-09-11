<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
   public function index()
   {
//       die('hello');


//    @dd(request('search'));
       return view('posts.index', [
           'posts' => Post::latest()->filter(request(['search','category','author']))->get()
//           'categories' => Category::all(), now passed in the CategoryDropdown
       ]);
   }

   public function show(Post $post)
   {
       //    $post = Post::findOrFail($id);
    return view('posts.show',[
        'post' => $post
    ]);
   }

//   protected function getPosts()
//   {
//       return Post::latest()->filter()->get();
////       $posts = Post::latest();
//
////       if(request('search')){
////           $posts
////               ->where('title','like', '%' . request('search') . '%')
////               ->orwhere('body','like', '%' . request('search') . '%');
////       }
////
////       return $posts->get();
//   }

}
