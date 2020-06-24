<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegularLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:regular');
    }

public function showLoginForm(){

    return view('auth.regular');
}


public function login(){

    
}

}
