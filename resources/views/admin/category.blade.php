@extends('admin.layout')
@section('content')

<table class="table table-bordered border-primary">
    <thead style="border-bottom: 1px solid black">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Tiêu đề</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Link</th>
        <th scope="col">Độ ưu tiên</th>
        <th scope="col">Người tạo</th>
        <th scope="col">Người cập nhật</th>
        <th class="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)

        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->title}}</td>
            <td><img src="{{$category->url_img}}" style="height:70px" alt=""> </td>
            <td>{{$category->link}}</td>
            <td>{{$category->priority}}</td>
            <td>{{$category->createdAt->fullname}}</td>
            <td>{!! !empty($category->updatedBy) ? $category->updatedBy->fullname :''!!}</td>
            <td>
                <a class="btn btn-primary mb-1" href="/admin/category/edit/{{$category->id}}">Sửa</a>
                <a class="btn btn-primary" onclick="confirmDelete({{$category->id}},event)" href="#">Xóa</a>
            </td>
          </tr>


        @endforeach
      
     
      
    </tbody>
  </table>

  <script> 
    function confirmDelete(id,e) {
        if (confirm("Xóa danh mục có id = " +id +"?") == true) {
            window.location = "/admin/category/delete/"+id;
        }
    }
</script>

@endsection