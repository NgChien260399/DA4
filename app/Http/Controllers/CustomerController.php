<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function AuthLogin(){ #kiểm tra đăng nhập
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function all_customer(){

        $this->AuthLogin();
    	$all_customer=DB::table('tbl_customers')->get();
    	$all_admin=DB::table('tbl_admin')->get();
    	$manager_customer = view('admin.all_customer')->with('all_customer',$all_customer)->with('all_admin',$all_admin);
		return view('admin_layout')->with('admin.all_customer',$manager_customer);
    }



    public function add_customer(){
        $this->AuthLogin();
    	return view('admin.add_customer');
    }
    public function save_customer(Request $request){ //hàm lưu
        $this->AuthLogin();
    	$data = array();
    	$data['admin_email'] = $request->admin_email;
    	$data['admin_password'] = $request->admin_password;
    	$data['admin_name'] = $request->admin_name;
    	$data['admin_phone'] = $request->admin_phone;
    	$data['function'] = $request->function;

    	DB::table('tbl_admin')->insert($data);
    	Session::put('message','Thêm admin thành công !!!');
    	return Redirect::to('add-customer');
    }
    //sửa
    public function edit_customer($admin_id){
        $this->AuthLogin();

    	$edit_customer=DB::table('tbl_admin')->where('admin_id',$admin_id)->get();
    	$manager_customer = view('admin.edit_customer')->with('edit_customer',$edit_customer);
		return view('admin_layout')->with('admin.edit_customer',$manager_customer);
    }
    //cập nhật sau khi sửa
    public function update_customer(Request $request,$admin_id){
        $this->AuthLogin();
    	$data=array();
    	$data['admin_email'] = $request->admin_email;
    	$data['admin_password'] = $request->admin_password;
    	$data['admin_name'] = $request->admin_name;
    	$data['admin_phone'] = $request->admin_phone;
    	$data['function'] = $request->function;
    	DB::table('tbl_admin')->where('admin_id',$admin_id)->update($data);
    	Session::put('message','Cập nhật thành công !!!');
    	return Redirect::to('all-customer');
    }
    //xóa
    public function delete_customer($admin_id){
        $this->AuthLogin();
    	DB::table('tbl_admin')->where('admin_id',$admin_id)->delete();
    	Session::put('message','Xóa admin thành công !!!');
    	return Redirect::to('all-customer');
    }
}
