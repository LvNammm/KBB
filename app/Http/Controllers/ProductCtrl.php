<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Interface_color;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class ProductCtrl extends Controller
{
    public function show($link){
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        $categories = Category::orderBy('priority')->get();
        $product = Product::where('link',$link)->first();
        $product = $this->classify($product);
        return view("product",["interfaceColor"=>$interfaceColor,"categories"=>$categories,"product"=>$product]);
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

    public function addType(){
       $products = Product::all();
       foreach($products as $product){
        $types = array();
        $classify = explode(",", $product->classify);
        for($i=0;$i<count($classify);$i++){
            $type = new Type();
            $classify[$i] = explode("+",$classify[$i]);
            $type->price =(int)$classify[$i][1];
            $type->name_type = $classify[$i][0];
            array_push($types,$type);
        }
        $product->type()->saveMany($types);
       }
    }

    public function formatVND($s){
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
    public function createLink(){
        $products = Product::all();
        foreach($products as $product){
            $product->link =  $this->convert(strtolower($product->title))."_".$product->id;
            $product->save();
            echo($product->link."\n");
        }
    }

    public function deleteType(){
        $products = Product::all();
        foreach($products as $product){
            $types = $product->type()->get();
            if(count($types)>0){
                $nameType = "";
                $check = false;
                foreach($types as $type){
                    if(strpos($nameType,$type->name_type)==false){
                        $nameType =$nameType."---------------------".$type->name_type;
                    }
                    else{
                       $type->delete();
                    }
                }
            }
        }
    }
    
    private function convert($str) {
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
		$str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
		$str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
		$str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
		$str = preg_replace("/(??)/", 'd', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
		$str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
		$str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
		$str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
		$str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
		$str = preg_replace("/(??)/", 'D', $str);
		$str = preg_replace("/(\???|\???|\???|\???|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}
