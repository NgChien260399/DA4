@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
                        <div class="new_title center">
                          <h2>Kết quả tìm kiếm</h2>
                        </div>
                        @foreach($search_product as $key => $product)
                        <div class="item">
              <div class="col-item">
                        <a href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">
                        <div class="col-sm-2">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                      <img src="{{URL::to('public/uploads/product/'.$product->product_image)}}" class="img-responsive" alt="a" />
                                        <form action="{{URL::to('/save-cart')}}" method="POST">
                                        {{ csrf_field() }}
                                        <p class="special-price"> <span class="price">{{number_format($product->product_price)}} vnđ </span> </p>
                                        <div class="item-title"> <a title=" Sample Product" href="{{URL::to('chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a> </div>
                                        <input type="hidden" name="qty" value="1">
                                        <input name="productid_hidden" type="hidden"  value="{{$product->product_id}}" />
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
@endsection