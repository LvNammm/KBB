<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\PercentPrice;
class PercentAdminController extends Authentication
{
    public function create(Request $request){
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $percent = PercentPrice::find(1);
        return view("admin.create_percent",["percentPrice"=>$percent]);
    }

    
    public function update(Request $request){
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $percent = PercentPrice::find(1);
        $percent->below200 = $request['below200'];
        $percent->_200to1000 = $request['_2to1'];
        $percent->more1000 = $request['more1'];
        $percent->save();
        session(['create-product-sucess' => 'Cập nhật thành công']);
        return redirect("/admin/catalogue/percent");
    }
}
