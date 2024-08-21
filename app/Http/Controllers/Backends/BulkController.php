<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Storage;
use DB;

class BulkController extends Controller
{
    public function store(Request $r){
        $validate = Validator::make($r->all(),[
            'tbl' => 'required',
            'per' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with(['status' => 'errors', 'data' => $validate->errors() ]);
        }

        //check permission
        if(!checkPermission($r->per,'create')){
            return redirect()->route('admin.no_permission')->with(['status' => 'errors', 'sms' => __('No Permission') ]);
        }

        $data = $r->except('_token','photo','tbl','per');
        $data['created_by'] = auth()->user()->id;

        if($r->hasFile('photo')){
            $data['photo'] = $r->file('photo')->store('images/' . $r->tbl, 'custom');
        }
        $i = DB::table($r->tbl)->insert($data);

        if($i){
            return redirect()->back()->with(['status' => 'success', 'sms' => __('Insert Succesffully')]);
        }

        return redirect()->back()->with(['status' => 'error', 'sms' => __('Insert Fails')]);
    }
    public function update(Request $r, $bulk_id){
        $validate = Validator::make($r->all(),[
            'tbl' => 'required',
            'per' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with(['status' => 'errors', 'data' => $validate->errors() ]);
        }

        //check permission
        if(!checkPermission($r->per,'edit')){
            return redirect()->route('admin.no_permission')->with(['status' => 'errors', 'sms' => __('No Permission') ]);
        }
        // find
        $find = DB::table($r->tbl)->find($bulk_id);
        if(!$find){
            return redirect()->back()->with(['status' => 'error', 'sms' => __('Not Found') ]);
        }

        $data = $r->except('_token','photo','tbl','per');
        $data['updated_by'] = auth()->user()->id;

        if($r->hasFile('photo')){
            $data['photo'] = $r->file('photo')->store('images/' . $r->tbl, 'custom');
            if(Storage::disk('custom')->exists($find->photo)){
                Storage::disk('custom')->delete($find->photo);
            }
        }
        $u = DB::table($r->tbl)->where('id',$bulk_id)->update($data);

        if($u){
            return redirect()->back()->with(['status' => 'success', 'sms' => __('Update Succesffully')]);
        }

        return redirect()->back()->with(['status' => 'error', 'sms' => __('Update Fails')]);
    }
    public function delete(Request $r, $bulk_id){
        $validate = Validator::make($r->all(),[
            'tbl' => 'required',
            'per' => 'required',
        ]);

        if($validate->fails()){
            return redirect()->back()->with(['status' => 'errors', 'data' => $validate->errors() ]);
        }

        //check permission
        if(!checkPermission($r->per,'delete')){
            return redirect()->route('admin.no_permission')->with(['status' => 'errors', 'sms' => __('No Permission') ]);
        }
        // find
        $find = DB::table($r->tbl)->find($bulk_id);
        if(!$find){
            return redirect()->back()->with(['status' => 'error', 'sms' => __('Not Found') ]);
        }

        if(Storage::disk('custom')->exists($find->photo)){
            Storage::disk('custom')->delete($find->photo);
        }
        $d = DB::table($r->tbl)->where('id',$bulk_id)->delete();

        if($d){
            return redirect()->back()->with(['status' => 'success', 'sms' => __('Delete Succesffully')]);
        }

        return redirect()->back()->with(['status' => 'error', 'sms' => __('Delete Fails')]);
    }
}
