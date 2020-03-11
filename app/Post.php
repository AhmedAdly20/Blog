<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;
use App\User;
use App\Comment;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title','description','content','image','category_id','user_id','views'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function hasTag($tagID){
        return in_array($tagID,$this->tags->pluck('id')->toArray());
    }
}
