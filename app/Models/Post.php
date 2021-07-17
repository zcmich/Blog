<?php


namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug =$slug;
    }

    public static function all()
    {
        return cache()->rememberForever('posts.all',function(){
            return collect(File::files(resource_path("posts")))
                ->map(function ($file) {
                    return YamlFrontMatter::parseFile($file);
                })
                ->map(function ($document){
                    return new Post(
                        $document->title,
                        $document->excerpt,
                        $document->date,
                        $document->body(),
                        $document->slug
                    );
                })->sortByDesc(('date'));
        });



//    $posts = collect($files)->map(function ($file){
//        $document = YamlFrontMatter::parseFile($file);
//        return new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $document->slug
//        );
//    });

//    $posts = array_map(function ($file){
//        $document = YamlFrontMatter::parseFile($file);
//        return new Post(
//            $document->title,
//            $document->excerpt,
//            $document->date,
//            $document->body(),
//            $document->slug
//        );
//
//    },$files);



    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug',$slug);

//        ddd($posts->firstWhere('slug', $slug));

//        if(!file_exists($path = resource_path( "posts/{$slug}.html")
//        )){
//            // abort(404);
//            throw  new ModelNotFoundException();
//    }
////          return $path;
//        return cache()->remember("posts.{$slug}", 1200, function () use ($path) {
//            return file_get_contents($path);
//        });


    }

}
