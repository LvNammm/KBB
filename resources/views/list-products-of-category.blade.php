@extends('layout')
@section('title-page','Mây tre đan mỹ nghệ | Kingbamnboo')
@section('main-content')

<!-- style="position: relative;top:200px" -->


<section class="section-products" style="padding: 0px;">
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
                <a href="/sanpham/{{$product->link}}" class="product-item w-20">
                <div id="product-2" class="single-product ms-1 me-1 mb-1">
                    <div class="part">
                        <img class="test" style="width: 100%;" src="{{$product->url_img}}" alt="">
                    </div>
                    <div class="part-2 mt-2 ms-2">
                        <div style="min-height: 3rem">
                            <h3 style="display: -webkit-box;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;font-size:1rem"class="product-title">{{ $product->title }}</h3>
                        </div>
                        <h4 style="color: rgb(13, 196, 13)" class="product-price ms-1">
                            @if ($product->getMinPrice() == $product->getMaxPrice())
                                {{ $product->getMinPrice() }}&#8363;</h4>
                                
                            @else
                            {{ $product->getMinPrice() }}&#8363;&nbsp;-&nbsp;{{ $product->getMaxPrice() }}&#8363;</h4>
                            @endif
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