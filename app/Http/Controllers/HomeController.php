<?php

namespace App\Http\Controllers;

use DB;

use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

    	$cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_name')->get();
    	$brand_product=DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_name')->get();

    	$all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(12)->get();
        $all_product1 = DB::table('tbl_product')->where('product_status','0')->orderby('product_name')->paginate(12);

    	return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('all_product1',$all_product1);
    }

    public function search(Request $request){
    	$keywords = $request->keywords_submit;

    	$cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderby('category_name')->get();
    	$brand_product=DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_name')->get();

    	$search_product = DB::table('tbl_product')
        ->where('product_status','0')
    	->where('product_name','like','%'.$keywords.'%')
    	->orwhere('product_price',$keywords)->get();


        return view('pages.sanpham.search')
        ->with('category',$cate_product)
        ->with('brand',$brand_product)
        ->with('search_product',$search_product);
    }
}
