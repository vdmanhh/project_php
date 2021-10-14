<?php

use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\subcategory\SubCateController;
use App\Http\Controllers\admin\subsubcate\SubSubCate;
use App\Http\Controllers\brand\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users;
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
    return view('frontend.body.index');
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
    Route::get('/brand',[BrandController::class,'brands'])->name('brand');
});

//brand admin
Route::group(['prefix'=>'brand','middleware'=>['auth','checkauth']],function(){

    Route::get('/brand',[BrandController::class,'brands'])->name('brand');
    Route::get('/brand/edit/{id}',[BrandController::class,'brandsEdit'])->name('brand.edit');
    Route::get('/brand/delete/{id}',[BrandController::class,'brandsDelete'])->name('brand.delete');
    Route::post('/add/brand',[BrandController::class,'Addbrands'])->name('add.brand');
    Route::post('/update/brand/{id}',[BrandController::class,'Updatebrands'])->name('update.brand');
});

    //user
Route::group(['middleware'=>'auth'],function(){
    Route::get('/user/info',[Users::class,'admin_pass'])->name('user.info');
    Route::post('/update/profilesuser',[Users::class,'userUpdate'])->name('update.profileuser');
    Route::get('/pass/profilesuser',[Users::class,'userUpdatePass'])->name('user.changespass');
    Route::post('/pass/profilesuser',[Users::class,'finalChangePass'])->name('changepasss.user');
});

//category
Route::group(['prefix'=>'category','middleware'=>['auth','checkauth']],function(){

    Route::get('/category',[CategoryController::class,'category'])->name('category');
    Route::get('/subcategory/ajax/{category_id}',[CategoryController::class,'getSubscategory'])->name('categorys');
    Route::post('/add/category',[CategoryController::class,'Addcate'])->name('add.category');
    Route::get('/category/edit/{id}',[CategoryController::class,'CatesEdit'])->name('category.edit');
    Route::post('/update/category/{id}',[CategoryController::class,'UpdateCate'])->name('update.category');
    Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category.delete');
});

//sub-cate
Route::group(['prefix'=>'subcategory','middleware'=>['auth','checkauth']],function(){

    Route::get('/subcategory',[SubCateController::class,'subcategory'])->name('subcategory');
    Route::post('/add/subcategory',[SubCateController::class,'addsubcategory'])->name('add.subcategory');
    Route::get('/subcategory/edit/{id}',[SubCateController::class,'subCatesEdit'])->name('subcategory.edit');
    Route::post('/update/subcategory/{id}',[SubCateController::class,'UpdateSubCate'])->name('update.subcategory');
    Route::get('/subcategory/delete/{id}',[SubCateController::class,'subcategoryDelete'])->name('subcategory.delete');
});

Route::group(['prefix'=>'subsubcategory','middleware'=>['auth','checkauth']],function(){

    Route::get('/subsubcategory',[SubSubCate::class,'subcategory'])->name('subsubcate');
    Route::post('/subsubcategory/add',[SubSubCate::class,'Addsubcategory'])->name('add.subsubcategory');
    Route::get('/subsubcategory/edit/{id}',[SubSubCate::class,'Editsubcategory'])->name('subsubcategory.edit');
    Route::post('/subsubcategory/update/{id}',[SubSubCate::class,'Updatesubcategory'])->name('update.subsubcategory');
    Route::get('/subsubcategory/delete/{id}',[SubSubCate::class,'Deletesubcategory'])->name('subsubcategory.delete');
});
