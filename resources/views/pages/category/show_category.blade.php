@extends('layout')
@section('content')
<div class="new-pro-slider small-pr-slider" style="overflow:visible">
      <div class="slider-items-products">
        <div class="new_title center">
                          @foreach($category_name as $key => $name)
                        <h2>{{$name->category_name}}</h2>
                        @endforeach
                        </div>
        <div id="recommend-slider" class="product-flexslider hidden-buttons">
          <div class="slider-items slider-width-col3"> 
            <!-- Item -->
            @foreach($category_by_id as $key =>$product)
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
@endsection