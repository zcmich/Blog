<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post
{

    public static function all()
    {
        $files = File::files(resource_path("posts/"));
        $array_map = [];
        foreach ($files as $key => $file) $array_map[$key] = $file->getContents();
        $files = $array_map;
       return $files;

    }

    public static function find($slug)
    {
        if(!file_exists($path = resource_path( "posts/{$slug}.html")
        )){
            // abort(404);
            throw  new ModelNotFoundException();
    }
//          return $path;
        return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
            return file_get_contents($path);
        });


    }

}
