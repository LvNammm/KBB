<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Adminhistory;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryAdminCtrl extends Authentication
{
    public function index(Request $request)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");

        $categories = Category::orderBy('priority')->get();
        return view("admin.category", ["categories" => $categories]);
    }

    public function delete(Request $request, $id)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $category = Category::find($id);

        $Adminhistory = new Adminhistory();
        $Adminhistory->fullname = Admin::find($request->session()->get("user-login"))->fullname;
        $Adminhistory->action = "Xóa danh mục " . $category->title;
        $Adminhistory->save();
        if (File::exists(public_path($category->url_img))) {
            File::delete(public_path($category->url_img));
            
        }
        $category->products()->detach();
        $category->delete();
        return redirect("/admin/category");
        
    }

    public function create(Request $request)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        return view("admin.create_category");
    }

    public function add(Request $request)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $validate = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'priority' => 'required',
            'image' => "mimes:jpeg,jpg,png,gif|required|max:10000"
        ]);
        $image = $request->file('image');
        $category = new Category();
        $category->title = $request->title;
        $category->link = $request->link;
        $category->priority = $request->priority;
        $category->created_by = $request->session()->get('user-login');
        // Tạo tên file lưu ảnh. tên file ảnh sẽ có dạng id_date time tính theo nano giây
        // uniqid() lấy thời gian hiện tại theo dạng nano giây, ->extension() dể lấy đuôi .jpg hay .png của ảnh
        $nameFileImage = $category->link . "_" . uniqid() . "." . $request->file('image')->extension();
        // Lưu ảnh vào thư mục public/image

        // Lưu url của anh vào đb
        $category->url_img = "/images/danhmuc/" . $nameFileImage;
        // cập nhật lại url trong db. đoạn save ở trên chưa có url nên lúc đầu url la null
        try {
            $category->save();
            $Adminhistory = new Adminhistory();
            $Adminhistory->fullname = Admin::find($request->session()->get("user-login"))->fullname;
            $Adminhistory->action = "Thêm danh mục" . $category->title;
            $Adminhistory->save();
        } catch (Exception $ex) {
            dd($ex);
            echo '<div class="alert alert-sucess"> Khi bạn nhìn thấy dòng này thì chương trình đã bị lỗi ở đâu đó. Hãy chụp màn hình khối đên và gửi cho coder để được sử lý :3</div>';

        }
        $request->file('image')->move('images/danhmuc', $nameFileImage);
        // chuyển hướng đến route /product
        return redirect("/admin/category");
    }

    public function edit(Request $request, $id)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $category = Category::find($id);
        if ($category == null) {
            session(['err-update' => 'Lỗi!. Không tìm thấy danh mục này']);
            return redirect("/admin/category");
        }

        return view("admin.edit_category", ["category" => $category]);
    }

    public function update(Request $request, $id)
    {
        if (!$this->authentication($request))
            return redirect("/admin/login");
        $category = Category::find($id);
        if ($category == null) {
            session(['err-update' => 'Lỗi!. không thể cập nhật do không tìm thấy danh mục này']);
            return redirect("/admin/category");
        }
        $validate = $request->validate([
            'title' => 'required',
            'link' => 'required',
            'priority' => 'required',
        ]);
        $old_name = $category->title;
        $category->title = $request->title;
        $category->link = $request->link;
        $category->priority = $request->priority;
        $category->updated_by = $request->session()->get('user-login');
        if ($request->check) {
            if (File::exists(public_path($category->url_img))) {
                File::delete(public_path($category->url_img));
            }
            $validate = $request->validate([
                'image' => "mimes:jpeg,jpg,png,gif|required|max:10000"
            ]);

            $nameFileImage = $category->link . "_" . uniqid() . "." . $request->file('image')->extension();
            $category->url_img = "/images/danhmuc/" . $nameFileImage;
            try {
                $category->save();
                $request->file('image')->move('images/danhmuc', $nameFileImage);
            } catch (Exception $ex) {
                $request->session()->put('err-update', 'Đã xảy ra lỗi, nhập lại thông tin cho chính xác :3');
                // dd($ex);
                echo '<div class="alert alert-sucess"> Khi bạn nhìn thấy dòng này thì chương trình đã bị lỗi ở đâu đó. Hãy chụp màn hình và gửi cho coder để được sử lý :3</div>'.'<br>'.dd($ex);
            }
        } else{
            try {
                $category->save();
            } catch (Exception $ex) {
                $request->session()->put('err-update', 'Đã xảy ra lỗi, nhập lại thông tin cho chính xác :3');
                dd($ex);
                echo '<div class="alert alert-sucess"> Khi bạn nhìn thấy dòng này thì chương trình đã bị lỗi ở đâu đó. Hãy chụp màn hình khối đên và gửi cho coder để được sử lý :3</div>';
            }
        }
        $Adminhistory = new Adminhistory();
            $Adminhistory->fullname = Admin::find($request->session()->get("user-login"))->fullname;
            if($old_name!=$category->title)
                $Adminhistory->action = "Sửa danh mục" . $old_name.' thành '. $category->title;
            else
                $Adminhistory->action = "Sửa danh mục" . $category->title;
            $Adminhistory->save();  
        return redirect("/admin/category");
    }
}
