@extends('admin.layout')
@section('content')

<div class="row d-flex justify-content-center">
    
    <form action="/admin/update-percent" class="col-md-6" enctype="multipart/form-data" method="post">
        @if(Session::has('create-product-sucess'))
    <div class="alert alert-sucess" style="color: rgb(13, 223, 13)">
    {{ Session::pull('create-product-sucess')}}
    </div>
    @endif
        @csrf

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
            <span class="input-group-text col-md-3" id="basic-addon1">Dưới 2 lít</span>
            <input name="below200" type="text" class="form-control" aria-describedby="basic-addon1" value="{{$percentPrice->below200}}">
        </div>
        

        {{-- Mô tả sản phẩm --}}
        {!!$errors->has('describe')?'<p class="error mb-0" style = "color:red">'.$errors->get("describe")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">2 lít đến 1 củ</span>
            <input name="_2to1" type="text" class="form-control" aria-describedby="basic-addon1" value="{{$percentPrice->_200to1000}}">
        </div>
        {{-- image --}}

        {{-- Link shopee --}}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="col-md-3 input-group-text" id="basic-addon1">Trên 1 củ</span>
            <input name="more1" type="text" class="form-control" aria-describedby="basic-addon1" value="{{$percentPrice->more1000}}">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Tạo mới</button>
    </form>
</div>

@endsection