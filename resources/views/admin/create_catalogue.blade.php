@extends('admin.layout')
@section('content')
    <style>
        p {
            margin: 0px;
        }

        * {
            box-sizing: border-box;
        }

        #myUL {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #myUL li a {
            border: 1px solid #ddd;
            margin-top: -1px;
            /* Prevent double borders */
            background-color: #f6f6f6;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            color: black;
            display: block
        }

        #myUL li a:hover:not(.header) {
            background-color: #eee;
        }
        .input-price{
            width: 100px;
        }
        table, th, td {
            border: 1px solid black;
             border-collapse: collapse;
        }
    </style>
    <div class="row d-flex justify-content-center">

        <form action="/admin/add-catalogue" class="col-md-6" enctype="multipart/form-data" method="post">
            <div class="input-group">
                <input class="input-search-product form-control" type="text" id="myInput" onkeyup="myFunction()"
                    placeholder="Search for names.." title="Type in a name">
                <button class="btn btn-outline-secondary search-product" type="button" onclick="searchProduct()">Tìm
                    kiếm</button>
            </div>


            <ul id="myUL" style="max-height: 300px;overflow: auto;">

            </ul>
            <br><br><br>
            @if (Session::has('create-product-sucess'))
                <div class="alert alert-sucess" style="color: rgb(13, 223, 13)">
                    {{ Session::pull('create-product-sucess') }}
                </div>
            @endif

            @if (Session::has('create-product-error'))
                <div class="alert alert-sucess" style="color: rgb(255, 0, 0)">
                    {{ Session::pull('create-product-error') }}
                </div>
            @endif
            @csrf

            <input type="text" name="id" style="display: none" value="-1">
            {{-- title --}}
            {!! $errors->has('title')
                ? '<p class="error mb-0" style = "color:red">' . $errors->get('title')[0] . '</p>'
                : null !!}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">Tiêu đề</span>
                <input name="title" type="text" class="form-control" placeholder="Tiêu đề"
                    aria-describedby="basic-addon1">
            </div>

            <div style="width:100%">
                <img id="img_product" src="" alt="" style="width:100%">
            </div>

            {{-- Số lượng --}}
            {{-- {!!$errors->has('amount')?'<p class="error mb-0" style = "color:red">'.$errors->get("amount")[0].'</p>':null!!}
        <div class="input-group mb-3 row  ms-0 me-0">
            <span class="input-group-text col-md-3" id="basic-addon1">Số lượng</span>
            <input name="amount" type="text" class="form-control" placeholder="Số lượng" aria-describedby="basic-addon1">
        </div> --}}

            {{-- sku --}}
            {!! $errors->has('sku') ? '<p class="error mb-0" style = "color:red">' . $errors->get('sku')[0] . '</p>' : null !!}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">SKU</span>
                <input name="sku" type="text" class="form-control" placeholder="SKU" aria-describedby="basic-addon1">
            </div>


            {{-- Mô tả sản phẩm --}}
            {!! $errors->has('describe')
                ? '<p class="error mb-0" style = "color:red">' . $errors->get('describe')[0] . '</p>'
                : null !!}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="input-group-text col-md-3" id="basic-addon1">Mô tả</span>
                <textarea name="describe" type="text" class="form-control" placeholder="Mô tả sản phẩm"
                    aria-describedby="basic-addon1"></textarea>

            </div>
            {{-- image --}}

            {{-- Link shopee --}}
            <div class="input-group mb-3 row  ms-0 me-0">
                <span class="col-md-3 input-group-text" id="basic-addon1">Link shopee</span>
                <input name="link_shopee" type="text" class="form-control" placeholder="Link shopee"
                    aria-describedby="basic-addon1">
            </div>


            <table class="table table-striped" style="text-align: center">
                <thead>
                    <tr>
                        <th scope="col">Phân loại</th>
                        <th scope="col">Giá </th>
                        <th scope="col"> Giá CN</th>
                        <th scope="col"   colspan="2">Dưới 200</th>
                        <th scope="col"  colspan="2">200-1000</th>
                        <th scope="col"  colspan="2">Trên 1000</th>
                        <th scope="col"  colspan="2"></th>
                    </tr>
                    <tr>
                        <th>
                        
                        </th>
                        <th></th>
                        <th></th>

                        <th>USD</th>
                        <th>VND</th>
                        <th>USD</th>
                        <th>VND</th>
                        <th>USD</th>
                        <th>VND</th>
                    </tr>
                </thead>
                <tbody id="tbody-classify">
                    <tr>
                        <td style="display: none"><input type="text" name="_id[]"></td>
                        <td><input  class="input-price" type="text" name="_type[]" id=""></td>
                        <td><input class="input-price" type="text" name="_price[]"></td>
                        <td><input class="input-price priceCN" onchange="changepriceCN()" type="text" name="_priceCN[]"></td>
                        <td><input class="input-price " type="text" name="_less200USD[]" id=""></td>
                        <td><input class="input-price less200" type="text" name="_less200[]" id=""></td>
                        <td><input class="input-price" type="text" name="_200to1000USD[]" id=""></td>
                        <td><input class="input-price _200to1000" type="text" name="_200to1000[]" id=""></td>
                        {{-- <td><input type="text" name="_200to500[]" id=""></td>
                        <td><input type="text" name="_500to1000[]" id=""></td> --}}
                        <td><input class="input-price" type="text" name="_more1000[]USD" id=""></td>
                        <td><input class="input-price more1000" type="text" name="_more1000[]" id=""></td>
                        <td><a href="#" class="remove-classify" onclick="removeTr()">x</a></td>
                    </tr>
                </tbody>

            </table>
            <div class="input-group mb-3">
            <button class="btn btn-outline-secondary search-product" type="button" onclick="addclassify()">Thêm phân loại</button>
            </div>
           
            <button type="submit" class="btn btn-primary mb-2">Tạo Catalogue</button>
            <button class="btn btn-outline-secondary search-product" type="button" onclick="loadingPage()">Load lại trang</button>
        </form>
    </div>

    <script>
        let listProduct = undefined;
        let percent2 = 100+ {{$percentPrice->below200}};
        let percent2to1 = 100+ {{$percentPrice->_200to1000}};
        let percent1 = 100+ {{$percentPrice->more1000}};
        console.log(percent2)
        console.log(percent2to1)
        console.log(percent1)
        function loadingPage(){
            alert("Load lại thì ấn vào cái quay tròn trên góc màn hình ấy. chứ ấn đây làm cái éo gì");

        }

        $(document).on('click', 'a.remove-classify', function () {
                $(this).closest('tr').remove();
            });
        function addclassify(){
           let textHtml = $("#tbody-classify").html()
           let textAddHtml = `<tr> <td style="display: none"><input type="text" name="_id[]"></td>
                        <td><input class="input-price" type="text" name="_type[]" id=""></td>
                        <td><input class="input-price" type="text" name="_price[]"></td>
                        <td><input class="input-price priceCN" onchange="changepriceCN()" type="text" name="_priceCN[]"></td>
                        <td><input class="input-price" type="text" name="_less200USD[]" id=""></td>
                        <td><input class="input-price less200" type="text" name="_less200[]" id=""></td>
                        <td><input class="input-price" type="text" name="_200to1000USD[]" id=""></td>
                        <td><input class="input-price _200to1000" type="text" name="_200to1000[]" id=""></td>
                        <td><input class="input-price" type="text" name="_more1000USD[]" id=""></td>
                        <td><input class="input-price more1000" type="text" name="_more1000[]" id=""></td>
                        <td><a href="#" class="remove-classify" onclick="removeTr()">x</a></td> </tr>`
            textHtml.replace("value", "");
            console.log(textHtml)
            $("#tbody-classify").append(textAddHtml)
        }
        function myFunction() {
            var input, filter, ul, li, a, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                txtValue = a.textContent || a.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

        function searchProduct() {
            keySearch = $('.input-search-product').val();
            console.log(keySearch);
            $.ajax({
                url: "/admin/searchProduct/" + keySearch,
                type: "get",
                success: function(response) {
                    listProduct = response;
                    console.log(response);
                    ul = document.getElementById("myUL");
                    textHtml = ``;
                    for (i = 0; i < response.length; i++) {
                        textHtml +=
                            `<li onclick = "selectProduct(${i})"><a href="#"><p class = "title">${response[i].title}</p></a></li>`
                    }
                    $('#myUL').html(textHtml)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        }

        function selectProduct(i) {
            console.log(listProduct[i]);
            $("input[name='id']").val(listProduct[i].id);
            $("input[name='title']").val(listProduct[i].title);
            $("input[name='sku']").val(listProduct[i].sku);
            $("input[name='link_shopee']").val(listProduct[i].link_shopee);
            $("#img_product").attr("src",listProduct[i].url_img);
            let textHtml = ``;
            for(let j=0;j<listProduct[i].types.length;j++){
                textHtml += `<tr><td style="display: none"><input class="input-price" type="text" name="_id[]" value = "${listProduct[i].types[j].id}"></td>
                        <td><input type="text" class="input-price" name="_type[]" id="" value = "${listProduct[i].types[j].name_type}"></td>
                        <td><input type="text" class="input-price" name="_price[]" value = "${listProduct[i].types[j].price==null?'':listProduct[i].types[j].price}"></td>
                        <td><input class="input-price priceCN" onchange="changepriceCN()" type="text" name="_priceCN[]" value = "${listProduct[i].types[j].china_price==null?'':listProduct[i].types[j]._less200}"></td>
                        <td><input class="input-price" type="text" name="_less200USD[]" id=""></td>
                        <td><input class="input-price less200" type="text" name="_less200[]" id="" value = "${listProduct[i].types[j]._less200==null?'':listProduct[i].types[j]._less200}"></td>
                        <td><input class="input-price" type="text" name="_200to1000USD[]" id=""></td>
                        <td><input class="input-price _200to1000" type="text" name="_200to1000[]" id="" value = "${listProduct[i].types[j]._200to1000==null?'':listProduct[i].types[j]._200to1000}"></td>
                        <td><input class="input-price" type="text" name="_more1000USD[]" id=""></td>
                        <td><input class="input-price more1000" type="text" name="_more1000[]" id="" value = "${listProduct[i].types[j]._more1000==null?'':listProduct[i].types[j]._more1000}"></td>
                        <td><a href="#" class="remove-classify">x</a></td></tr>`
            }
            $("#tbody-classify").html(textHtml)   
        }
        function changepriceCN(){
            let td = event.target.parentElement.parentElement
            let priceCN = event.target.value;
            let less200 = td.querySelector(".less200")
            let _200to100 = td.querySelector("._200to1000")
            let more1000 = td.querySelector(".more1000")
            less200.value = Math.round((priceCN*percent2)/10000)*100
            _200to100.value = Math.round((priceCN*percent2to1)/10000)*100
            more1000.value = Math.round((priceCN*percent1)/10000)*100
         }
    </script>
@endsection
