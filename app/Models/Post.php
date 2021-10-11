<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'body',
        'category_id',
        'slug'
    ];

//    protected  $guarded = [];

    protected $with =['category','author'];

    protected function scopeFilter($query,array $filters)
        //not fully understood array of filter tom get value from request
    {
       $query->when( $filters['search'] ?? false,fn ($query,$search) =>//nullsafe operator
           $query->where(fn($query) =>
           $query->where('title','like', '%' . $search . '%')
               ->orwhere('body','like', '%' . $search . '%')
           )

       );


        $query->when( $filters['category'] ?? false,fn($query,$category)=>           //nullsafe operator
                    $query->whereHas('category',fn($query)=>
                        $query->where('slug',$category)
                            )
                     );

        $query->when( $filters['author'] ?? false,fn($query,$author)=>           //nullsafe operator
        $query->whereHas('author',fn($query)=>
        $query->where('username',$author)
        )
        );

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
