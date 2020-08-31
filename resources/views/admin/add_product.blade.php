@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>



                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>



                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="required" data-validation-error-msg="Vui lòng không để trống !!!" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Vui lòng điền dạng số !!!" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control" data-validation="required" data-validation-error-msg="Vui lòng không để trống !!!" name="product_desc" id="ckeditor" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Giới thiệu sản phẩm</label>
                                    <textarea class="form-control" data-validation="required" data-validation-error-msg="Vui lòng không để trống !!!" name="product_content" id="ckeditor1" placeholder="Nội dung"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select class="form-control input-sm m-bot15" name="product_cate">
                                        @foreach($cate_product as $key =>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu</label>
                                    <select class="form-control input-sm m-bot15" name="product_brand">
                                        @foreach($brand_product as $key =>$brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="product_status">
                                        <option value="1">Ẩn</option>
                                        <option value="0">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info" name="add_product">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

            </div>
@endsection