@extends('layout')
@section('content')

<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div >
            <h2>Xem lại giỏ hàng</h2>
          </div>
          <div class="table-responsive">
              <fieldset>
              	<?php
				$content = Cart::content();

				?>
                <table class="data-table cart-table" id="shopping-cart-table">
                  
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">Hình ảnh</th>
                      <th rowspan="1"><span class="nobr">Tên sản phẩm</span></th>
                      
                      <th colspan="1" class="a-center"><span class="nobr">Giá</span></th>
                      <th class="a-center" rowspan="1">Số lượng</th>
                      <th colspan="1" class="a-center">Tổng tiền</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      <td class="a-right last" colspan="50"><button onclick="setLocation('#')" class="button btn-continue" title="Continue Shopping" type="button"><span><a href="{{URL::to('/trang-chu')}}"><span>Tiếp tục mua sắm</span></a></span></button>
                        
                    </tr>
                  </tfoot>
                  <tbody>
                  	@foreach($content as $v_content)
                    <tr class="first odd">
                      <td class="image"><a><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="50" alt="" /></a></td>
                      <td><h2 class="product-name"> <p><a style="color: black">{{$v_content->name}}</a></p> </h2></td>
                      
                      <td class="a-right"><span class="cart-price"> <span class="price">{{number_format($v_content->price)}} vnđ</span> </span></td>
                      <td class="a-center movewishlist">
                      	
                      	<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart-quantity')}}" method="POST" >
									{{ csrf_field() }}
									<input style="width: 50px" class="input-text qty" type="text" name="cart_quantity" value="{{$v_content->qty}}"  >
									<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form-control">
									<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
									</form>
						</div>
                      </td>
                      <td class="a-right movewishlist"><span class="cart-price"> <span class="price"><?php
									$subtotal = $v_content->price * $v_content->qty;
									echo number_format($subtotal);
									?> vnđ</span> </span></td>
                      <td class="a-center last"><a class="button remove-item" title="Remove item" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </fieldset>
          </div>
          <!-- BEGIN CART COLLATERALS -->
            <h4 style="margin:40px 0;font-size: 20px">Chọn hình thức thanh toán</h4>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{ csrf_field() }}
			<div class="payment-options">
					<span style="padding-right: 20px">
						<label><input name="payment_option" value="1" type="radio"> Thanh toán bằng thẻ ATM </label>
					</span>
					<span style="padding-right: 20px">
						<label><input name="payment_option" value="2" type="radio"> Thanh toán khi nhận hàng </label>
					</span>
					<span style="padding-right: 20px">
						<label><input name="payment_option" value="3" type="radio"> Thanh toán bằng thẻ ghi nợ </label>
					</span>
					<input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
			</div>
			</form>
          </div>
          
          <!--cart-collaterals--> 
          
        </div>
      </div>
    </div>
  </section>
@endsection