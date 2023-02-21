@extends('admin.layout')
@section('content')

<div class="row d-flex justify-content-center">
    
    <form action="/admin/add-product" class="col-md-6" enctype="multipart/form-data" method="post">
        @if(Session::has('create-product-sucess'))
    <div class="alert alert-sucess" style="color: rgb(13, 223, 13)">
    {{ Session::pull('create-product-sucess')}}
    </div>
    @endif
        @csrf
        {{-- title --}}
        {!!$errors->has('title')?'<p class="error mb-0" style = "color:red">'.$errors->get("title")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Tiêu đề</span>
            <input name="title" type="text" class="form-control" placeholder="Tiêu đề" aria-describedby="basic-addon1">
        </div>

        <!--{{-- Price --}}-->
        <!--{!!$errors->has('title')?'<p class="error mb-0" style = "color:red">'.$errors->get("title")[0].'</p>':null!!}-->
        <!--<div class="input-group mb-3 row  ms-0 me-0">-->
        <!--    <span class="input-group-text col-md-3" id="basic-addon1">Giá</span>-->
        <!--    <input name="price" type="text" class="form-control" placeholder="Giá" aria-describedby="basic-addon1">-->
        <!--</div>-->

        {{-- Số lượng --}}
        {{-- {!!$errors->has('amount')?'<p class="error mb-0" style = "color:red">'.$errors->get("amount")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Số lượng</span>
            <input name="amount" type="text" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
        </div> --}}

        {{-- sku --}}
        {!!$errors->has('sku')?'<p class="error mb-0" style = "color:red">'.$errors->get("sku")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">SKU</span>
            <input name="sku" type="text" class="form-control" placeholder="SKU" aria-describedby="basic-addon1">
        </div>
        

        {{-- Mô tả sản phẩm --}}
        {!!$errors->has('describe')?'<p class="error mb-0" style = "color:red">'.$errors->get("describe")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Mô tả</span>
            <textarea name="describe" type="text" class="form-control" placeholder="Mô tả sản phẩm" aria-describedby="basic-addon1"></textarea>
                
        </div>
        {{-- image --}}

        {{-- Link shopee --}}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="col-md-3 input-group-text" id="basic-addon1">Link shopee</span>
            <input name="link_shopee" type="text" class="form-control" placeholder="Link shopee" aria-describedby="basic-addon1">
        </div>

        {{-- Phân loại --}}
        <p style="color: green">Nhập phân loại + giá phân loại. tên và giá cách nhau bởi dấu cộng các phân loại cách nhau bởi dấu , vd: Phân loại 1+10000,Phân loại 2+20000</p>
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="col-md-3 input-group-text" id="basic-addon1">Phân loại</span>
            <input name="classify" id="classify" type="text" class="form-control" placeholder="Phân loại" aria-describedby="basic-addon1">
        </div>

        {{-- Danh mục --}}
        <p style="color: green">Nhập id của các danh mục. Mỗi id cách nhau 1 dấu phẩy vd: 1,2,3,4</p>
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="col-md-3 input-group-text" id="basic-addon1">Danh mục</span>
            <input name="categories" type="text" class="form-control" placeholder="Danh mục" aria-describedby="basic-addon1">
        </div>

        {{-- Ảnh --}}
        {!!$errors->has('image')?'<p class="error mb-0" style = "color:red">'.$errors->get("image")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            
            <span class="input-group-text col-md-3" id="basic-addon1">Avata</span>
            <input accept="image/*" name="image" type="file" class="form-control bg-light">
        </div>

        {{-- Nhiều ảnh --}}
        {!!$errors->has('image')?'<p class="error mb-0" style = "color:red">'.$errors->get("image")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Ảnh</span>
            <input type="file" class="form-control bg-light" name="photos[]" multiple />
        </div>

        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Hiện trên web</span>
            <input checked class="col-md-1"id= "checked" type="checkbox" name="show_in_web" id="">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Tạo mới</button>
    </form>
</div>
<script>
    $('#checked').click(function() {
    if (!$(this).is(':checked')) {
        $("#classify").prop('disabled', true);
    }
    else{
        $("#classify").prop('disabled', false);
    }
  });
</script>

@endsection