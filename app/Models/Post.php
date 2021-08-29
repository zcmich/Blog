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

    protected  $guarded = [];

    protected $with =['category','author'];

    protected function scopeFilter($query,array $filters)
        //not fully understood array of filter tom get value from request
    {
       $query->when( $filters['search'] ?? false,function ($query,$search) //nullsafe operator
       {
           $query
               ->where('title','like', '%' . $search . '%')
               ->orwhere('body','like', '%' . $search . '%');
       });

    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(user::class,'user_id');
    }
}
