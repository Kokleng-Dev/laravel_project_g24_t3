<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Hash;
use Validator;
use Storage;

class UserController extends Controller
{
    public function index(){

        $data['users'] = DB::table('users')
                    ->join('roles','roles.id','users.role_id');
        if(auth()->user()->id != 1){
            $data['users'] = $data['users']
                    ->where('users.id','!=',1);
        }

        $data['users'] = $data['users']->select('users.*','roles.name as role_name')
                    ->paginate(10);

        return view('backends.users.index', $data);
    }
    public function create(){
        $data['roles'] = DB::table('roles')->where('id','!=', auth()->user()->id == 1 ? null : 1)->get();
        return view('backends.users.create', $data);
    }
    public function store(Request $r){

        $validation = Validator::make($r->all(),[
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'role_id' => 'required|numeric'
        ]);

        if($validation->fails()){
            return redirect()->route('admin.user')->with(['status' => 'errors', 'data' => $validation->errors()]);
        }

        $name = $r->name;
        $username = $r->username;
        $password = Hash::make($r->password);
        $email = $r->email;
        $role_id = $r->role_id;


        $i = DB::table('users')->insert([
            'name' => $name,
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role_id' => $role_id,
            'created_at' => date('Y-m-d H:i:s'),
            'photo' => $r->hasFile('photo') ? $r->file('photo')->store('images/photo','custom') : null
        ]);



        if($i == true){
            return redirect()->route('admin.user')->with(['status' => 'success', 'sms' => __('Insert Successfully')]);
        } else {
            return redirect()->route('admin.user')->with(['status' => 'error', 'sms' => __('Insert Fails')]);
        }
    }
    public function edit($user_id){
        if(auth()->user()->id != 1 && $user_id == 1){
            return redirect()->route('admin.user')->with(['status' => 'warning', 'sms' => __('No Permission')]);
        }
        $data['user'] = DB::table('users')->find($user_id);
        $data['roles'] = DB::table('roles')->where('id','!=', auth()->user()->id == 1 ? null : 1)->get();

        return view('backends.users.edit', $data);
    }
    public function update(Request $r, $user_id){


        $validation = Validator::make($r->all(),[
            'name' => 'required',
            'username' => 'required',
            'role_id' => 'required|numeric'
        ]);

        if($validation->fails()){
            return redirect()->route('admin.user')->with(['status' => 'errors', 'data' => $validation->errors()]);
        }


        $data = [
            'name' => $r->name,
            'username' => $r->username,
            'email' => $r->email,
            'role_id' => $r->role_id,
            'status' => $r->status
        ];

        $oldUser = DB::table('users')->find($user_id);

        if($oldUser != $r->username){
            $find = DB::table('users')->where('username', $r->username)->whereNot('id', $user_id)->exists();
            if($find){
                return redirect()->route('admin.user')->with(['status' => 'warning', 'sms' => __('This Username has already exist')]);
            }
        }

        if($r->password){

            $validation2 = Validator::make($r->all(),[
                'password' => 'required|min:8',
            ]);

            if($validation2->fails()){
                return redirect()->route('admin.user')->with(['status' => 'errors', 'data' => $validation2->errors()]);
            }

            $data['password'] = Hash::make($r->password);
        }

        if($r->hasFile('photo')){
            if(Storage::disk('custom')->exists($oldUser->photo)){
                Storage::disk('custom')->delete($oldUser->photo);
            }
            $data['photo'] = $r->file('photo')->store('images/photo','custom');
        }

        $u = DB::table('users')->where('id', $user_id)->update($data);

        if($u == true){
            return redirect()->route('admin.user')->with(['status' => 'success', 'sms' => __('Update Successfully')]);
        } else {
            return redirect()->route('admin.user')->with(['status' => 'warning', 'sms' => __('No Update')]);
        }
    }
    public function delete($user_id){
        $old = DB::table('users')->find($user_id);

        if(Storage::disk('custom')->exists($old->photo)){
            Storage::disk('custom')->delete($old->photo);
        }
        $d = DB::table('users')->where('id', $user_id)->delete();
        if($d == true){
            return redirect()->route('admin.user')->with(['status' => 'success', 'sms' => __('Delete Successfully')]);
        } else {
            return redirect()->route('admin.user')->with(['status' => 'warning', 'sms' => __('Delete Fail')]);
        }
    }
}
