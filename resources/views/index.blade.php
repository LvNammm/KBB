@extends('layout')
@section('title-page', 'Mây tre đan mỹ nghệ | Kingbamnboo')
@section('main-content')
    <style>
        .div-show-product {
            flex-direction: row;
            flex-wrap: nowrap;
            overflow-y: hidden;
            overflow-x: scroll;
        }

        .div-show-product::-webkit-scrollbar {
            height: 0px;
        }

        .div-show-product::-webkit-scrollbar-track {
            background-color: black;
        }


        .product-next:hover {
            cursor: pointer;
        }

        .product-next:hover>.product-action-icon-next {
            color: rgb(87, 87, 87);
        }


        .product-previous:hover>.product-action-icon-previous {
            color: rgb(87, 87, 87);
        }

        .product-previous:hover {
            cursor: pointer;
        }

        .product-action-icon {
            color: rgb(187, 170, 170);
        }

        .w-15 {
            width: 15%;
        }
    </style>
    <div class="container p-0">
        <div class=" ps-0 pe-0  mb-3 row w-100" style="justify-content:space-between">
            <div class="col-md-8 pe-1 boder-green">

                <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/images/carosel/bia1.png" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/images/carosel/bia2.png" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="/images/carosel/bia3.png" alt="Third slide">
                        </div>
                    </div>
                    <!-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">


                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">


                    </a> -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="prev">

                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                        data-bs-slide="next">

                    </button>
                </div>

            </div>

            <div class="col-md-4 ps-1 row p-0">
                <div class="col-md-12 ">
                    <img class="boder-green w-100 p-0 pb-2" src="/images/carosel/biabe1.png" alt="">
                </div>

                <div class="col-md-12">
                    <img class="col-md-12 boder-green w-100 p-0 pt-2" src="/images/carosel/biabe1.png" alt="">
                </div>


            </div>
        </div>
    </div>


    <nav class="navbar navbar-expand-lg navbar-light bg-light container"
        style=" display:flex;border: 1px solid green;flex-direction: column;">
        <div class="container-fluid">
            <a class="navbar-brand d-md-none d-md-flex" href="#">Danh mục</a>
            <a href="/danhmuc/all">Tât cả sản phẩm</a>
        </div>
        <div class="container-fluid">
            <div>
                <ul class="navbar-nav d-flex flex-row">
                    @foreach ($categories as $category)
                        <li class="nav-item w-15 item-dm">
                            <a class="nav-link d-flex flex-column align-items-center active" aria-current="page"
                                href="/danhmuc/{{ $category->link }}">
                                <img style="height:100px" src="{{ $category->url_img }}" alt="">
                                <p style="margin: 0;text-align: center;">{{ $category->title }}</p>
                            </a>
                        </li>
                    @endforeach


                </ul>

            </div>

        </div>
    </nav>






    <section class="section-products">
        <!-- Trang trí nhà cửa -->
        @foreach ($categories as $category)
            <div class="container mb-5">
                <div class="d-flex flex-row justify-content-between mb-3 category">
                    <div>
                        <div class="category-text center">
                            <a href="/danhmuc/{{ $category->link }}">
                                <h2 class="category-text">{{ $category->title }}</h2>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex align-self-end me-2">
                        <div style="color: white">

                            <a href="/danhmuc/{{ $category->link }}">Xem thêm &raquo</a>
                        </div>
                    </div>
                </div>
                <div style="position: relative">
                    <div class="product-next product-icon-more mb-1"
                        style="height: 99%;width:5%;position:absolute; right:-1%;">
                        <i class="fa-solid fa-chevron-right product-action-icon product-action-icon-next"
                            style="position:absolute; top:50%;left:50%;transform:translate(-50%,-50%);font-size:2rem"></i>
                    </div>


                    <div class="product-previous product-icon-more mb-1"
                        style="height: 99%;width:5%;position:absolute; left:-1%;">
                        <i class="fa-solid fa-chevron-left product-action-icon product-action-icon-previous"
                            style="position:absolute; top:50%;left:50%;transform:translate(-50%,-50%);font-size:2rem"></i>
                    </div>

                    <div class="row div-show-product product-{{ $category->id }}">
                        @php
                            $i = 1;
                        @endphp

                        @foreach ($category->products as $product)
                            <a href="/sanpham/{{ $product->link }}" class="product-item w-20">
                                <div id="product-2" class="single-product ms-1 me-1 mb-1">
                                    <div class="part">
                                        <img class="test" style="width: 100%;" src="{{ $product->url_img }}"
                                            alt="">
                                    </div>
                                    <div class="part-2 mt-2 ms-2">
                                        <div style="min-height: 3rem">
                                            <h3 style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;"class="product-title">{{ $product->title }}</h3>
                                        </div>
                                        <h4 style="color: rgb(13, 196, 13)" class="product-price ms-1">
                                            {{ $product->getMinPrice() }}&#8363;&nbsp;-&nbsp;{{ $product->getMaxPrice() }}&#8363;</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        {{-- for($i=1;$i<=10;$i++){ if($i%2==1){ 
                    if($i==1)
                    echo'<a href="/sanpham/abc" class="product-item w-20">
                    <div id="product-1" class="single-product me-1 mb-1">
                        <div class="part">
                            <img class="test" style="width: 100%;" src="/images/ex_product.jpg" alt="">
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">Here Product Title</h3>
                            <h4 class="product-old-price">$79.99</h4>
                            <h4 class="product-price">$49.99</h4>
                        </div>
                    </div>
                    </a>' ;
                    else{
                        echo'<a href="/sanpham/abc" class="product-item w-20">
                    <div id="product-1" class="single-product ms-1 me-1 mb-1">
                        <div class="part">
                            <img class="test" style="width: 100%;" src="/images/ex_product.jpg" alt="">
                        </div>
                        <div class="part-2">
                            <h3 class="product-title">Here Product Title</h3>
                            <h4 class="product-old-price">$79.99</h4>
                            <h4 class="product-price">$49.99</h4>
                        </div>
                    </div>
                    </a>' ;
                    }
                    }
                    else{
                    echo '<a href="/sanpham/abc" class="product-item w-20">
                        <div id="product-2" class="single-product ms-1 me-1 mb-1">
                            <div class="part">
                                <img class="test" style="width: 100%;" src="/images/ex_product.jpg" alt="">
                            </div>
                            <div class="part-2">
                                <h3 class="product-title">Here Product Title</h3>
                                <h4 class="product-price">$49.99</h4>
                            </div>
                        </div>
                    </a>';
                    }
                    } @endphp --}}
                        <!-- Single Product -->
                    </div>


                </div>
            </div>
        @endforeach



    </section>



    <br>
    <br>
    <br>
@endsection
