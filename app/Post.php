<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    protected $fillable = ['title', 'content','category_id'];

    use Commentable;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function hasAnyCat($categories){
        if ($this->categories()->whereIn('name', $categories)->first()){
            return  true;
        }
        return false;
    }

    public function hasCat($category){
        if ($this->categories()->where('name', $category)->first()){
            return  true;
        }
        return false;
    }
}
