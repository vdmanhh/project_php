<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login/form',[UserController::class,'logins'])->name('login.user');



Route::get('/logout_admin',[UserController::class,'logouts'])->name('logout');

// middleware
Route::group(['prefix'=>'admin','middleware'=>['auth','checkauth']],function(){
    Route::get('/home_admin',[UserController::class,'home'])->name('admin.home');
    Route::get('/edit/profile',[UserController::class,'user_profile'])->name('edit.profile');
    Route::post('/update/profiles',[UserController::class,'user_profile_update'])->name('update.profile');
    Route::get('/change/pass/admin',[UserController::class,'admin_pass'])->name('admin.pass');
    Route::post('/update/pass_admin',[UserController::class,'update_admin_pass'])->name('update.pass');
});
