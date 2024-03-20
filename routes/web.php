<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//login route
Route::get('/', [UserController::class , "login"])->name("login");
//login route for form submission
Route::post('/login',[UserController::class , "login_submit"])->name('login_submit');
//register route
Route::get('/register', [UserController::class , "register"])->name("register");
//register route for form submissioin
Route::post('/register', [UserController::class , "store"])->name("store");

//used auth middleware which secure these routes can't access directly
Route::middleware('auth')->group(function(){
    //user details route after registeration user moved to this page
    Route::get("/user/details",[UserController::class,"details"])->name("details"); 
    //route for user details submission
    Route::post("/user/details",[UserController::class,"saveUserDetails"])->name("save_user_details"); 
    //created custom middleware which checks the user details is present if not user can't access these pages and user get redirected to user details page
    Route::middleware('IsDetail')->group(function(){
        Route::get('/dashboard',[DashboardController::class,'index'])->name("dashboard");
        Route::get('/user/update',[UserController::class,'update'])->name("update_user");
        Route::put('/user/update',[UserController::class,'update_put'])->name("update_post");
        Route::get('/user/login/update',[UserController::class,'update_login'])->name("update_login");
        Route::put('/user/login/update',[UserController::class,'update_login_put'])->name("update_login_put");
        Route::put('/user/update/password',[UserController::class,'update_password_put'])->name('update_password_put');
    });        
});

Route::get('/user/logout',[UserController::class,"logout"])->name("logout");