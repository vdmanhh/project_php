<?php

namespace App\Http\Controllers\admin\coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    //

    public function coupon(){
        $coupons = Coupon::latest()->get();
        return view('admin.coupon.index',compact('coupons'));
    }

    public function couponAdd(Request $request){
        $validated = $request->validate([
            'name_coupon' => 'required',
            'discount' => 'required',
            'date' => 'required',
            // categories la ten bang trong csdl
        ], [
            'name_coupon.required' => 'Please fill out information',

            'discount.required' => 'Please fill out information',
            'date.required' => 'Please fill out information',
        ]);


        Coupon::insert([
            'name_coupon' => $request->name_coupon,
            'discount' => $request->discount,
            'date' => $request->date,
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add Coupon was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);

    }

    public function couponEdit($id){
        $coupon = Coupon::find($id);
        return view('admin.coupon.edit',compact('coupon'));
    }
    public function couponUpdate(Request $request,$id){
        Coupon::find($id)->update([
            'name_coupon' => $request->name_coupon,
            'discount' => $request->discount,
            'date' => $request->date,
            'updated_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update Coupon was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('coupon')->with($notice);

    }

    public function couponDelete($id){
         Coupon::find($id)->delete();
         $notice = array(
            'message' => 'Deleted Coupon was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }
}
