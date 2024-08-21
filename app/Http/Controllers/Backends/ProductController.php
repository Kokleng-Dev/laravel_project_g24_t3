<?php

namespace App\Http\Controllers\backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    public function index(Request $r){

        $search = $r->search;
        $data['products'] = DB::table('products')
            ->join('product_categories','product_categories.id','products.product_category_id')
            ->where(function($query) use ($search) {
                $query->where('products.name','LIKE',"%$search%");
                $query->orWhere('product_categories.name','LIKE',"%$search%");
                $query->orWhere('products.price','LIKE',"%$search%");
                $query->orWhere('products.note','LIKE',"%$search%");
            })
            ->select('products.*','product_categories.name as product_category_name')
            ->paginate(10);

        $data['search'] = $search;
        return view('backends.products.index', $data);
    }

    public function create(){
        $data['product_categories'] = DB::table('product_categories')->get();

        return view('backends.products.create', $data);
    }

    public function store(Request $r){
        $data = $r->except('_token');

        $i = DB::table('products')->insert($data);

        if($i){
            return redirect()->route('admin.product')->with(['status' => 'success', 'sms' => __('Insert Succesffully')]);
        }
        return redirect()->route('admin.product')->with(['status' => 'error', 'sms' => __('Insert Fail')]);
    }

    public function edit($product_id){
        $find = DB::table('products')->find($product_id);
        if(!$find){
            return redirect()->route('admin.product')->with(['status' => 'error', 'sms' => __('Product Not Found')]);
        }
        $cat = DB::table('product_categories')->get();

        return view('backends.products.edit', ['product' => $find, 'product_categories' => $cat]);
    }
    public function update(Request $r, $product_id){
        $find = DB::table('products')->find($product_id);
        if(!$find){
            return redirect()->route('admin.product')->with(['status' => 'error', 'sms' => __('Product Not Found')]);
        }

        $u = DB::table('products')->where('id', $product_id)->update($r->except('_token'));
        if($u){
            return redirect()->route('admin.product')->with(['status' => 'success', 'sms' => __('Update Succesffully')]);
        }
        return redirect()->route('admin.product')->with(['status' => 'error', 'sms' => __('Update Fail')]);
    }

    public function delete($product_id){
        $find = DB::table('products')->find($product_id);
        if(!$find){
            return redirect()->route('admin.product')->with(['status' => 'error', 'sms' => __('Product Not Found')]);
        }
        $d = DB::table('products')->where('id', $product_id)->delete();
        if($d){
            return redirect()->route('admin.product')->with(['status' => 'success', 'sms' => __('Delete Succesffully')]);
        }
        return redirect()->route('admin.product')->with(['status' => 'error', 'sms' => __('Delete Fail')]);
    }
}
