<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserDetails;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserDetails
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()){
            $userId=Auth::user()->id;
            if(UserDetails::where('user_id',$userId)->get()->count()===0){
                return redirect()->route('details')->with('error','you must fill your details to process');
            }
        }
        return $next($request);
    }
}
