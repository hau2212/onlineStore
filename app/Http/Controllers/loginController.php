<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function login()
    {
        $viewData = [];
        $viewData["title"] = " Login Page ";
        return view('home.login')->with("viewData", $viewData);
    }
}
