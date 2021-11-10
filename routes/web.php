<?php

use App\Http\Controllers\admin\category\CategoryController;
use App\Http\Controllers\admin\coupon\CouponController;
use App\Http\Controllers\admin\order\OrderController;
use App\Http\Controllers\admin\role\RoleController;
use App\Http\Controllers\admin\shipping\ShipController;
use App\Http\Controllers\admin\subcategory\SubCateController;
use App\Http\Controllers\admin\subsubcate\SubSubCate;
use App\Http\Controllers\brand\BrandController;
use App\Http\Controllers\Frontend;
use App\Http\Controllers\product\ProductController;
use App\Http\Controllers\slider\SliderController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\Commment;
use App\Http\Controllers\user\WishLishController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Users;
use App\Models\WishList;
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

Route::get('/', [Frontend::class,'frontend'])->name('home');

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
Route::group(['prefix'=>'brand','middleware'=>['auth','checkauth','brandcheck']],function(){

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
    Route::get('/order-users',[Users::class,'userOrderss'])->name('user.orderss');
    Route::get('/detail/order/{id}',[Users::class,'DetailOrderss']);
    Route::get('/download/order/{id}',[Users::class,'DownloadOrderss'])->name('download');
    Route::post('/return/order/{id}',[Users::class,'returnOrder'])->name('return');
    Route::get('/download/order/admin/{id}',[Users::class,'DownloadOrderssAdmin'])->name('download.admin');
    Route::get('/return/order/user',[Users::class,'return_user'])->name('return.user');
    Route::get('/cancel/order/user',[Users::class,'cancel_user'])->name('cancel.user');
});

//category
Route::group(['prefix'=>'category','middleware'=>['auth','checkauth','categorycheck']],function(){

    Route::get('/category',[CategoryController::class,'category'])->name('category');

    Route::get('/subcategory/ajax/{category_id}',[CategoryController::class,'getSubscategory'])->name('categorys');
    Route::get('/ajax/{subcategory_id}',[CategoryController::class,'getsubSubscategory'])->name('categorys');


    Route::post('/add/category',[CategoryController::class,'Addcate'])->name('add.category');
    Route::get('/category/edit/{id}',[CategoryController::class,'CatesEdit'])->name('category.edit');
    Route::post('/update/category/{id}',[CategoryController::class,'UpdateCate'])->name('update.category');
    Route::get('/category/delete/{id}',[CategoryController::class,'categoryDelete'])->name('category.delete');
});

//sub-cate
Route::group(['prefix'=>'category','middleware'=>['auth','checkauth','categorycheck']],function(){

    Route::get('/subcategory',[SubCateController::class,'subcategory'])->name('subcategory');
    Route::post('/add/subcategory',[SubCateController::class,'addsubcategory'])->name('add.subcategory');
    Route::get('/subcategory/edit/{id}',[SubCateController::class,'subCatesEdit'])->name('subcategory.edit');
    Route::post('/update/subcategory/{id}',[SubCateController::class,'UpdateSubCate'])->name('update.subcategory');
    Route::get('/subcategory/delete/{id}',[SubCateController::class,'subcategoryDelete'])->name('subcategory.delete');
});
//subsubcate
Route::group(['prefix'=>'category','middleware'=>['auth','checkauth','categorycheck']],function(){

    Route::get('/subsubcategory',[SubSubCate::class,'subcategory'])->name('subsubcate');
    Route::post('/subsubcategory/add',[SubSubCate::class,'Addsubcategory'])->name('add.subsubcategory');
    Route::get('/subsubcategory/edit/{id}',[SubSubCate::class,'Editsubcategory'])->name('subsubcategory.edit');
    Route::post('/subsubcategory/update/{id}',[SubSubCate::class,'Updatesubcategory'])->name('update.subsubcategory');
    Route::get('/subsubcategory/delete/{id}',[SubSubCate::class,'Deletesubcategory'])->name('subsubcategory.delete');
});

