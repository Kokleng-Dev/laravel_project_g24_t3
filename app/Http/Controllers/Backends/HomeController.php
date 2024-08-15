<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){


        return view('backends.home.index');
    }

    public function test(Request $r){



        return redirect()->route('admin.product.category')->with(['status' => 'warning', 'sms' => 'Login Fail']);

    }
}
