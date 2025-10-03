<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProducController extends Controller
{
    public static $product = [
        ["id"=>'1' , "name" => "TV" , "description" => "Best TV" , "image" => "game.png" , "price" => "1000"],
        ["id"=>'1' , "name" => "TV" , "description" => "Best TV" , "image" => "game.png" , "price" => "1000"],
        ["id"=>'1' , "name" => "TV" , "description" => "Best TV" , "image" => "game.png" , "price" => "1000"],
        ["id"=>'1' , "name" => "TV" , "description" => "Best TV" , "image" => "game.png" , "price" => "1000"]
    ];
    public function index(){
        $viewData = [];
        $viewData["title"] = "Product - Online Store";
        $viewData["subtitle"] = "list of products";
        $viewData["product"] = ProducController::$product;
        return view("product.index") -> with("viewData" , $viewData); 
    }
    public function show($id){
        $viewData = [];
        $product = ProducController::$product[$id - 1];
        $viewData["title"] = $product['name'] . " - Online Store";
        $viewData["subtitle"] = $product["name"] . " - Product Information";
        $viewData["product"] = $product;
        return view('product.show') -> with("viewData" , $viewData);
    }

}
