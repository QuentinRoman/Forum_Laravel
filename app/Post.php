<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Post extends Model
{
    protected $fillable = ['title', 'content'];

    use Commentable;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

}
