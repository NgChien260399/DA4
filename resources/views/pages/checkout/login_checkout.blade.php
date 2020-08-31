@extends('layout')
@section('content')

	<section class="main-container col1-layout">
    <div class="main container">
      <div class="account-login">
        <div >
          <h2>Đăng nhập hoặc tạo tài khoản</h2>
        </div>
        <fieldset class="col2-set">
          <div class="col-1 new-users"><strong>Khách hàng mới</strong>
            <div class="content">
              <p>Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể chuyển qua quy trình thanh toán nhanh hơn, lưu trữ nhiều địa chỉ giao hàng, xem và theo dõi đơn hàng của bạn và hơn thế nữa.</p>
              <div class="buttons-set">
                <form action="{{URL::to('/add-customer')}}" method="POST">
							{{ csrf_field() }}
							<ul class="form-list">
                			<li>
                  			<label for="email">Họ và Tên<span class="required">*</span></label>
                  			<br>
                  			<input type="text" class="input-text required-entry" id="email" value="" name="customer_name" required="">
                			</li>
                			<li>
                  			<label for="pass">Email <span class="required">*</span></label>
                  			<br>
                  			<input type="email" class="input-text required-entry validate-password" name="customer_email" required="">
                			</li>
                			<li>
                  			<label for="email">Password<span class="required">*</span></label>
                  			<br>
                  			<input type="password" class="input-text required-entry" id="email" value="" name="customer_password" required="">
                			</li>
                			<li>
                  			<label for="email">Số điện thoại<span class="required">*</span></label>
                  			<br>
                  			<input type="text" class="input-text required-entry" id="email" value="" name="customer_phone" required="">
                			</li>
                			<p class="required">* Phần bắt buộc</p>
              				</ul>
							<button type="submit" class="button login"><span>Đăng ký</span></button>
							
						</form>
              </div>
            </div>
          </div>
          <div class="col-2 registered-users" style="height: 572px"><strong>Đăng nhập</strong>
            <div class="content">
              <p>Nếu bạn có tài khoản, vui lòng đăng nhập.</p>
              <?php
						$message = Session::get('message');
						if($message){
							echo '<h4>'.$message.'</h4>';
							Session::put('message',null);
						}
						?>
						<form action="{{URL::to('/login-customer')}}" method="POST">
							{{csrf_field()}}
              <ul class="form-list">
                <li>
                  <label for="email">Email<span class="required">*</span></label>
                  <br>
                  <input type="text" class="input-text required-entry" id="email" value="" name="email_account">
                </li>
                <li>
                  <label for="pass">Password <span class="required">*</span></label>
                  <br>
                  <input type="password" title="Password" id="pass" class="input-text required-entry validate-password" name="password_account">
                </li>
              </ul>
              <p class="required">* Phần bắt buộc</p>
              <div class="buttons-set">
                <button id="send2" name="send" type="submit" class="button login"><span>Đăng nhập</span></button>
                 </div>
             </form>
            </div>
          </div>
        </fieldset>
      </div>
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