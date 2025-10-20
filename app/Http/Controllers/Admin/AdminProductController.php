<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    //
    public function index(){
        $viewData = [];
        $viewData['title'] = 'admin page - product - online store';
        $viewData['products'] = Product::all();
        return view('admin.products.index') -> with('viewData' , $viewData);

    }

     public function store(Request $request){
        $request -> validate([
            "name"=>"required|max:225",
            "description"=> "required",
            "price"=>"required|numeric|gt:0",
            "image"=>"image",
        ]);
        $newProduct =  new Product();
        $newProduct->setName($request->input('name'));
        $newProduct->setDescription($request->input('description'));
        $newProduct->setPrice($request->input('price'));
        $newProduct->setImage('image.png');
        $newProduct->save();

        #$data = $request->only('name' , 'description' ,'price');
        #$data['image'] = 'fukada.png';
        #Product::create($data);


        if ($request->hasFile('image')) {
        $imageName = $newProduct->getID().".".$request->file('image')->extension();
        # tao ra 
        Storage::disk('public')->put($imageName,file_get_contents($request->file('image')->getRealPath())
        );
        $newProduct->setImage($imageName);
        $newProduct->save();
        }


        return back();
    }

    public function delete($id){
        Product::destroy($id);
        return back();
    }

    public function edit($id){
        $viewData = [];
        $viewData["title"] = "edit page";
        $viewData['product'] = Product::findorfail($id);
        return view('admin.products.edit')->with('viewData',$viewData);
    }
   
    public function update(Request $request ,$id ){
        $request -> validate([
            "name"=>"required|max:225",
            "description"=> "required",
            "price"=>"required|numeric|gt:0",
            "image"=>"image",
        ]);
        $product =  Product::findOrFail($id);
        $product -> setName($request->input('name'));
        $product -> setDescription($request->input('description'));
        $product -> setPrice($request->input('price'));
        #$newProduct->setName($request->input('name'));
        #$newProduct->setDescription($request->input('description'));
        #$newProduct->setPrice($request->input('price'));
        #$newProduct->setImage('image');
        #$newProduct->save();

        #$data = $request->only('name' , 'description' ,'price');
        #$data['image'] = 'fukada.png';
        #$newProduct = Product::create($data);

        
        if ($request->hasFile('image')) {
            $imageName = $product->getID().".".$request->file('image')->extension();
            Storage::disk('public')->put($imageName,
            file_get_contents($request->file('image')->getRealPath())
            );
            $product->setImage($imageName);
        
        }
        else {
            $product -> setImage('khong co');
        }

        $product->save();
        return redirect()->route('admin.products.index');
    }
}
