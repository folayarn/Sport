<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;


class Post extends Model{




    protected $fillable=['*'];

    public function views(){

        return $this->morphMany(\App\View::class,'viewable');
    }

    public function getViewsCount(){

        return $this->views()->count();
    }

    public function user(){

        return $this->belongsTo(\App\User::class);
    }

    public function category(){

        return $this->belongsTo(\App\Category::class);
    }
    public function team(){

        return $this->belongsTo(\App\Team::class);
    }

}
