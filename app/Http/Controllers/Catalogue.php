<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Interface_color;

class Catalogue extends Controller
{
    public function index(){
        $products= Product::where("show_in_catgolue",true)->get();
        $title = null;
        $title = "catalogue";
        $categories = Category::orderBy('priority')->get();
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        return view("list-products-of-catalogue",["products"=>$products,'title'=>$title,"interfaceColor"=>$interfaceColor,"categories"=>$categories]);
    }

    public function viewProductCatalogue($link){
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        $categories = Category::orderBy('priority')->get();
        $product = Product::where('link',$link)->first();
        $product = $this->classify($product);
        $types = $product->type()->get();
        for($i=0;$i<count($types);$i++){
            $types[$i]->_less200 =$this->formatVND($types[$i]->_less200);
            // $types[$i]->_50to200 = $this->formatVND($types[$i]->_50to200);
            // $types[$i]->_200to500 = $this->formatVND($types[$i]->_200to500);
            $types[$i]->_200to1000 = $this->formatVND($types[$i]->_200to1000);
            $types[$i]->_more1000 = $this->formatVND($types[$i]->_more1000);
        }
        
        return view("product_catalogue",["interfaceColor"=>$interfaceColor,"categories"=>$categories,"product"=>$product,"types"=>$types]);
    }

    private function classify($product){
       
        $classify = explode(",", $product->classify);
        for($i=0;$i<count($classify);$i++){
            $classify[$i] = explode("+",$classify[$i]);
            $classify[$i][1] = $this->formatVND($classify[$i][1]);
        }
        $product->classify = $classify;
        return $product;
    }

    private function formatVND($s){
        $s = (String) $s;
        $a = array();
        $w = '';
        for($i=strlen($s)-1;$i>=0;$i--){
            $w=$s[$i].$w;
            if(strlen($w)==3 && $i!=0){
                array_push($a, $w);
                $w = '';
            }
        }
        $s ='';
        foreach($a as $b){
            $s = ",".$b.$s;
        }

        return $w.$s;
    }
}
