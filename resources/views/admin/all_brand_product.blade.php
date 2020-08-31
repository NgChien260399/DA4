@extends('admin_layout')
@section('admin_content')
        <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thương hiệu sản phẩm
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
            <th>Tên danh mục</th>
            <th>Ẩn/Hiển thị</th>
            <th>Mô tả</th>
            {{-- <th style="width:30px;"></th> --}}
          </tr>
        </thead>
        <tbody>

        @foreach($all_brand_product as $key =>$brand_pro)

          <tr>
            <td>{{$brand_pro->brand_name}}</td>
            <td><span class="text-ellipsis">

              <?php
              if ($brand_pro->brand_status==0) {
                ?>
                <a href="{{URL::to('/unactive-brand-product/'.$brand_pro->brand_id)}}">
                  <span class="fa-thumb-styling fa fa-thumbs-up"></span>
                </a>
                <?php
                }else{
                ?>
                <a href="{{URL::to('/active-brand-product/'.$brand_pro->brand_id)}}">
                  <span class="fa-thumb-styling fa fa-thumbs-down"></span>
                </a>
                <?php
              }
              ?>

            </span></td>
            <td>{{$brand_pro->brand_desc}}</td>
            {{-- <td>
              <a href="{{URL::to('/edit-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit"ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
              </a>
              <a onclick="return confirm('Bạn có thực sự muốn xóa danh mục này ???')" href="{{URL::to('/delete-brand-product/'.$brand_pro->brand_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td> --}}
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
          {{$all_brand_product->links()}}
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection