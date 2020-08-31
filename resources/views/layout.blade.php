<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/furniture/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:01:35 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<![endif]-->

<meta name="viewport" content="width=device-width, initial-scale=1.0"> {{-- thu phóng cho các thiết bị di động --}}
<meta name="description" content="">
<meta name="author" content="">
<title>GEARVN</title>
<!-- Favicons Icon -->
<link rel="icon" href="//theme.hstatic.net/1000026716/1000440777/14/favicon.png?v=11736" type="image/x-icon" />
<link rel="shortcut icon" href="//theme.hstatic.net/1000026716/1000440777/14/favicon.png?v=11736" type="image/x-icon" />
<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS Style -->

<link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/revslider.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/owl.theme.css')}}" type="text/css">
<link rel="stylesheet" href="{{asset('public/frontend/css/font-awesome.css')}}" type="text/css">
<!-- Google Fonts -->
<link href="{{asset('public/frontend/css/1.css')}}" rel='stylesheet' type='text/css'>
<script src="{{asset('public/frontend/js/1.js')}}"></script>
</head>
<body class="cms-index-index">
<div class="page"> 
  <!-- Header -->
  <header class="header-container">
    <div class="header-top">
      <div class="container">
        <div class="row"> 
          <!-- Header Language -->
          <div class="col-xs-6">
            
            <!-- End Header Language --> 
            <!-- Header Currency -->
            
            <!-- End Header Currency -->
            <marquee class="welcome-msg hidden-xs"><div style="color: green"> HCM: 78-80-82 HOÀNG HOA THÁM, Q.TÂN BÌNH | HN: 37 NGÕ 121 THÁI HÀ, Q.ĐỐNG ĐA  </div></marquee>
          </div>
          <div class="col-xs-6"> 
            <!-- Header Top Links -->
            <div class="toplinks">
              <div class="links">
                <div class=""><i class='fas fa-envelope'></i> abulick113@gmail.com</div>
                <div style="margin-left: 10px" class=""><i class='fas fa-phone-square-alt'></i> 036 249 9454</div>
              </div>
            </div>
            <!-- End Header Top Links --> 
          </div>
        </div>
      </div>
    </div>
    <div class="header container">
      <div class="row">
        <div class="col-lg-2 col-sm-3 col-md-2 col-xs-12"> 
          <!-- Header Logo --> 
          <a class="logo" title="Magento Commerce" href="{{URL::to('/trang-chu')}}"><img alt="Magento Commerce" src="{{asset('public/frontend/images/gearvn-logo.png')}}"></a> 
          <!-- End Header Logo --> 
        </div>
        <div class="col-lg-7 col-sm-4 col-md-6 col-xs-12"> 
          <!-- Search-col -->
          <div class="search-box" style="width: 365px;">
            <form action="{{URL::to('/tim-kiem')}}" method="POST" id="search_mini_form" name="Categories">
                {{csrf_field()}}
              <input style="width: 250px" type="text" value="" maxlength="70" class="" name="keywords_submit" placeholder="Tìm kiếm" id="search">
              <input type="submit" id="submit-button" name="search_items" value="Tìm Kiếm" class="search-btn-bg">
            </form>
          </div>
          <!-- End Search-col --> 
        </div>
        <!-- Top Cart -->
        <div class="col-lg-3 col-sm-5 col-md-4 col-xs-12">
          <div class="top-cart-contain">
            <div class="mini-cart">
              <div class="basket dropdown-toggle"> <a href="{{URL::to('/show-cart')}}"> <i class="icon-cart"></i>
                <div class="cart-box"><span class="title">Giỏ Hàng</span><span id="cart-total"> <?php $cart = Cart::count(); echo ($cart)?>  </span></div>
                </a></div>
              
            </div>
            <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
              <input value="" type="hidden">
              <input id="enable_module" value="1" type="hidden">
              <input class="effect_to_cart" value="1" type="hidden">
              <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
            </div>
          </div>
          <span class="or">|</span>
          <?php
                $customer_id = Session::get('customer_id');
                if($customer_id!=NULL){
                ?>
                <div class="login"><a title="Login" href="{{URL::to('/logout-checkout')}}"><span>Đăng Xuất</span></a></div>
                <?php
                }else{
                ?>
                <div class="login"><a title="Login" href="{{URL::to('/login-checkout')}}"><span>Đăng Nhập</span></a></div>
                <?php
                }
                ?>
        </div>
        <!-- End Top Cart --> 
      </div>
    </div>
  </header>
  <!-- end header --> 
  <!-- Navbar -->
  <nav>
    <div class="container" >
      <div class="nav-inner"> 
        <ul id="nav" class="hidden-xs">
          <li class="level0 parent drop-menu"><a href="{{URL::to('/trang-chu')}}"><span>Trang chủ</span> </a>
          </li>
          <li class="level0 parent drop-menu"><a href=""><span>Sản Phẩm</span> </a>
            <ul class="level1">
                @foreach($category as $key =>$cate)
              <li class="level1 first"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}"><span>{{$cate->category_name}}</span></a></li>
              @endforeach
            </ul>
          </li>
          <li class="level0 parent drop-menu"><a href=""><span>Thương Hiệu</span> </a>
            <ul class="level1" style="height: 470px;width: 800px">
                @foreach($brand as $key => $brand)
              <li style="float: left;width: 150px" class=""><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}"><span>{{$brand->brand_name}}</span></a></li>
              @endforeach
            </ul>
          </li>
          <?php
            $customer_id = Session::get('customer_id');
            $shipping_id = Session::get('shipping_id');
            if($customer_id!=NULL && $shipping_id==NULL){
            ?>
            <li class="level0 parent drop-menu"><a href="{{URL::to('/checkout')}}"><span>Thanh Toán</span></a></li>
            <?php
            }elseif($customer_id!=NULL && $shipping_id!=NULL){
            ?>
            <li class="level0 parent drop-menu"><a href="{{URL::to('/payment')}}"><span>Thanh Toán</span></a></li>
            <?php
            }else{
            ?>
            <li class="level0 parent drop-menu"><a href="{{URL::to('/login-checkout')}}"><span>Thanh Toán</span></a></li>
            <?php
            }
            ?>
          <li class="level0 parent drop-menu"><a href="blog.html"><span>Tổng Đài</span> </a>
          </li>
          <li class="level0 parent drop-menu"><a href="blog.html"><span>Tuyển Dụng</span> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- end nav --> 
  <!-- Slider -->
  <div id="magik-slideshow" class="magik-slideshow">
    <div class="wow">
      <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
          <ul>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/1.png')}}'>
                <img src="{{asset('public/frontend/images/1.png')}}" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/5.png')}}' class="black-text">
                <img src='{{asset('public/frontend/images/5.png')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/6.png')}}' class="black-text">
                <img src='{{asset('public/frontend/images/6.png')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/3.jpg')}}' class="black-text">
                <img src='{{asset('public/frontend/images/3.jpg')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/4.jpg')}}' class="black-text">
                <img src='{{asset('public/frontend/images/4.jpg')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/7.jpg')}}' class="black-text">
                <img src='{{asset('public/frontend/images/7.jpg')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>
            <li data-transition='random' data-slotamount='7' data-masterspeed='200' data-thumb='{{asset('public/frontend/images/7.jpg')}}' class="black-text">
                <img src='{{asset('public/frontend/images/8.jpg')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
            </li>

          </ul>
          <div class="tp-bannertimer"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- end Slider --> 
  <!-- header service -->
  <div class="header-service">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-truck">&nbsp;</div>
            <span><strong>FREE SHIPPING</strong> on order over $99</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-support">&nbsp;</div>
            <span><strong>Customer Support</strong> Service</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-money">&nbsp;</div>
            <span><strong>3 days Money Back</strong> Guarantee</span></div>
        </div>
        <div class="col-lg-3 col-sm-6 col-xs-12">
          <div class="content">
            <div class="icon-dis">&nbsp;</div>
            <span><strong class="orange">5% discount</strong> on order over $199</span></div>
        </div>
      </div>
    </div>
  </div>
  <!-- end header service --> 

  <!-- recommend slider -->
  <section class="recommend container">
    @yield('content')
  </section>
  <!-- End Recommend slider --> 
  <!-- Footer -->
  <footer class="footer">
    <div class="footer-middle container">
      <div class="col-md-3 col-sm-4">
        <div class="footer-logo"><a href="index.html" title="Logo"><img src="{{asset('public/frontend/images/gearvn-logo.png')}}" alt="logo"></a></div>
        <p></p>
        <div class="payment-accept">
          <div>
            <img style="width: 53px;height: 34px" src="{{asset('public/frontend/images/DISCOVER.jpg')}}" alt="payment"> 
            <img src="{{asset('public/frontend/images/payment-2.png')}}" alt="payment"> 
            <img src="{{asset('public/frontend/images/payment-3.png')}}" alt="payment"> 
            <img src="{{asset('public/frontend/images/payment-4.png')}}" alt="payment">
        </div>
        </div>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Hướng dẫn</h4>
        <ul class="links">
          <li class="first"><a title="How to buy">Cách mua</a></li>
          <li><a title="FAQs">Câu hỏi thường gặp</a></li>
          <li><a title="Payment">Thanh toán</a></li>
          <li><a title="Shipment&lt;/a&gt;">Giao hàng</a></li>
          <li><a title="delivery">Vận chuyển</a></li>
          <li class="last"><a title="Return policy">Chính sách</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Tư vấn</h4>
        <ul class="links">
          <li class="first"><a title="Your Account">Tài khoản</a></li>
          <li><a title="Information" >Thông tin</a></li>
          <li><a title="Addresses" >Địa chỉ</a></li>
          <li><a title="Addresses" >Sale</a></li>
          <li><a title="Orders History" >Lịch sử mua hàng</a></li>
          <li class="last"><a title=" Additional Information" >Thông tin thêm</a></li>
        </ul>
      </div>
      <div class="col-md-2 col-sm-4">
        <h4>Thông tin</h4>
        <ul class="links">
          <li class="first"><a title="Site Map">Bản đồ</a></li>
          <li><a  title="Search Terms">Điều khoản</a></li>
          <li><a  title="Advanced Search">Tìm kiếm nâng cao</a></li>
          <li><a title="Contact Us">Liên hệ</a></li>
          <li><a title="Suppliers">Nhà cung cấp</a></li>
          <li class=" last"><a href="#" title="Our stores" class="link-rss">Cửa hàng</a></li>
        </ul>
      </div>
      <div class="col-md-3 col-sm-4">
        <h4>Thông tin liên hệ</h4>
        <div class="contacts-info">
          <address>
          <i class="add-icon">&nbsp;</i>Chí Tân, Khoái Châu, <br>
          &nbsp;Hưng Yên
          </address>
          <div class="phone-footer"><i class="phone-icon">&nbsp;</i> +036 249 9454</div>
          <div class="email-footer"><i class="email-icon">&nbsp;</i> <a href="mailto:support@magikcommerce.com">abulick113@gmail.com</a> </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom container">
      <div class="col-sm-5 col-xs-12 coppyright" style="margin-left: 500px"> &copy; 2015 Magikcommerce. All Rights Reserved.</div>
    </div>
  </footer>
  <!-- End Footer --> 
