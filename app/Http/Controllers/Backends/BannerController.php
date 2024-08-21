<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class BannerController extends Controller
{
    public function index(Request $r){
        $search = $r->search;

        $data['banners'] = DB::table('banners')
            // ->orWhere('name','LIKE',"%$search")
            ->paginate(10);
        $data['search'] = $search;
        return view('backends.banners.index', $data);
    }

    public function create(){

        return view('backends.banners.create');
    }

    public function edit($banner_id){
        $find = DB::table('banners')->find($banner_id);
        if(!$find){
            return redirect()->route('admin.banner')->with(['status' => 'error' , 'sms' => __('Not Found')]);
        }

        return view('backends.banners.edit', ['banner' => $find]);
    }

}
