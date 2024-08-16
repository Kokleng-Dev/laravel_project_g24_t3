<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DB;
use Auth;


class ActiveUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $find = DB::table('users')->find(auth()->user()->id);

        if($find->status == 0){
            session()->flash('status', 'warning');
            session()->flash('sms' , __('Your account now is inactive, please contact to admin !!!'));
            Auth::logout();
        }

        return $next($request);
    }
}
