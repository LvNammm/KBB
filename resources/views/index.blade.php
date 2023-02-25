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


    <div class="container ps-0 pe-0">
        <div class="row">
            <div class="col-md-6">
            <img style="width: 100%" src="/images/carosel/biangang1.jpg" alt="">
        </div>
        <div class="col-md-6">
            <img style="width:100%" src="/images/carosel/biangang2.png" alt="">
        </div>
        </div>
    </div>




    <section class="section-products container ps-0 pe-0">

        <div class="row mb-3 category" style="justify-content: center;align-items: center;margin-left: 0.1rem;margin-right: 0.1rem">
            <div class="col-md-8 col-lg-6 ps-0 pe-0">
                <div>
                    <h2 class="category-text" style="color: white; text-align: center; margin: 0;padding: 5px 0 5px 0;">Giới Thiệu</h2>
                </div>
            </div>
        </div>
        <!-- Trang trí nhà cửa -->
        <div>
            <img class="mb-3 mt-3" style="width:100%" src="/images/home/Home.png" alt="">

            <img class="mb-3" style="width:100%" src="/images/home/Gallery.png" alt="">

            <img class="mb-3" style="width:100%" src="/images/home/3.png" alt="">

            <img class="mb-3" style="width:100%" src="/images/home/4.png" alt="">

            <img class="mb-3" style="width:100%" src="/images/home/6.png" alt="">

            <img class="" style="width:100%" src="/images/home/Contact.png" alt="">
        </div>
    </section>



    <br>
@endsection
