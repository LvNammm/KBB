@extends('admin.layout')
@section('content')
    <form action="/admin/interface/change-color" method="POST">
        @php
   print_r($color);   
  @endphp
        @csrf
        <div class="row">
            <div class="col-sm">
                <fieldset>
                    <legend>Màu nền header</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->hd_cl_background}}" name="hd_cl_background">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput" name="opacity_hd_cl_background" value="{{$opacity[0]}}">
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-sm">
                <fieldset>
                    <legend>Màu chữ danh mục header</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->hd_cl_text_category}}" name="hd_cl_text_category">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput" value="{{$opacity[1]}}" name="opacity_hd_cl_text_category">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <fieldset>
                    <legend>Màu chữ Hotline-Email</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->hd_cl_text_contact}}" name="hd_cl_text_contact">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput"
                            value="{{$opacity[2]}}" name="opacity_hd_cl_text_contact">
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-sm">
                <fieldset>
                    <legend>Màu chữ SĐT-Email</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->hd_cl_text_contact_content}}" name="hd_cl_text_contact_content">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput"
                            value="{{$opacity[3]}}"  name="opacity_hd_cl_text_contact_content">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <fieldset>
                    <legend>Màu nền danh mục body</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->bd_cl_background_category}}" name="bd_cl_background_category">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput"
                            value="{{$opacity[4]}}"  name="opacity_bd_cl_background_category">
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-sm">
                <fieldset>
                    <legend>Màu chữ danh mục body</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->bd_cl_text_category}}" name="bd_cl_text_category">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput"
                            value="{{$opacity[5]}}"   name="opacity_bd_cl_text_category">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <fieldset>
                    <legend>Màu nền Footer</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->ft_cl_background}}" name="ft_cl_background">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput"
                            value="{{$opacity[6]}}"   name="opacity_ft_cl_background">
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-sm">
                <fieldset>
                    <legend>Màu chữ Footer</legend>
                    <div class="row">
                        <div class="col ">
                            <label for="exampleColorInput" class="form-label">Màu sắc</label>
                            <input type="color" class="form-control form-control-color " id="exampleColorInput"
                                value="{{$interfaceColor->ft_cl_text}}" name="ft_cl_text">
                        </div>
                        <div class="col">
                            <label for="exampleColorInput" class="form-label">Độ trong suốt</label>
                            <input type="text" class="form-control form-control-color" id="exampleColorInput"
                            value="{{$opacity[7]}}"  name="opacity_ft_cl_text">
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Xác nhận</button>
    </form>
@endsection
