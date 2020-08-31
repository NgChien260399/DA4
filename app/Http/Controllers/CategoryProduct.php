<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class CategoryProduct extends Controller
{
    public function AuthLogin(){ #kiểm tra đăng nhập
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }


    public function add_category_product(){
        $this->AuthLogin();
    	return view('admin.add_category_product');
    }
    public function all_category_product(){

        $this->AuthLogin();
    	$all_category_product=DB::table('tbl_category_product')->get();
    	$manager_category_product = view('admin.all_category_product')->with('all_category_product',$all_category_product);
		return view('admin_layout')->with('admin.all_category_product',$manager_category_product);
    }

    public function save_category_product(Request $request){ //hàm lưu danh mục sản phẩm
        $this->AuthLogin();
    	$data = array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	$data['category_status'] = $request->category_product_status;

    	DB::table('tbl_category_product')->insert($data);
    	Session::put('message','Thêm danh mục sản phảm thành công !!!');
    	return Redirect::to('add-category-product');
    }
    //ẩn
    public function unactive_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>1]);
    	Session::put('message','Ẩn danh mục sản phẩm thành công !!!');
    	return Redirect::to('all-category-product');
    }
    //hiển thị
    public function active_category_product($category_product_id){
        $this->AuthLogin();
		DB::table('tbl_category_product')->where('category_id',$category_product_id)->update(['category_status'=>0]);
    	Session::put('message','Hiển thị danh mục sản phẩm thành công !!!');
    	return Redirect::to('all-category-product');
    }

    //sửa
    public function edit_category_product($category_product_id){
        $this->AuthLogin();
    	$edit_category_product=DB::table('tbl_category_product')->where('category_id',$category_product_id)->get();
    	$manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);
		return view('admin_layout')->with('admin.edit_category_product',$manager_category_product);
    }
    //cập nhật sau khi sửa
    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
    	$data=array();
    	$data['category_name'] = $request->category_product_name;
    	$data['category_desc'] = $request->category_product_desc;
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->update($data);
    	Session::put('message','Cập nhật thành công !!!');
    	return Redirect::to('all-category-product');
    }
    //xóa
    public function delete_category_product($category_product_id){
        $this->AuthLogin();
    	DB::table('tbl_category_product')->where('category_id',$category_product_id)->delete();
    	Session::put('message','Xóa danh mục sản phẩm thành công !!!');
    	return Redirect::to('all-category-product');
    }
    //kết thúc bên admin


    public function show_category_home($category_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_name')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_name')->get();

        $category_by_id = DB::table('tbl_product')->join('tbl_category_product','tbl_product.category_id','=','tbl_category_product.category_id')->where('tbl_product.category_id',$category_id)->where('product_status','0')->get();

        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$category_id)->limit(1)->get();

        return view('pages.category.show_category')->with('category',$cate_product)->with('brand',$brand_product)->with('category_by_id',$category_by_id)->with('category_name',$category_name);
    }
}