//product
Route::group(['prefix'=>'product','middleware'=>['auth','checkauth','productcheck']],function(){

    Route::get('/product',[ProductController::class,'product'])->name('product');
    Route::get('/product/manager',[ProductController::class,'product_manager'])->name('product.manager');
    Route::post('/product/add',[ProductController::class,'addProduct'])->name('add.product');
    Route::get('/product/edit/{id}',[ProductController::class,'product_edit'])->name('product.edit');
    Route::post('/product/update/{id}',[ProductController::class,'updateProduct'])->name('product.update');
    Route::post('/product/update/multi-iamge/{id}',[ProductController::class,'updateProductMultiImage'])->name('update.multiiamge');
    Route::post('/product/addmulti/{id}',[ProductController::class,'addMulti'])->name('add.multiimages');
    Route::post('/product/changetham/{id}',[ProductController::class,'changetham'])->name('update.thamn');
    Route::get('/product/deletemul/{id}',[ProductController::class,'deletMul'])->name('delete.multi');

    Route::get('/active/{id}',[ProductController::class,'active'])->name('active');
    Route::get('/inactive/{id}',[ProductController::class,'inactive'])->name('inactive');
    Route::get('/delete_product/{id}',[ProductController::class,'deleteP'])->name('product.delete');
});

//slider

Route::group(['prefix'=>'slider','middleware'=>['auth','checkauth','slidercheck']],function(){

    Route::get('/slider',[SliderController::class,'slider'])->name('slider');
    Route::post('/slider/add',[SliderController::class,'add_slider'])->name('add.slider');
    Route::get('/slider/edit/{id}',[SliderController::class,'edit_slider'])->name('slider.edit');
    Route::post('/slider/update/{id}',[SliderController::class,'update_slider'])->name('update.slider');
    Route::get('/slider/delete/{id}',[SliderController::class,'delete_slider'])->name('slider.delete');

    Route::get('/active/{id}',[SliderController::class,'active'])->name('slider.active');
    Route::get('/inactive/{id}',[SliderController::class,'inactive'])->name('slider.inactive');
});

Route::get('/english',[SliderController::class,'english'])->name('english');
Route::get('/korean',[SliderController::class,'korean'])->name('korean');
//product


Route::get('/detail/product/{id}/{slug}',[ProductController::class,'detail_product']);
Route::get('/product/tags/{tag}',[Frontend::class,'tag'])->name('tags');
Route::get('/categories/product/{slugs}',[Frontend::class,'categoriess'])->name('category.page');
Route::get('/subcategories/product/{slugs}',[Frontend::class,'subcategoriess'])->name('subsubcategory.page');
Route::get('/product/modal/{id}',[Frontend::class,'product_modal']);
Route::post('/product/add/cart',[Frontend::class,'product_addCart']);
Route::get('/minicart',[Frontend::class,'miniCart']);
Route::get('/remove/cart/{rowId}',[Frontend::class,'removeCart']);


//wishlist
Route::post('/add/wishlist/{id}',[WishLishController::class,'Addwishlist']);
Route::group(['prefix'=>'wishlist','middleware'=>['auth','usercheck']],function(){
    Route::get('/wishlist',[WishLishController::class,'wishlist'])->name('wishlist');

    Route::get('/get/wishlish',[WishLishController::class,'Getwishlist']);
    Route::get('/remove/wishlist/{id}',[WishLishController::class,'Remove']);
});


//cart
Route::get('/carts',[CartController::class,'Carts'])->name('carts');
Route::get('/get/cart/user',[CartController::class,'getCarts']);
Route::get('/remove/cart-user/{rowId}',[CartController::class,'removeCarts']);
Route::get('/decre/cart/{rowId}',[CartController::class,'DecreCart']);
Route::get('/incre/cart/{rowId}',[CartController::class,'IncreCart']);


///coupon

Route::group(['prefix'=>'coupon','middleware'=>['auth','checkauth','couponcheck']],function(){

    Route::get('/coupon',[CouponController::class,'coupon'])->name('coupon');
     Route::post('/coupon/add',[CouponController::class,'couponAdd'])->name('add.coupon');
     Route::get('/coupon/edit/{id}',[CouponController::class,'couponEdit'])->name('coupon.edit');
     Route::post('/coupon/update/{id}',[CouponController::class,'couponUpdate'])->name('update.coupon');
     Route::get('/coupon/delete/{id}',[CouponController::class,'couponDelete'])->name('coupon.delete');
});
//shipping

