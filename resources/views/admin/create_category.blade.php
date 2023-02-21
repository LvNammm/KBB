@extends('admin.layout')
@section('content')

<div class="row d-flex justify-content-center">
    @if(Session::has('errAddCategory'))
    <div class="alert alert-sucess">
    {{ Session::pull('errAddCategory')}}
    </div>
    @endif
    <form action="/admin/add-category" class="col-md-6" enctype="multipart/form-data" method="post">
        @csrf
        {{-- title --}}
        {!!$errors->has('title')?'<p class="error mb-0" style = "color:red">'.$errors->get("title")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Tiêu đề</span>
            <input name="title" type="text" class="form-control" placeholder="Tiêu đề" aria-describedby="basic-addon1">
        </div>
        {{-- link --}}
        {!!$errors->has('link')?'<p class="error mb-0" style = "color:red">'.$errors->get("title")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Link</span>
            <input name="link" type="text" class="form-control" placeholder="Link" aria-describedby="basic-addon1">
        </div>
        {{-- priority --}}
        {!!$errors->has('priority')?'<p class="error mb-0" style = "color:red">'.$errors->get("priority")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Độ ưu tiên</span>
            <input name="priority" type="text" class="form-control" placeholder="priority" aria-describedby="basic-addon1">
        </div>
        {{-- image --}}
        {!!$errors->has('image')?'<p class="error mb-0" style = "color:red">'.$errors->get("image")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            
            <span class="input-group-text col-md-3" id="basic-addon1">Upload Image</span>
            <input accept="image/*" name="image" type="file" class="form-control bg-light">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Tạo mới</button>
    </form>
</div>

@endsection