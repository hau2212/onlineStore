<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Login;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    public function index(){
        $viewData = [];
        $product = Product::all();
        $viewData['title'] = "Admin Page - Admin - Online Store";
        $viewData['user'] = Login::all() ;
        $viewData['product'] = $product ;

        return view('admin.home.index')->with('viewData' , $viewData);
    }

    
    
}