Route::group(['prefix'=>'ship','middleware'=>['auth','checkauth','shipcheck']],function(){

    Route::get('/ship',[ShipController::class,'coupon'])->name('ship');
    Route::post('/ship/division/add',[ShipController::class,'AddDivision'])->name('add.division');
    Route::get('/ship/division/edit/{id}',[ShipController::class,'divisionEdit'])->name('division.edit');
    Route::post('/ship/division/update/{id}',[ShipController::class,'update_division'])->name('update.division');
    Route::get('/ship/division/delete/{id}',[ShipController::class,'division_delete'])->name('division.delete');
});
//district
Route::group(['prefix'=>'ship','middleware'=>['auth','checkauth','shipcheck']],function(){

    Route::get('/district',[ShipController::class,'district'])->name('district');
    Route::post('/district/add',[ShipController::class,'Adddistrict'])->name('add.district');
    Route::get('/district/edit/{id}',[ShipController::class,'districtEdit'])->name('district.edit');
    Route::post('/district/update/{id}',[ShipController::class,'districtUpdate'])->name('update.district');
    Route::get('/district/delete/{id}',[ShipController::class,'deleteDis'])->name('district.delete');

    //state
    Route::get('/state',[ShipController::class,'state'])->name('state');
    Route::post('/state/add',[ShipController::class,'Addstate'])->name('add.state');
    Route::get('/state/edit/{id}',[ShipController::class,'Editstate'])->name('state.edit');
    Route::get('/state/delete/{id}',[ShipController::class,'deletestate'])->name('state.delete');
    Route::post('/state/update/{id}',[ShipController::class,'Updatestate'])->name('update.state');
});

//applicant coupon
Route::post('/check/coupon',[CartController::class,'checkCoupon']);
Route::get('/get/coupon/total',[CartController::class,'getTotalCoupon']);
Route::get('/remove/couponss',[CartController::class,'removeCoupon']);
Route::get('/checkout',[CartController::class,'checkout'])->name('checkout');
Route::get('/get/districts/{id}',[CartController::class,'getDis']);
Route::get('/get/states/{id}',[CartController::class,'getState']);



///checkout

 Route::group(['prefix'=>'checkout','middleware'=>['auth','usercheck']],function(){

    Route::post('/form/checkout',[CartController::class,'FormCheckout'])->name('form.checkout');
    Route::post('/orders',[CartController::class,'orders'])->name('orders');
});

//admin state order
Route::group(['prefix'=>'orders','middleware'=>['auth','checkauth','stateordercheck']],function(){

    Route::get('/pending',[OrderController::class,'OrderPending'])->name('order.pending');
    Route::get('/processing',[OrderController::class,'OrderProcess'])->name('order.processing');
    Route::get('/transfer',[OrderController::class,'OrderTransfer'])->name('order.transfer');
    Route::get('/delevery',[OrderController::class,'Orderdelevery'])->name('order.delevery');
    Route::get('/cancel',[OrderController::class,'OrderCacel'])->name('order.cancel');
    Route::get('/detail/order/admin/{id}',[OrderController::class,'OrderDetail'])->name('detail.order.admin');
    Route::post('/change/order/{id}',[OrderController::class,'OrderChange'])->name('change.orders');


});

///  manager
Route::group(['prefix'=>'user','middleware'=>['auth','checkauth','managerusercheck']],function(){

    Route::get('/all/users',[Users::class,'AllUsers'])->name('user.alls');

});


Route::post('/add/comment',[Commment::class,'Comment'])->name('add.comment');
//// admin return prder
Route::group(['prefix'=>'return','middleware'=>['auth','checkauth','returnordercheck']],function(){

    Route::get('/return',[Commment::class,'OrderReturn'])->name('order.returns');
    Route::get('/accept/return/{id}',[Commment::class,'Orderaccept'])->name('accept');



});
///role admin
Route::group(['prefix'=>'role','middleware'=>['auth','checkauth','accesscheck']],function(){

    Route::get('/role',[RoleController::class,'Role_User'])->name('role');
    Route::get('/add/role',[RoleController::class,'Add_Role_User'])->name('add.role');
    Route::get('/edit/role/{id}',[RoleController::class,'Edit_Role_User'])->name('role.edit');
    Route::post('/create/role',[RoleController::class,'Create_Role_User'])->name('add.role.admin');
    Route::post('/update/role/{id}',[RoleController::class,'Update_Role_User'])->name('editt.role.admin');




});

// tracking order

Route::post('/tracking',[UserController::class,'tracking'])->name('tracking');
// search
Route::post('/search',[Frontend::class,'search'])->name('search');
// search advance
Route::post('/advance/search',[Frontend::class,'Advancesearch']);
//shop
Route::get('/shop',[Frontend::class,'shop'])->name('shop');
//shop filter cate
Route::post('/shop',[Frontend::class,'shopFilter'])->name('shop.filter');
