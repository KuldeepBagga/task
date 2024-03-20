<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(){
        if(Auth::user()){
            return redirect()->route('dashboard');
        }
        return view("login");
    }
    public function login_submit(Request $request){
        $validate=Validator::make($request->all(),[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        if($validate->fails()){
            return redirect()->route('login')->withInput()->withErrors($validate->errors());
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('error','Invalid login details');
        }
    }

    public function register(){
        return view("register");
    }

    public function update(){
        if(Auth::user()){
            $userDetails=Auth::user()->details;
        }
        return view('update',compact('userDetails'));
    }

    public function update_login(){
        if(Auth::user()){
            $userdata=Auth::user();
        }
        return view('update_login',compact('userdata'));
    }

    public function update_login_put(Request $request){
            $validate=Validator::make($request->all(),[
                'name'=>'required|string',
                'email'=>'required|string|unique:users,email,'.Auth::user()->id,
                'mobile'=>'required|min:10',
            ]);
            if($validate->fails()){
                return redirect()->route('update_login')->withInput()->withErrors($validate->errors());
            }else{
                $user=User::where('id',Auth::user()->id)->first();
                $user->name=$request->name;
                $user->email=$request->email;
                $user->mobile=$request->mobile;
                $user->update();
                return redirect()->route('dashboard')->with('success',"Login details updated.");
            }
    }

    public function update_password_put(Request $request){
        $validate=Validator::make($request->all(),[
            'old_password'=>'required',
            'new_password'=>'required|min:10',
            'confirm_password'=>'required|same:new_password|min:10'
        ]);
        if($validate->fails()){
            return redirect()->route('update_login')->withInput()->withErrors($validate->errors());
        }else{
            if(!Hash::check($request->old_password , Auth::user()->password)){
                return redirect()->route('update_login')->withInput()->with("error","old password not matched");
            }
            $user=User::where('id',Auth::user()->id)->first();
            $user->password=Hash::make($request->new_password);
            $user->update();
            $this->logout();
            return redirect()->route('dashboard')->with('success',"Password updated");
        }
    }

    public function update_put(Request $request){
        $validate=Validator::make($request->all(),[
            'address'=>'required',
            'city'=>'required|string',
            'state'=>'required|string',
            'date_of_birth'=>'required|date'
        ]);

        if($validate->fails()){
            return redirect()->route('update_user')->withInput()->withErrors($validate->errors());
        }else{
            $id=Auth::user()->id;
            $userDetails=UserDetails::where('id',$id)->first();
            if(!is_null($userDetails)){
                $userDetails->address=$request->address;
                $userDetails->city=$request->city;
                $userDetails->state=$request->state;
                $userDetails->date_of_birth=$request->date_of_birth;
                $userDetails->update();
            }
            return redirect()->route('dashboard')->with('success','Personal details updated.');
        }
    }

    public function details(){
        if(Auth::user()){
            $id=Auth::user()->id;
            $user=UserDetails::where('id',$id)->get()->count();
            if($user!==0){
                return redirect()->route('dashboard');
            }
        }
        return view("user_details");
    }

    public function saveUserDetails(Request $request){
        $validate=Validator::make($request->all(),[
            "address"=>"required",
            "city"=>"required|string",
            "state"=>"required|string",
            "date_of_birth"=>"required"
        ]);
        if($validate->fails()){
            return redirect()->route('details')->withInput()->withErrors($validate->errors());
        }
        $userDetails=new UserDetails();
        $userDetails->user_id=Auth::user()->id;
        $userDetails->address=$request->address;
        $userDetails->city=$request->city;
        $userDetails->state=$request->state;
        $userDetails->date_of_birth=$request->date_of_birth;
        if($userDetails->save()){
            return redirect()->route("dashboard")->with('success','Your details successfully saved');
        }
    }

    public function store(Request $request){
        $validate=Validator::make($request->all(),[
                "name"=>"required|string",
                "email"=>"required|email|unique:users,email",
                "mobile"=>"required|numeric|unique:users,mobile",
                "password"=>"required|min:10",
        ]);
        if($validate->fails()){
            return redirect()->route("register")->withInput()->withErrors($validate->errors());
        }
        $user=User::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile'=>$request->mobile,
                'password'=>Hash::make($request->password),
        ]);
        if($user->save()){
            Auth::attempt(['email'=>$request->email,"password"=>$request->password]);
            return redirect()->route("details")->with("success","Account created success");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with("success","Logout success");
    }
}