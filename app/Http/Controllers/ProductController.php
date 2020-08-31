<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

	public function AuthLogin(){ #kiểm tra đăng nhập
        $admin_id=Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }


    public function add_product(){
    	$this->AuthLogin();
    	$cate_product=DB::table('tbl_category_product')->orderby('category_id','desc')->get();
    	$brand_product=DB::table('tbl_brand')->orderby('brand_id','desc')->get();
    	return view('admin.add_product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
    }
    public function all_product(){

		$this->AuthLogin();
    	$all_product=DB::table('tbl_product')
    	->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
    	->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')->paginate(8);
    	$manager_product = view('admin.all_product')->with('all_product',$all_product);
		return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request){ //hàm lưu sản phẩm
    	$this->AuthLogin();
    	$data = array(); //khởi tạo mảng
    	$data['product_name'] = $request->product_name;
    	$data['product_price'] = $request->product_price;
    	$data['product_desc'] = $request->product_desc;
    	$data['product_content'] = $request->product_content;
    	$data['category_id'] = $request->product_cate;
    	$data['brand_id'] = $request->product_brand;
    	$data['product_status'] = $request->product_status;
    	$data['product_image'] = $request->product_image;
    	$get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();//Tên ảnh + đánh số từ 0->99 cho ảnh mới + . + đuôi ảnh (.jpg,.jpeg,.png,...)
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
    	Session::put('message','Thêm sản phẩm thất bại !!!');
    	return Redirect::to('add-product');
    }
    //ẩn
    public function unactive_product($product_id){
    	$this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>1]);
    	Session::put('message','Ẩn sản phẩm thành công !!!');
    	return Redirect::to('all-product');
    }
    //hiển thị
    public function active_product($product_id){
    	$this->AuthLogin();
		DB::table('tbl_product')->where('product_id',$product_id)->update(['product_status'=>0]);
    	Session::put('message','Hiển thị sản phẩm thành công !!!');
    	return Redirect::to('all-product');
    }

    //sửa
    public function edit_product($product_id){
    	$this->AuthLogin();
    	$cate_product = DB::table('tbl_category_product')->get();
    	$brand_product=DB::table('tbl_brand')->get();
    	$edit_product=DB::table('tbl_product')->where('product_id',$product_id)->get();
    	$manager_product = view('admin.edit_product')->with('edit_product',$edit_product)
    	->with('cate_product',$cate_product)
    	->with('brand_product',$brand_product);
		return view('admin_layout')->with('admin.edit_product',$manager_product);
    }
    //cập nhật sau khi sửa
    public function update_product(Request $request,$product_id){
    	$this->AuthLogin();
    	$data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')->where('product_id',$product_id)->update($data);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        Session::put('message','Cập nhật sản phẩm thất bại');
        return Redirect::to('all-product');
    }
    //xóa
    public function delete_product($product_id){
    	$this->AuthLogin();
    	DB::table('tbl_product')->where('product_id',$product_id)->delete();
    	Session::put('message','Xóa sản phẩm thành công !!!');
    	return Redirect::to('all-product');
    }
    //kết thúc admin


    //chi tiết sản phẩm
    public function details_product($product_id){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_name')->get();
        $brand_product=DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_name')->get();

        $details_product = DB::table('tbl_product')
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        ->where('tbl_product.product_id',$product_id)->get();

        foreach ($details_product as $key => $value) {
            $category_id = $value->category_id;
        }

        $related_product = DB::table('tbl_product') //san pham lien quan
        ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        ->where('tbl_category_product.category_id',$category_id)->where('product_status','0')
        ->whereNotIn('tbl_product.product_id',[$product_id])
        ->get();

        return view('pages.sanpham.show_details')
        ->with('category',$cate_product)->with('brand',$brand_product)
        ->with('product_details',$details_product)
        ->with('relate',$related_product);
    }
}