</div>
<div class="social">
  <ul>
    <li class="fb"><a href="#"></a></li>
    <li class="tw"><a href="#"></a></li>
    <li class="googleplus"><a href="#"></a></li>
    <li class="rss"><a href="#"></a></li>
    <li class="pintrest"><a href="#"></a></li>
    <li class="linkedin"><a href="#"></a></li>
    <li class="youtube"><a href="#"></a></li>
  </ul>
</div>

<!-- JavaScript --> 
<script type="text/javascript" src="{{asset('public/frontend/js/jquery.min.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script> 
 
<script type="text/javascript" src="{{asset('public/frontend/js/common.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/frontend/js/revslider.js')}}"></script> 
<script type="text/javascript" src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script> 
<script type='text/javascript'>
jQuery(document).ready(function(){
jQuery('#rev_slider_4').show().revolution({
dottedOverlay: 'none',
delay: 5000,
startwidth: 1170,
startheight: 580,

hideThumbs: 200,
thumbWidth: 200,
thumbHeight: 50,
thumbAmount: 2,

navigationType: 'thumb',
navigationArrows: 'solo',
navigationStyle: 'round',

touchenabled: 'on',
onHoverStop: 'on',

swipe_velocity: 0.7,
swipe_min_touches: 1,
swipe_max_touches: 1,
drag_block_vertical: false,

spinner: 'spinner0',
keyboardNavigation: 'off',

navigationHAlign: 'center',
navigationVAlign: 'bottom',
navigationHOffset: 0,
navigationVOffset: 20,

soloArrowLeftHalign: 'left',
soloArrowLeftValign: 'center',
soloArrowLeftHOffset: 20,
soloArrowLeftVOffset: 0,

soloArrowRightHalign: 'right',
soloArrowRightValign: 'center',
soloArrowRightHOffset: 20,
soloArrowRightVOffset: 0,

shadow: 0,
fullWidth: 'on',
fullScreen: 'off',

stopLoop: 'off',
stopAfterLoops: -1,
stopAtSlide: -1,

shuffle: 'off',

autoHeight: 'off',
forceFullWidth: 'on',
fullScreenAlignForce: 'off',
minFullScreenHeight: 0,
hideNavDelayOnMobile: 1500,

hideThumbsOnMobile: 'off',
hideBulletsOnMobile: 'off',
hideArrowsOnMobile: 'off',
hideThumbsUnderResolution: 0,

hideSliderAtLimit: 0,
hideCaptionAtLimit: 0,
hideAllCaptionAtLilmit: 0,
startWithSlide: 0,
fullScreenOffsetContainer: ''
});
});
</script>
</body>

<!-- Mirrored from htmldemo.magikcommerce.com/ecommerce/inspire-html-template/furniture/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 13 Aug 2015 08:03:59 GMT -->
</html>
