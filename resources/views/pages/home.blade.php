@extends('layout')
@section('content')
<div style="width: 100%;overflow-x: hidden; ">
    <div class="new-pro-slider small-pr-slider">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2>SẢN PHẨM MỚI</h2>
        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col3">
            <!-- Item -->
            @foreach($all_product as $key =>$product)
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
    <br></br>
    <div class="features_items"><!--features_items-->

                        <div class="new_title center">
                          <h2>SẢN PHẨM</h2>
                        </div>
                        @foreach($all_product1 as $key =>$product1)
                        <div class="item">
              <div class="col-item">
                        <a href="{{URL::to('chi-tiet-san-pham/'.$product1->product_id)}}">
                        <div class="col-sm-2">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                      <img src="{{URL::to('public/uploads/product/'.$product1->product_image)}}" class="img-responsive" alt="a" />
                                        <form action="{{URL::to('/save-cart')}}" method="POST">
                                        {{ csrf_field() }}
                                        <p class="special-price"> <span class="price">{{number_format($product1->product_price)}} vnđ </span> </p>
                                        <div class="item-title"> <a title=" Sample Product" href="{{URL::to('chi-tiet-san-pham/'.$product1->product_id)}}">{{$product1->product_name}}</a> </div>
                                        <input type="hidden" name="qty" value="1">
                                        <input name="productid_hidden" type="hidden"  value="{{$product1->product_id}}" />
                                        <button type="submit" title="Add to Cart" class="button btn-cart"><i class="fa fa-shopping-cart"></i><span> Thêm giỏ hàng</span></button>
                                        </form>

                                    </div>
                                </div>
                            <div class="choose">
                                </div>
                            </div>
                        </div>
                    </a>
                  </div>
                </div>
                        @endforeach
                    </div><!--features_items-->

                    <div style="width: 100%;float: left;margin-left: 40%">{{$all_product1->links()}}</div>

</div>
@endsection