<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Interface_color;
class PolicyCtrl extends Controller
{
    public function index($pt){
        $interfaceColor = Interface_color::orderBy('id', 'DESC')->get()->first();
        $categories = Category::orderBy('priority')->get();
        return view('policy',["categories"=>$categories,"interfaceColor"=>$interfaceColor]);
    }
}
