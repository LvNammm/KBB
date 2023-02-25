@extends('layout')
@section('title-page','Mây tre đan mỹ nghệ | Kingbamnboo')
@section('main-content')

<!-- style="position: relative;top:200px" -->

<div class="container p-0">
    <div class=" ps-0 pe-0  mb-3 row w-100" style="justify-content:space-between">
        <div class="col-md-8 pe-1 boder-green">

            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel"
                data-bs-interval="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="/images/carosel/bia2.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="/images/carosel/bia1.png" alt="Second slide">
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
            <div class="col-md-12 ps-0 pe-0">
                <img class="boder-green w-100 p-0 pb-2" src="/images/carosel/biabe1.png" alt="">
            </div>

            <div class="col-md-12 ps-0 pe-0">
                <img class="col-md-12 boder-green w-100 p-0 pt-2" src="/images/carosel/biabe1.png" alt="">
            </div>
        </div>
    </div>
</div>


<div class="container ps-0 pe-0 mb-3">
    <div class="row">
        <div class="col-md-6">
        <img style="width: 100%" src="/images/carosel/biangang1.jpg" alt="">
    </div>
    <div class="col-md-6">
        <img style="width:100%" src="/images/carosel/biangang2.png" alt="">
    </div>
    </div>
</div>
<br>

<section class="section-products mt-3" style="padding: 0px;">
    <!-- Trang trí nhà cửa -->
    <div class="container mb-5">
        <div class="row mb-3 category" style="justify-content: center;align-items: center;">
            <div class="col-md-8 col-lg-6">
                <div>
                    <h2 class="category-text" style="color: white; text-align: center; margin: 0;padding: 5px 0 5px 0;">{{$title}}</h2>
                </div>
            </div>
        </div>
        <div class="row row-cols-sm-2 row-cols-md-3 row-cols-xl-5">


            @foreach($products as $product)
                <a href="/catalogue/{{$product->link}}" class="product-item w-20">
                <div id="product-2" class="single-product ms-1 me-1 mb-1">
                    <div class="part">
                        <img class="test" style="width: 100%;" src="{{$product->url_img}}" alt="">
                    </div>
                    <div class="part-2 mt-2 ms-2">
                        <div style="min-height: 3rem">
                            <h3 style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;"class="product-title">{{ $product->title }}</h3>
                        </div>
                        {{-- <h4 style="color: rgb(13, 196, 13)" class="product-price ms-1">
                            {{ $product->getMinPrice() }}&#8363;&nbsp;-&nbsp;{{ $product->getMaxPrice() }}&#8363;</h4> --}}
                    </div>
                </div>
                </a>
                @endforeach

        </div>
    </div>

</section>



<br>
<br>
<br>

@endsection