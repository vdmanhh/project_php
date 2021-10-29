<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function Carts(){
        $cartscheck = Cart::total();
        return view('frontend.body.cart',compact('cartscheck'));
    }

    public function getCarts(){
        $carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();
        return response()->json(array(
            'carts' =>$carts,
            'cartQty' =>$cartQty,
            'cartTotal' =>round($cartTotal),
        ));

    }

    public function removeCarts($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['success'=>'Remove cart successfully']);
    }

    public function DecreCart($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty - 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $check = Coupon::where('name_coupon',$coupon_name)->where('date','>=',Carbon::now()->format('Y-m-d'))->first();
            Session::put('coupon',[
                'coupon_name'=> $check->name_coupon,
                'discount'=> $check->discount,
                'discount_mount'=>Cart::total()*$check->discount/100,
                'total_mount'=>round(Cart::total() - Cart::total()*$check->discount/100)
            ]);
        }
        return response()->json('Decrement');
    }

    public function IncreCart($rowId){
        $row = Cart::get($rowId);
        Cart::update($rowId, $row->qty + 1);
        if(Session::has('coupon')){
            $coupon_name = Session::get('coupon')['coupon_name'];
            $check = Coupon::where('name_coupon',$coupon_name)->where('date','>=',Carbon::now()->format('Y-m-d'))->first();
            Session::put('coupon',[
                'coupon_name'=> $check->name_coupon,
                'discount'=> $check->discount,
                'discount_mount'=>Cart::total()*$check->discount/100,
                'total_mount'=>round(Cart::total() - Cart::total()*$check->discount/100)
            ]);
        }
        return response()->json('Increment');
    }

    //coupon

    public function checkCoupon(Request $request){
        $check = Coupon::where('name_coupon',$request->coupon_name)->where('date','>=',Carbon::now()->format('Y-m-d'))->first();
        if($check){
          //  $per = ($check->discount)/100;
                Session::put('coupon',[
                    'coupon_name'=> $check->name_coupon,
                    'discount'=> $check->discount,
                    'discount_mount'=>Cart::total()*$check->discount/100,
                    'total_mount'=>round(Cart::total() - Cart::total()*$check->discount/100)
                ]);

            return response()->json(['success'=>'Applicant coupon was successfully']);
        }
        else{
            return response()->json(['error'=>'Coupon invalid or expire']);
        }
    }

    public function getTotalCoupon(){
        if(Session::has('coupon')){
            $valueCoupon = array(
                'coupon_name'=>Session::get('coupon')['coupon_name'],
                'discount'=>Session::get('coupon')['discount'],
                'discount_mount'=>Session::get('coupon')['discount_mount'],
                'total_mount'=>Session::get('coupon')['total_mount'],
                'total_sub'=>Cart::total()
            );

            return response()->json($valueCoupon);
        }else{
                $subTotal = Cart::total();

                return response()->json(array(
                    'subTotal'=>$subTotal
                ));
        }
    }

    public function removeCoupon(){
        Session::forget('coupon');
        return response()->json(['success'=>'Delete coupon was successfully']);
    }

    public function checkout(){
     if(Auth::check()){
        $subTotal = Cart::total();
        if($subTotal>0){
            $carts = Cart::content();
            $cartQty = Cart::count();
            $cartTotal = Cart::total();
            $divsions = Division::get();
            return view('frontend.body.checkout',compact('carts','cartQty','cartTotal','divsions'));
        }else{

            $notice = array(
                'message'=>'You shoul add product on cart to checkout',
                'alert-type'=>'warning'
            );
            return Redirect()->route('home')->with($notice);
        }


     }else{

        $notice = array(
            'message'=>'You shoul login to Checkout',
            'alert-type'=>'warning'
        );
        return Redirect()->back()->with($notice);
     }
    }

    public function getDis($id){
        $districts = District::where('division_id',$id)->get();
        return response()->json($districts);
    }

    public function getState($id){
        $states = State::where('district_id',$id)->get();
        return response()->json($states);
    }


    //checkout
    public function FormCheckout(Request $request){

        $data = array(
            'shipping_name' => $request->shipping_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'notes' => $request->notes,
            'payment_method' => $request->payment_method,
        );
        $cartTotal = Cart::total();


        if($request->payment_method == 'stripe'){
            return view('frontend.body.order',compact('data','cartTotal'));
        }
        elseif($request->payment_method == 'cart'){
            return 'cart';

        }else{
            return view('frontend.body.cash',compact('cartTotal'));
        }
    }
}
