<?php
namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Team;
use App\Category;


class TeamComposer
{





public function __construct(){


}

public function compose(View $view){

    $category=Category::pluck('type','id');
    $teams=Team::pluck('team','id');
    $view->with(['teams'=>$teams,'type'=>$category]);
}


}


