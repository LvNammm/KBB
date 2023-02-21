<!doctype html>
<html>

<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <title>@yield('title-page')</title>
  <link rel="icon" type="image/x-icon" href="/images/logo/logo.ico" />
  <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
  integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <style>

.carousel-control-next:after
{
  content: '>';
  font-size: 55px;
  color: rgb(100, 100, 100);
}

.carousel-control-prev:after {
  content: '<';
  font-size: 55px;
  color: rgb(100, 100, 100);
}
    ::-webkit-scrollbar {
      width: 8px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
      background: #555;
    }

    body {
      background-color: rgb(255, 255, 255);
    }

    .form-inputs {
      position: relative;
    }

    .form-inputs .form-control {
      height: 45px;
    }

    .form-inputs .form-control:focus {
      box-shadow: none;
      border: 1px solid #000;
    }

    .form-inputs i {
      position: absolute;
      right: 10px;
      top: 15px;
    }

    .shop-bag {
      background-color: #000;
      color: #fff;
      height: 50px;
      width: 50px;
      font-size: 25px;
      display: flex;
      border-radius: 50%;
      align-items: center;
      justify-content: center;
    }

    .qty {
      font-size: 12px;
    }

    .li-item {
      margin-right: 20px;
    }

    h5 {
      margin: 0px;
    }

    .text-color-green {
      color: rgb(35, 231, 61);
    }

    .item-dm {
      margin-right: 40px;
      border: 1px solid rgb(122, 240, 122);
    }

    .text-center {
      text-align: center;
    }

    .center {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .test-font {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: 3rem;
    }

    .col-xs-2-10,
    .col-sm-2-10 {
      position: relative;
      min-height: 2px;
    }

    .col-xs-2-10 {
      width: 10%;
      float: left;
    }

    .product-item {
      padding: 0;
    }

    .single-product {
      border: 1px solid rgb(35, 231, 61, 0.3);
    }

    .link-dm {
      margin-left: 5px;
      color:{{$interfaceColor->hd_cl_text_category}}
    }

    .link-dm:hover {
      background-color: #46b946;
      color: black;
    }
    .w-20 {
      width: 20% !important;
    }
    .content-contact{
      color: {{$interfaceColor->hd_cl_text_contact_content}}
    }
    .contact{
      color: {{$interfaceColor->hd_cl_text_contact}}
    }
    .text-footer{
      color:{{$interfaceColor->ft_cl_text}}!important;
    }
    .footer-background-color{
      background-color: {{$interfaceColor->ft_cl_background}}!important;
    }

    .category{
        background-color: {{$interfaceColor->bd_cl_background_category}};
        --bs-gutter-x: 1.5rem;
        margin-right: calc(var(--bs-gutter-x) * -.5);
    margin-left: calc(var(--bs-gutter-x) * -.5);
    }

    .category-text{
        color:{{$interfaceColor->bd_cl_text_category}};
    }
    @media (min-width: 768px) {
      .col-sm-2-10 {
        width: 50%;
        float: left;
      }
    }

    @media (min-width: 992px) {
      .col-md-2-10 {
        width: 20%;
        float: left;
      }
    }

    @media (min-width: 1200px) {
      .col-lg-2-10 {
        width: 20%;
        float: left;
      }
    }
  </style>
</head>

<body className='snippet-body'>

<div
    style="display: flex;flex-direction: column;position:fixed;right:1%;bottom:3%;z-index: 100; background-color:rgb(35, 231, 61, 0.0)">
    
    <a target="_blank" href="https://shopee.vn/kingbamboovn" class="mb-5 center"
      style="justify-content: flex-start; padding: 0 10px 0 10px;background-color:#23dd23;border:1px solid rgb(35, 231, 61, 0.0);border-radius:20px">
      <img style="width:30px" src="/images/contact/shopee.png" alt="">
      <p class="ms-2 me-2 mt-2 mb-2" style="color: white;">Shopee</p>
    </a>
    
    <a target="_blank" href="https://m.me/kingbamboo.vn" class="mb-3 center"
      style="justify-content: flex-start; padding: 0 10px 0 10px;background-color:#23dd23;border:1px solid rgb(35, 231, 61, 0.0);border-radius:20px">
      <img style="width:30px" src="/images/contact/mess.png" alt="">
      <p class="ms-2 me-2 mt-2 mb-2" style="color: white;">Messenger</p>
    </a>

    <a target="_blank" href="https://zalo.me/0362322699" class="center mb-3"
      style="justify-content: flex-start; padding: 0 10px 0 10px;background-color:#23dd23;border:1px solid rgb(35, 231, 61, 0.0);border-radius:20px">
      <img style="width:35px" src="/images/contact/zalo.png" alt="">
      <div class="ms-2 me-2" style="display:flex;flex-direction:column">
        <p class="ms-0 mt-0 me-0 mb-0" style="color: white;">0362.322.699 </p>
        <p class="ms-0 mt-0 me-0 mb-0" style="color: white;  font-size: 0.9rem;"> Zalo</p>
      </div>    </a>

    <a target="_blank" href="tel:0362322699" class="center"
      style="justify-content: flex-start; padding: 0 10px 0 10px;background-color:#23dd23;border:1px solid rgb(35, 231, 61, 0.0);border-radius:20px">
      <img style="width:35px" src="/images/contact/telephone.png" alt="">
      <div class="ms-2 me-2" style="display:flex;flex-direction:column">
        <p class="ms-0 mt-0 me-0 mb-0" style="color: white;">0362.322.699 </p>
        <p class="ms-0 mt-0 me-0 mb-0" style="color: white; font-size: 0.9rem;"> Mr.Linh</p>
      </div>
    </a>
  </div>

  <header class="section-header pb-3" style="position:fixed; z-index: 1000;width: 100%;">


    <!-- style="position:fixed; z-index: 1000;width: 100%;" -->
    <section class="header-main pb-3" style="background-color: {{$interfaceColor->hd_cl_background}}">
        <div class="container">
            <div class="container-fluid">
                <a href="/" id="logo-doc" style="display: flex;justify-content: center;align-items: center;">
                    <img width="400" src="/images/logo/logonn.png" alt="">
</a>
                <div class="row d-flex align-items-center ">
                    <!-- <div class="col-md-2">
        <img class="d-none d-md-flex" src="logo/logovn.png" width="130">
      </div> -->
                    <div class="row" style="justify-content: space-between;align-items: center;">
                        <a href="/" id="logo-ngang" class="col-md-2">
                            <img src="/images/logo/logovn.png" height="100" alt="">
</a>
                        <div class="col-md-6">
                            <div class="d-flex form-inputs">
                                <input class="form-control" type="text" style="height: 40px;"
                                    placeholder="Search any product...">
                                <i class="bx bx-search"></i>
                            </div>
                        </div>

                        <div class="col-md-3" style="height:fit-content;">
                            <div class="d-flex d-none d-md-flex flex-column " style="height:fit-content;">
                                <div class="d-flex d-none d-md-flex flex-row">
                                    <strong class="contact">Hotline:</strong>
                                    <p style="margin: 0;" class="content-contact"><a target="_blank" href="https://zalo.me/0362322699">&nbsp;0362.322.699</a></p>
                                </div>

                                <div class="d-flex d-none d-md-flex flex-row">
                                    <strong class="contact">Email:</strong>
                                    <p class="content-contact" style="margin: 1px;">&nbsp;Kingbamboo@gmail.com</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2">
                <div style="display:flex;justify-content: space-evenly">
                <a class="link-dm" href="/danhmuc/all">Tất cả sản phẩm</a>
                @foreach($categories as $category)
                <a class="link-dm" href="/danhmuc/{{$category->link}}">{{$category->title}}</a>
                  
                @endforeach
                </div>
            </div>
        </div>
    </section>
</header>

  <main style="position: relative;top:270px">
  @yield('main-content')

  <footer>
    <div class="container-fluid text-footer footer-background-color" style=" padding-top: 20px;">
    <div class="container row" style="margin-left:auto;margin-right: auto;">
      <div class="col-md-4" style="margin: 0">
        <h4>Trợ giúp</h4>
        <hr style="margin-top: 5px">
      </div>

      <div class="col-md-4" style="margin: 0">
        <h4 >Liên kết nhanh</h4>
        <hr style="margin-top: 5px">
      </div>
      <div class="col-md-4" style="margin: 0">
        <h4>Liên hệ</h4>
        <hr style="margin-top: 5px">
        
    </div>
    </div>
  </div>
  <div>
    <div class="container row pt-4" style="margin-left:auto;margin-right: auto; color:black">
      <div class="col-md-4">
          <ul style="list-style-type:none;padding: 0;">
            <li style="margin-bottom: 15px;"><a href="/trogiup/abc"> Giới thiệu công ty </a></li>
            <li style="margin-bottom: 15px;"><a href="/trogiup/abc"> Chính sách thanh toán</a></li>
            <li style="margin-bottom: 15px;"><a href="/trogiup/abc"> Chinh sách vận chuyển</a></li>
            <li style="margin-bottom: 15px;"><a href="/trogiup/abc"> Chính sách đổi trả và hoàn tiền</a></li>
            <li style="margin-bottom: 15px;"><a href="/trogiup/abc"> Hướng dẫn bảo quản</a></li>
          </ul>
      </div>

      <div class="col-md-4">
        <ul style="list-style-type:none;padding: 0;">
          <li style="margin-bottom: 15px;">
            <strong>Fanpage: </strong> &nbsp; <a href="https://www.facebook.com/kingbamboo.vn" target="_black">fb.com/kingbamboo.vn</a>
          </li>

          <li style="margin-bottom: 15px;">
            <strong>Shopee: </strong> &nbsp; <a href="https://shopee.vn/kingbamboovn" target="_black">shopee.com/kingbamboovn</a>
          </li>
        </ul>
      </div>

      <div class="col-md-4">
          <ul style="list-style-type:none;padding: 0;">
          <li style="margin-bottom: 10px;">
            <strong>Địa chỉ:</strong> &nbsp;Xóm hạ, Phú Vinh , Phú Nghĩa , Chương Mỹ , Hà Nội
          </li>
          <li style="margin-bottom: 10px;">
            <strong>Hotline:</strong> <a href="https://zalo.me/0362322699" target="_black">&nbsp; 0362.322.699</a>
          </li>
          <li style="margin-bottom: 10px;">
            <strong>Email:</strong> &nbsp; kingbamboo@gmail.com
          </li>
          <li>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.459059141858!2d105.64814765062852!3d20.934072196311124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313451766b02f071%3A0x34ab38219df9517!2zTcOieSBUcmUgxJBhbiBWxrDGoW5nIFRoaeG6v3Q!5e0!3m2!1svi!2s!4v1666278792588!5m2!1svi!2s" height="300" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      
      </li>
      </ul>
    </div>
    </div>
  </div>

  <div class="container-fluid text-footer footer-background-color" style="  padding-top: 20px; color: white;">
    <p class="text-center" style="font-size:0.9rem;margin:0">CÔNG TY TNHH THIẾT MAI</p>
    <p class="text-center" style="font-size:0.9rem;margin:0">Địa chỉ	Xóm Hạ, thôn Phú Vinh, Xã Phú Nghĩa, Huyện Chương Mỹ, Thành phố Hà Nội, Việt Nam</p>
    <p class="text-center" style="font-size:0.9rem;margin:0">Giấy phép kinh doanh số:</p>
  </div>
  </footer>
</main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script type='text/javascript'
    src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <script src="/js/jsmain.js"></script>
  
  

</body>

</html>