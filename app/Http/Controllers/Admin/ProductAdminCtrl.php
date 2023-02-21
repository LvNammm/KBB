<?php

namespace App\Http\Controllers\Admin;

use App\Models\ImgProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Type;

class ProductAdminCtrl extends Authentication
{

    public function index(Request $request)
    {
        if (!$this->authentication($request)) {
            return redirect("/admin/login");
        }

        $products = Product::all();
        return view("admin.product", ["products" => $products]);
    }

    public function create(Request $request)
    {
        if (!$this->authentication($request)) {
            return redirect("/admin/login");
        }

        return view("admin.create_product");
    }

    public function add(Request $request)
    {
        if (!$this->authentication($request)) {
            return redirect("/admin/login");
        }

        try {
            $describe = $request->describe;
            $describe = explode("\n", $describe);
            $s = '<br>' . $describe[0];
            for ($i = 1; $i < count($describe); $i++) {
                $s = $s . '<br>' . $describe[$i];
            }

            $s = str_replace("\r", "", $s);

            $s1 = "<br>- Giữ sản phẩm nơi khô ráo, thoáng mát.<br>- Sử dụng khăn ẩm hoặc bàn chải sợi lau chà vị trí bị bụi, bẩn, mốc…";
            $product = $request->except(['_token', 'category', 'image', 'photos']);
            $nameFileImage = $this->convert_name($product['title']) . "_" . uniqid() . "." . $request->file('image')->extension();
            $product['url_img'] = "/images/products/avata/" . $nameFileImage;
            $product['created_by'] = $request->session()->get('user-login');
            $product['describe'] = $s;
            $product['fabrics'] = "Mây, Guột";
            $product['export'] = "Mỹ, Nhật Bản, Hàn Quốc, Trung Quốc";
            $product['note'] = $s1;
            $product['link'] = $this->convert_name(strtolower($product['title'])) . "_" . uniqid();
            $product['show_in_web'] = $request->show_in_web;
            Product::create($product);
            $request->file('image')->move('images/products/avata', $nameFileImage);
            $product = Product::where("title", $product['title'])->first();
            $imageOfProduct = array();
            if ($request->photos != null) {
                foreach ($request->photos as $image) {
                    $nameFileImage = $this->convert_name($product->title) . "_" . uniqid() . "." . $image->extension();
                    $imgProduct = new ImgProduct();
                    $imgProduct->url_img = "/images/products/productimg/" . $nameFileImage;
                    array_push($imageOfProduct, $imgProduct);
                    $image->move('images/products/productimg', $nameFileImage);
                }
                $product->img()->saveMany($imageOfProduct);
                if (strlen(trim($request->categories)) == 0) {
                    $o = 1;
                } else {
                    $categories = explode(",", $request->categories);
                    for ($i = 0; $i < count($categories); $i++) {
                        $categories[$i] = (int) $categories[$i];
                    }
                    $product->categories()->sync($categories);
                }
            }
            $product->link =  $this->convert(strtolower($product->title))."_".$product->id;
            $product->save();
            $this->addType($product);
            session(['create-product-sucess' => 'Thêm mới thành công']);
            return redirect("/admin/create-product");} catch (Exception $ex) {
            dd($ex);
        }

    }

    public function addType($product)
    {
        $classify = explode(",", $product->classify);
        $types = array();
        for ($i = 0; $i < count($classify); $i++) {
            $type = new Type();
            $classify[$i] = explode("+", $classify[$i]);
            $type->price = (int) $classify[$i][1];
            $type->name_type = $classify[$i][0];
            array_push($types, $type);
        }
        $product->type()->saveMany($types);
    }
    public function delete(Request $request, $id)
    {
        if (!$this->authentication($request)) {
            return redirect("/admin/login");
        }

        $product = Product::find($id);
        if (File::exists(public_path($product->url_img))) {
            File::delete(public_path($product->url_img));

        }
        foreach ($product->img()->get() as $img) {
            if (File::exists(public_path($img->url_img))) {
                File::delete(public_path($img->url_img));
            }
        }
        $product->categories()->detach();
        $product->img()->delete();
        $product->type()->delete();
        $product->delete();
        return redirect("/admin/product");
    }

    public function convert_name($str)
    {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '_', $str);
        $str = preg_replace("/( )/", '_', $str);
        return $str;
    }
    private function convert($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str;
	}
}
