@extends('admin.layout')
@section('content')
    <div class="row d-flex justify-content-center">
        <form action="/admin/update-category/{{$category->id}}" class="col-md-6" enctype="multipart/form-data" method="post">
            @csrf
            @if(Session::has('err-update'))
    <div class="alert alert-sucess">
    {{ Session::pull('err-update')}}
    </div>
    @endif
            {{-- title --}}
            {!! $errors->has('title')
                ? '<p class="error mb-0" style = "color:red">' . $errors->get('title')[0] . '</p>'
                : null !!}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">Tiêu đề</span>
                <input value="{{ $category->title }}" name="title" type="text" class="form-control" placeholder="Tiêu đề"
                    aria-describedby="basic-addon1">
            </div>
            {{-- link --}}
            {!! $errors->has('link')
                ? '<p class="error mb-0" style = "color:red">' . $errors->get('title')[0] . '</p>'
                : null !!}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">Link</span>
                <input value="{{ $category->link }}" name="link" type="text" class="form-control" placeholder="Link"
                    aria-describedby="basic-addon1">
            </div>
            {{-- priority --}}
            {!! $errors->has('priority')
                ? '<p class="error mb-0" style = "color:red">' . $errors->get('priority')[0] . '</p>'
                : null !!}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">Độ ưu tiên</span>
                <input value="{{ $category->priority }}" name="priority" type="text" class="form-control"
                    placeholder="priority" aria-describedby="basic-addon1">
            </div>
            {{-- image --}}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">Ảnh hiện tại</span>
                <img src="{{ $category->url_img }}" alt="" class="form-control" style="width:50px">
            </div>
            <div class="d-flex flex-row  mb-3 row  ms-0 me-0 align-items-center">
                <span class="col-md-3 input-group-text" id="basic-addon1">Sửa ảnh</span>
                <input class="col-md-2" type="checkbox" id="checkbox-changeimage" name="check" style="height: 20px">
            </div>
            {!! $errors->has('image')
                ? '<p class="error mb-0" style = "color:red">' . $errors->get('image')[0] . '</p>'
                : null !!}
            <div class="input-group mb-3 row  ms-0 me-0" id="input-image" style="display:none">
                <input accept="image/*" name="image" type="file" class="form-control bg-light">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Sửa</button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#input-image").hide();
            $("#checkbox-changeimage").change(function() {
                if($(this).prop('checked')){
                    $("#input-image").show();
                }
                else{
                    $("#input-image").hide();
                }
            });
        });
    </script>
@endsection
