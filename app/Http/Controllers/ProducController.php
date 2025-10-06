<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProducController extends Controller
{
#    public static $product = [
#        ["id"=>'1' , "name" => "TV" , "description" => "Best TV" , "image" => "game.png" , "price" => "1000"],
#        ["id"=>'2' , "name" => "TV" , "description" => "Best TV" , "image" => "safe.png" , "price" => "1000"],
#        ["id"=>'3' , "name" => "TV" , "description" => "Best TV" , "image" => "submarine.png" , "price" => "1000"],
#        ["id"=>'4' , "name" => "TV" , "description" => "Best TV" , "image" => "fukada.png" , "price" => "1000"]
#    ];
    public function index(){
        $viewData = [];
        $viewData["title"] = "Product - Online Store";
        $viewData["subtitle"] = "list of products";
        $viewData["product"] = Product::all();
        return view("product.index") -> with("viewData" , $viewData); 
    }
    public function show($id){
        $viewData = [];
        $product = Product::findOrFail($id);
        $viewData["title"] = $product -> getName(). "online Store";
        $viewData["subtitle"] = $product -> getName() . " - Product Information";
        $viewData["product"] = $product;
        return view('product.show') -> with("viewData" , $viewData);
    }

}
