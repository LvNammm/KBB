<?php

namespace App\Http\Controllers;

use App\Models\Interface_color;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryCtrl extends Controller
{
    public function index(){
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        $categories = Category::orderBy('priority')->get();
        return view("index",["interfaceColor"=>$interfaceColor,"categories"=>$categories]);
    }

    public function showProductByCategory($category){
        $products = null;
        $title = null;
        if($category=="all"){
            $products = Product::where("show_in_web",true)->get();
            $title = "Tất cả sản phẩm";
        }
        else{
            $category = Category::where('link',$category)->first();
            $title = $category->title;
            $products = $category->products()->get();
        }
        $categories = Category::orderBy('priority')->get();
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        return view("list-products-of-category",["products"=>$products,'title'=>$title,"interfaceColor"=>$interfaceColor,"categories"=>$categories]);
    }
    
    public function showsps(){
        $products = null;
        $title = null;
        $products = Product::all();
        $title = "catalogue";
        $categories = Category::orderBy('priority')->get();
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        return view("list-products-of-category",["products"=>$products,'title'=>$title,"interfaceColor"=>$interfaceColor,"categories"=>$categories]);
    }

    
}
