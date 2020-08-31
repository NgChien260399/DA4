@extends('admin_layout')
@section('admin_content')
        <div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thương hiệu sản phẩm
                        </header>



                        <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>



                        <div class="panel-body">
                            @foreach($edit_customer as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-customer/'.$edit_value->admin_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text" value="{{$edit_value->admin_email}}" name="admin_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="text" value="{{$edit_value->admin_password}}" name="admin_password" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Họ Tên</label>
                                    <input type="text" name="admin_name" value="{{$edit_value->admin_name}}" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Phone</label>
                                    <input type="text" name="admin_phone" value="{{$edit_value->admin_phone}}" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chức Năng</label>
                                    <input type="text" name="function" value="{{$edit_value->function}}" class="form-control" id="exampleInputEmail1" placeholder="Password">
                                </div>



                                
                                <button type="submit" class="btn btn-info" name="add_customer">Cập nhật admin</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>

            </div>
@endsection