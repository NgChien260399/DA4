@extends('admin_layout')
@section('admin_content')

<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thông tin khách hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>

            <th>Người nhận</th>
            <th>Địa chỉ</th>
            <th>Email</th>
            <th>SDT</th>
            <th>ghi chú</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            
            <td>{{$order_by_id->shipping_name}}</td>
            <td>{{$order_by_id->shipping_address}}</td>
            <td>{{$order_by_id->shipping_email}}</td>
            <td>{{$order_by_id->shipping_phone}}</td>
            <td>{{$order_by_id->shipping_notes}}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div> <br>
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết đơn hàng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>ID</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          @foreach($order_by_id1 as $key =>$order)
          <tr>
            <td>{{$order->product_id}}</td>
            <td>{{$order->product_name}}</td>
            <td>{{$order->product_sales_quantity}}</td>
            <td>{{number_format($order->product_price)}} vnđ</td>
          </tr>
          @endforeach
        </tbody>
        <td style="color: red;font-size: 20px;background: white">Tổng tiền : {{$order->order_total}} vnđ</td>
      </table>
      
    </div>
  </div>
</div>
@endsection