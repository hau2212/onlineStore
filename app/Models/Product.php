<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    #use HasFactory;
##################################____GET____#####################################################
    public function getID(){
        return $this -> attributes['id'];
    }
    public function getName(){
        return $this -> attributes['name'];
    }
    public function getDescription(){
        return $this -> attributes['description'];
    }
    public function getImage(){
        return $this -> attributes['image'];
    }
    public function getPrice(){
        return $this -> attributes['price'];
    }
    public function getCreatedAt(){
        return $this -> attributes['created_at'];
    }
    public function getUpdateAt(){
        return $this -> attributes['update_at'];
    }
##################################___SET___#####################################################
    public function setID($id){
        $this -> attributes['id'] = $id;
    }
    public function setName($name){
         $this -> attributes['name'] = $name;
    }
    public function setDescription($description){
        $this -> attributes['description'] = $description;
    }
    public function setImage($image){
        $this -> attributes['image'] = $image;
    }
    public function setPrice($price){
        $this -> attributes['price'] = $price;
    }
    public function setCreatedAt($created_at){
        $this -> attributes['created_at'] = $created_at;
    }
    public function setUpdateAt($update_at){
        $this -> attributes['update_at'] = $update_at;
    }



}
