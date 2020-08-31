@extends('layout')
@section('content')

	<section class="main-container col1-layout" style="margin-left: 290px">
    <div class="main container">
      <div class="account-login">
        <div >
          <h2>Vui lòng điền thông tin nhận hàng :</h2>
        </div>
        <fieldset class="col2-set">
          <div class="col-1 new-users">
            <div class="content">
              <div class="buttons-set">
                <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
							{{ csrf_field() }}
							<ul class="form-list">
                			<li>
                  			<label for="email">Họ và Tên<span class="required">*</span></label>
                  			<br>
                  			<input type="text" class="input-text required-entry" id="email" value=""name="shipping_name"  required="">
                			</li>
                			<li>
                  			<label for="pass">Email <span class="required">*</span></label>
                  			<br>
                  			<input type="email" class="input-text required-entry validate-password" name="shipping_email" required="">
                			</li>
                			<li>
                  			<label for="email">Địa chỉ<span class="required">*</span></label>
                  			<br>
                  			<input type="text" class="input-text required-entry" id="email" value="" name="shipping_address" required="">
                			</li>
                			<li>
                  			<label for="email">Số điện thoại<span class="required">*</span></label>
                  			<br>
                  			<input type="text" class="input-text required-entry" id="email" value="" name="shipping_phone" required="">
                			</li>
                			<li>
                  			<label for="email">Ghi chú<span class="required">*</span></label>
                  			<br>
                  			 <textarea style="width: 366px;height: 150px" name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" required="" ></textarea>
                			</li>
                			<p class="required">* Phần bắt buộc</p>
              				</ul>
							<button type="submit" class="button login"><span>Gửi</span></button>
							
						</form>
              </div>
            </div>
          </div>
        </fieldset>
      </div>
      <br>
      <br>
      <br>
    </div>
  </section>
<style type="text/css">
	h4{
		color: red;
	}
</style>
@endsection