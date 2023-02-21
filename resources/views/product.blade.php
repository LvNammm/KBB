@extends('layout')
@section('title-page', 'Mây tre đan mỹ nghệ | Kingbamnboo')
@section('main-content')
    <style>
        .w-20 {
            width: 20% !important;
        }
        .classify-content{
            border: 1px solid rgb(80, 80, 80);
            cursor: pointer;
        }
        .classify-active{
            border: 1px solid rgb(107, 175, 107);
            color: green;
        }
        .product-price{
            font-size: 1.5rem;
            font-weight: bolder;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-6">

                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-bs-ride="carousel"
                    data-bs-interval="false">
                    <div class="carousel-inner" style="border:1px solid rgb(122, 240, 122)">
                        <div class="carousel-item ps-1 pe-1 pt-1 pb-1 active">
                            <img src="{{ $product->url_img }}" class="d-block w-100" alt="...">
                        </div>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($product->img as $img)
                            <div class="carousel-item">
                                <img id="img_{{ $i }}" src="{{ $img->url_img }}" class="d-block w-100"
                                    alt="...">
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                        {{-- <div class="carousel-item">
                            <img src="/images/products/lotly/6.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/7.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/8.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/9.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/10.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/11.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/12.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/products/lotly/5.jpg" class="d-block w-100" alt="...">
                        </div> --}}

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">

                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">

                    </button>
                </div>

                <!-- style="white-space:nowrap;overflow-x: scroll;" -->
                <div class="mt-2" style="display:flex; flex-wrap: wrap;">
                    @foreach ($product->img as $img)
                        <div class="pe-1 pb-1 w-20">
                            <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="{{ $img->url_img }}"
                                alt="">
                        </div>
                    @endforeach
                    {{-- <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/bia.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/6.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/7.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/8.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/9.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/10.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/11.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/12.jpg"
                            alt="">
                    </div>
                    <div class="pe-1 pb-1 w-20">
                        <img style="border:1px solid rgba(0,0,0,0.3)" class="w-100" src="/images/products/lotly/15.jpg"
                            alt="">
                    </div> --}}
                </div>

            </div>

            <div class=" ps-5 col-md-6">
                <div class="mt-3 mb-3">
                    <b>
                        {{-- Lót ly mây tre đan - King Bamboo --}}
                        <h5>{{ $product->title }}</h5>
                    </b>
                </div>


                <div>
                    <p class="product-price">{{ $product->classify[0][1]}}&#8363;</p>
                </div>

                <div class="d-flex fex-row">
                    <p style="white-space: nowrap">Phân loại</p>
                    <div class="d-flex fex-row flex-wrap ms-3">
                        @php
                        $i=true;
                        @endphp
                        @foreach($product->classify as $classify)
                        @if($i)
                        <div class="div classify-content ms-2 mb-1 center classify-active" onclick="getPrice('{{$classify[0]}}',event)">
                            <p class="text-center ms-2 me-2 mt-1 mb-1">{{$classify[0]}} </p>
                        </div>
                            @php
                            $i=0;
                            @endphp
                        @else
                        <div class="div classify-content ms-2 mb-1 center" onclick="getPrice('{{$classify[0]}}',event)">
                            <p class="text-center ms-2 me-2 mt-1 mb-1">{{$classify[0]}} </p>
                        </div>
                        @endif
                        @endforeach

                        {{-- <div class="classify-content ms-2 mb-1 center">
                            <p class="text-center ms-2 me-2 mt-1 mb-1">Khoo</p>
                        </div>

                        <div class="classify-content ms-2 mb-1 center">
                            <p class="text-center ms-2 me-2 mt-1 mb-1">Khoo</p>
                        </div>

                        <div class="classify-content ms-2 mb-1 center">
                            <p class="text-center ms-2 me-2 mt-1 mb-1">Khoo</p>
                        </div>

                        <div class="classify-content ms-2 mb-1 center">
                            <p class="text-center ms-2 me-2 mt-1 mb-1">Khoo</p>
                        </div>

                        <div class="classify-content col-md-2 ms-2 mb-1 center">
                            <p class="text-center mt-1 mb-1">Khoo</p>
                        </div> --}}
                    </div>

                </div>

                <div class="mt-2" style="display:flex;">
                    <p style="margin-right: 150px;white-space: nowrap;">Đặt hàng</p>
                    {!! !empty($product->link_shopee)
                        ? '<a target="_blank" href="'.$product->link_shopee.'" class="center me-1"
                                            style="justify-content: flex-start; padding: 0 10px 0 10px;background-color:#23dd23;border:1px solid rgb(35, 231, 61, 0.0);border-radius:20px">
                                            <img style="width:30px" src="/images/contact/shopee.png" alt="">
                                            <p class="ms-2 me-2 mt-2 mb-2" style="color: white;">Shopee</p>
                                        </a>'
                        : '' !!}


                    <a class="center" target="_blank" href="https://zalo.me/0362322699"
                        style="
                                background-color: #1ccb1c;
                                border: 1px solid white;
                                border-radius: 30px;">
                        <p style="color: white;white-space: nowrap;" class="ps-3 pe-3 pb-0 mt-1 mb-1">Liên hệ đặt hàng</p>
                                    </a>
                </div>

                <br>
                <hr>
                <br>
                <div>
                    <p>
                        <b>SKU:</b>
                        &nbsp {{ $product->sku }}
                    </p>
                </div>

                <div>
                    <p>
                        <b>Chất liệu:</b>
                        &nbsp {{ $product->fabrics }}
                    </p>
                </div>

                <div>
                    <p>
                        <b>Xuất khẩu:</b>
                        &nbsp {{ $product->export }}
                    </p>
                </div>

                <div>
                    <p>
                        <b>Bao bì đóng gói:</b>
                        &nbsp {{ $product->pack }}
                    </p>
                </div>


                <div>
                    <p>
                        <b>Mô tả sản phẩm:</b>
                        &nbsp @php echo $product->describe; @endphp 
                    </p>
                </div>

                <div>
                    <p>
                        <b>Lưu ý khi sử dụng:</b>
                        &nbsp @php echo $product->note; @endphp 
                    </p>
                </div>


            </div>

        </div>
    </div>
    </div>


    <br>
    <br>
    <br>
<script>
    function getPrice(classify,e){
        let a = new Map();

            @foreach($product->classify as $classify)
            a.set("{{$classify[0]}}","{{$classify[1]}}")
            @endforeach
        
        document.querySelector(".product-price").innerHTML = a.get(classify)+"&#8363;"

        document.getElementsByClassName("classify-active")[0].classList.remove("classify-active");
        // this.classList.add("classify-active");
        if(!e.target.classList.contains('div')){
            e.target.parentElement.classList.add("classify-active");
        }
        else{
            e.target.classList.add("classify-active");
        }

        console.log(e.target.innerHTML)
    }
</script>
@endsection
