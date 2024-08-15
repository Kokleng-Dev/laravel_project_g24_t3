<?php

namespace App\Http\Controllers\backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class ProductCategoryController extends Controller
{
    public function index(){

        return view('backends.product_categories.index');
    }
}
