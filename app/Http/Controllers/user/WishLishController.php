<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\WishList;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WishLishController extends Controller
{
    //

    public function wishlist(){
        return view('frontend.body.wishlist');
    }

    public function Addwishlist($id){
        if(Auth::check()){
            $userExist = WishList::where('product_id',$id)->where('user_id',Auth::id())->first();

            if(!$userExist){
                WishList::insert([
                    'product_id'=>$id,
                    'user_id'=>Auth::id(),
                    'created_at'=> Carbon::now(),
                ]);

                return response()->json(['success'=>'Add to wishlist was successfully']);
            }else{
                return response()->json(['error'=>'Product has already add to wishlist']);
            }

        }
        else{
            return response()->json(['error'=>'You should login to add wishlist']);
        }
    }


    public function Getwishlist(){

    $wishlist = WishList::with('product')->where('user_id',Auth::id())->latest()->get();
     return response()->json($wishlist);


    }
}
