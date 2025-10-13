<?php

namespace App\Http\Controllers;

use App\Models\Login;
use Illuminate\Http\Request;

class loginController extends Controller
{
    //
    public function login()
    {
        $viewData = [];
        $viewData["user"] = Login::all();
        return view('home.login')->with("viewData", $viewData);
    }
}
