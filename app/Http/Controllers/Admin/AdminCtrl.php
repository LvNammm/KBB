<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminCtrl extends Authentication
{
    public function login(Request $request){
        if($request->session()->has("logged")){
            return redirect("/admin");
        }
        return view("admin.login");
    }

    public function logout(Request $request){
        $request->session()->pull('logged');
        return redirect("/admin/login");
    }
    public function auth(Request $request){
        $admin = Admin::where("username",$request->username)->first();
        if($admin == null){
            session(['err-login' => 'Sai tài khoản hoặc mật khẩu']);
            return redirect("/admin/login");
        }
        else{
            if(Hash::check($request->password,$admin->password) == false){
                session(['err-login' => 'Sai tài khoản hoặc mật khẩu']);
                return redirect("/admin/login");
            }
            else{
                $request->session()->put('logged', '1');
                $request->session()->put('user-login', $admin->id);
                return redirect("/admin");
            }
        }
    
    }

    public function index(Request $request){
        if(!$this->authentication($request))   
            return redirect("/admin/login");
        return view("admin.layout");
    }
}
