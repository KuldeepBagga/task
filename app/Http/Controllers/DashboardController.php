<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()){
            $uId=Auth::user()->id;
            $user=User::with('details')->where('id',$uId)->get();
        }
        return view('dashboard',compact('user'));
    }
}
