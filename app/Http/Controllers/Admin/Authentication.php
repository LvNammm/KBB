<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Authentication extends Controller
{
    protected function authentication($request){
        if(!$request->session()->has("logged")){
            session(['err-login' => 'Cần đăng nhập để có thể truy cập nội dung này']);
            return false;
        }
        return true;
    }
}
