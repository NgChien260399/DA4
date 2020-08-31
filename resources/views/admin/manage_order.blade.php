@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
            <?php
            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>                
    <div class="table-responsive">
                      
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th>Tên đăng nhập</th>
            <th>Tên người đặt</th>
            <th>Địa chỉ</th>
            <th>SDT</th>
            <th>Tình trạng</th>
            <th>Chi tiết</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($all_order as $key => $order)
          <tr>
            <td>{{ $order->customer_email }}</td>
            <td>{{ $order->shipping_name }}</td>
            <td>{{ $order->shipping_address }}</td>
            <td>{{ $order->shipping_phone }}</td>
            <td>{{ $order->order_status }}</td>
           
            <td>
              <a href="{{URL::to('/view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i style="margin-left: 20px" class="fa fa-pencil-square-o text-success text-active"></i></a>
              {{-- <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng không?')" href="{{URL::to('/delete-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a> --}}
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
          {{$all_order->links()}}
        </div>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection