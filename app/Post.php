<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';
    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function categories(){
        return $this->belongsToMany('App\Category');
    }

    public function hasAnyRoles($categories){
        if ($this->categories()->whereIn('name', $categories)->first()){
            return  true;
        }
        return false;
    }

    public function hasRole($category){
        if ($this->categories()->where('name', $category)->first()){
            return  true;
        }
        return false;
    }
}
