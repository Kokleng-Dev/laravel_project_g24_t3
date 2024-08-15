<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class LanguageController extends Controller
{
    public function switchLang($lang){
        App::setlocale($lang);
        session()->put('language', $lang);
        // dd(session()->get('locale'));
        return redirect()->back()->with(['status' => 'success', 'sms' => __('Chanage Language Successfully')]);
    }
}
