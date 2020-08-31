@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
<div class="panel panel-default">
    <div class="panel-heading">
      ADMIN
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
            <th>Chức năng</th>
            <th></th>
          </tr>
        </thead>
        <tbody>

        @foreach($all_admin as $key =>$all_customer1)

          <tr>
            <td>{{$all_customer1->admin_name}}</td>
            <td>{{$all_customer1->admin_email}}</td>
            <td><a type="password">{{$all_customer1->admin_password}}</a></td>
            <td>{{$all_customer1->admin_phone}}</td>
            <td>{{$all_customer1->function}}</td>
            <td>
              <a href="{{URL::to('/edit-customer/'.$all_customer1->admin_id)}}" class="active styling-edit"ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có thực sự muốn xóa danh mục này ???')" href="{{URL::to('/delete-customer/'.$all_customer1->admin_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">

        </div>
        <div class="col-sm-7 text-right text-center-xs">
        </div>
      </div>
    </footer>
  </div>
</div>
  <br>
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      KHÁCH HÀNG
    </div>

    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Họ Tên</th>
            <th>Email</th>
            <th>Password</th>
            <th>Phone</th>
          </tr>
        </thead>
        <tbody>

        @foreach($all_customer as $key =>$all_customer)

          <tr>
            <td>{{$all_customer->customer_name}}</td>
            <td>{{$all_customer->customer_email}}</td>
            <td><a>{{$all_customer->customer_password}}</a></td>
            <td>{{$all_customer->customer_phone}}</td>
            
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-5 text-center">

        </div>
        <div class="col-sm-7 text-right text-center-xs">                
        </div>
      </div>
    </footer>
  </div>

</div>
@endsection