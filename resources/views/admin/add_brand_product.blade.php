@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
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
                                <form role="form" action="{{URL::to('/save-brand-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" data-validation="required" data-validation-error-msg="Vui lòng không để trống !!!" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả</label>
                                    <textarea class="form-control"  name="brand_product_desc" id="ckeditor3" placeholder="Mô tả"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select class="form-control input-sm m-bot15" name="brand_product_status">
                                        <option value="1">Ẩn</option>
                                        <option value="0">Hiển thị</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info" name="add_brand_product">Thêm thương hiệu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

            </div>
@endsection