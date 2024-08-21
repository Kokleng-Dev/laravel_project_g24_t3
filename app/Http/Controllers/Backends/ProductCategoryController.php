<?php

namespace App\Http\Controllers\backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use DB;

class ProductCategoryController extends Controller
{
    public function index(){

        $data['product_categories'] = DB::table('product_categories')->paginate(10);

        return view('backends.product_categories.index', $data);
    }
    public function create(){
        return view('backends.product_categories.create');
    }
    public function store(Request $r){

        $data = $r->except('_token');

        $i = DB::table('product_categories')->insert($data);

        $sms = ['status' => 'error', 'sms' => __('Insert Fail')];
        if($i){
            $sms = ['status' => 'success', 'sms' => __('Insert Succesffully')];
        }


        return redirect()->route('admin.product.category')->with($sms);
    }

    public function edit($product_category_id){
        $data['product_category'] = DB::table('product_categories')->find($product_category_id);

        if(!$data['product_category']){
            return redirect()->route('admin.product.category')->with(['status' => 'warning', 'sms' => "Not Found"]);
        }

        return view('backends.product_categories.edit',$data);
    }

    public function update(Request $r, $product_category_id){
        $find = DB::table('product_categories')->find($product_category_id);
        if(!$find){
            return redirect()->route('admin.product.category')->with(['status' => 'warning', 'sms' => "Not Found"]);
        }

        $u = DB::table('product_categories')->where('id', $product_category_id)->update($r->except('_token'));

        $sms = ['status' => 'error', 'sms' => __('Update Fail')];
        if($u){
            $sms = ['status' => 'success', 'sms' => __('Update Succesffully')];
        }

        return redirect()->route('admin.product.category')->with($sms);
    }

    public function delete($product_category_id){
        $find = DB::table('product_categories')->find($product_category_id);
        if(!$find){
            return redirect()->route('admin.product.category')->with(['status' => 'warning', 'sms' => "Not Found"]);
        }
        $findBelongToProduct = DB::table('products')->where('product_category_id', $product_category_id)->exists();
        if($findBelongToProduct){
            return redirect()->route('admin.product.category')->with(['status' => 'warning', 'sms' => "This Data is belong to product, please delete product before delete this category"]);
        }
        $d = DB::table('product_categories')->where('id', $product_category_id)->delete();

        $sms = ['status' => 'error', 'sms' => __('Delete Fail')];
        if($d){
            $sms = ['status' => 'success', 'sms' => __('Delete Succesffully')];
        }

        return redirect()->route('admin.product.category')->with($sms);

    }
}
