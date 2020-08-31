@extends('layout')
@section('content')

<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="cart wow">
          <div class="page-title">
            <h2>shopping cart</h2>
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
                      <td class="a-right movewishlist"><span class="cart-price"> 
                        <span class="price">
                          <?php
									         $subtotal = $v_content->price * $v_content->qty;
									         echo number_format($subtotal);
									         ?> vnđ
                         </span> </span></td>
                      <td class="a-center last"><a class="button remove-item" title="Remove item" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </fieldset>
          </div>
          <!-- BEGIN CART COLLATERALS -->
            <div class="totals col-sm-4">
              <h3></h3>
              <div class="inner">
                <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                  <colgroup>
                  <col>
                  <col width="1">
                  </colgroup>
                  <tfoot>
                    <tr>
                      <td colspan="1" class="a-left" style=""><strong>Thành tiền</strong></td>
                      <td class="a-right" style=""><strong><span class="price"><span>{{Cart::subtotal()}} đ</span></span></strong></td>
                    </tr>
                  </tfoot>
                  <tbody>
                    <tr>
                      <td colspan="1" class="a-left" style=""> Tổng tiền </td>
                      <td class="a-right" style=""><span class="price"><span>{{Cart::subtotal()}} vnđ</span></span></td>
                    </tr>
                    <tr>
                      <td colspan="1" class="a-left" style=""> Phí vận chuyển </td>
                      <td class="a-right" style=""><span class="price"><span>Free</span></span></td>
                    </tr>
                  </tbody>
                </table>
                <ul class="checkout">
                  <li>
                  	<?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){
                                 ?>
                    <a href="{{URL::to('/checkout')}}"><button class="button btn-proceed-checkout" type="button"><span>thanh toán</span></button></a>
                    <?php
                            }else{
                                 ?>
					<a href="{{URL::to('/login-checkout')}}"><button class="button btn-proceed-checkout" type="button"><span>thanh toán</span></button></a>
                                 <?php
                             }
                                 ?>
                  </li>
                  <br>
                  
                  <br>
                </ul>
              </div>
              <!--inner--> 
              
            </div>
          </div>
          
          <!--cart-collaterals--> 
          
        </div>
      </div>
    </div>
  </section>

@endsection