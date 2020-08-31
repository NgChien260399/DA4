@extends('layout')
@section('content')
@foreach($product_details as $key => $value)
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view wow">
            <div class="product-essential">
              <form action="{{URL::to('/save-cart')}}" method="post" id="product_addtocart_form">
              	{{ csrf_field() }}
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12">
                  
                    <img style="width: 350px;height: 350px;" src="{{URL::to('/public/uploads/product/'.$value->product_image)}}" alt="" />

                  
                </div>
                
                <!-- end: more-images -->
                
                <div class="product-shop col-lg-6 col-sm-6 col-xs-12" style="">
                  
                  <div class="product-name">
                    <h1>{{$value->product_name}}</h1>
                  </div>
                  
                  
                  <div class="price-block">
                    <div class="price-box">
                      
                      <p class="special-price"> <span class="price">Giá : {{number_format($value->product_price)}} vnđ </span> </p>
                    </div>
                  </div>
                  <div class="short-description">
                    <p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mới 100%</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
                  </div>
                  <div class="add-to-box">
                    <div class="add-to-cart">
                      <label for="qty">Số lượng : <input style="width: 50px" name="qty" type="number" min="1"  value="1"/></label>
                      <input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
                      <br>
                      <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="submit"><span><i class="icon-basket"></i> Thêm giỏ hàng</span></button>
                    </div>
                    
                  </div>
                  
                </div>
              </form>
            </div>
            <div class="product-collateral">
              <div class="col-sm-12 wow">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả </a> </li>
                  <li><a href="#product_tabs_tags" data-toggle="tab"> Giới thiệu </a></li>
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p>{!!$value->product_desc!!}</p>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="product_tabs_tags">
                    <div class="box-collateral box-tags">
                    	<p>{!!$value->product_content!!}</p>
                    </div>
                  </div>
                </div>
              </div>

              {{-- sản phẩm liên quan --}}
              <div class="col-sm-12">
                <div class="new-pro-slider small-pr-slider" style="overflow:visible">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2>SẢN PHẨM liên quan</h2>
        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col3"> 
            <!-- Item -->
            @foreach($relate as $key => $product)
            <div class="item">
              <div class="col-item">
                <div class="images-container"> <a class="product-image" title="Sample Product" href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}"> <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="img-responsive" alt="a" /> </a>
                  <div class="qv-button-container"> <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                </div>
                <form action="{{URL::to('/save-cart')}}" method="POST">
                  {{ csrf_field() }}
                <div class="info">
                  <div class="info-inner">
                    <div class="item-title"> <a title=" Sample Product" href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a> </div>
                    <!--item-title-->
                    <div class="item-content">
                      <div class="price-box">
                        <p class="special-price"> <span class="price">{{number_format($product->product_price)}} vnđ </span> </p>
                      </div>
                    </div>
                    <input type="hidden" name="qty" value="1">
                    <input name="productid_hidden" type="hidden"  value="{{$product->product_id}}" />
                    <!--item-content--> 
                  </div>
                  <!--info-inner-->
                  <div class="actions">
                    <button type="submit" title="Add to Cart" class="button btn-cart"><span>Thêm giỏ hàng</span></button>
                  </div>
                  <!--actions-->
                  <div class="clearfix"> </div>
                </div>
              </form>
              </div>
            </div>
            @endforeach
            <!-- End Item -->
          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endforeach
@endsection