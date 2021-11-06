<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use PDF;

class Users extends Controller
{
    //

    public function admin_pass()
    {
        $user = Auth::user();
        return view('frontend.user.profile', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        if ($request->file('image')) {
            @unlink(public_path('upload/admin/' . Auth::user()->avatar));
            $image = $request->file('image');
            $filename = date('YmdHi') . $image->getClientOriginalName();
            $image->move(public_path('upload/user'), $filename);

            DB::table('users')->where('id', Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' => $filename
            ]);
            $notice = array(
                'message' => 'Change profile admin success',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notice);
        } else {
            User::find(Auth::user())->update([
                'name' => $request->name,
                'email' => $request->email

            ]);
            $notice = array(
                'message' => 'Change profile user success!!!',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notice);
        }
    }
    public function userUpdatePass()
    {
        $user = Auth::user();
        return view('frontend.user.changepasss', compact('user'));
    }

    public function finalChangePass(Request $request)
    {
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ], [
            'new_password.required' => 'Please fill out information',
            'old_password.required' => 'Please fill out information',
            'confirm_password.required' => 'Please fill out information',
        ]);


        if (Hash::check($request->old_password, Auth::user()->password)) {
            $new = Hash::make($request->new_password);
            DB::table('users')->where('id', Auth::user()->id)->update([
                'password' => $new
            ]);
            Auth::logout();
            $notice = array(
                'message' => "Change password admin success",
                "alert-type" => "success"
            );
            return Redirect()->route('logout')->with($notice);
        } else {
            $notice = array(
                'message' => "Old password admin was wrong or not exits",
                "alert-type" => "success"
            );
            return Redirect()->back()->with($notice);
        }
    }

    public function userOrderss()
    {

        $order = Order::where('user_id', Auth::id())->get();
        return view('frontend.user.order', compact('order'));
    }

    public function DetailOrderss($id)
    {
        $detail = Order::where('id', $id)->where('user_id', Auth::id())->first();

        $items = OrderItem::where('order_id', $id)->get();
        return view('frontend.user.detail_order', compact('detail', 'items'));
    }
    public function DownloadOrderss($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->first();

        $orderItem = OrderItem::where('order_id', $id)->get();
        // return view('frontend.user.download',compact('order','orderItem'));
        $pdf = PDF::loadView('frontend.user.download', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    public function DownloadOrderssAdmin($id)
    {
        $order = Order::where('id', $id)->first();

        $orderItem = OrderItem::where('order_id', $id)->get();
        // return view('frontend.user.download',compact('order','orderItem'));
        $pdf = PDF::loadView('frontend.user.download', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }


    public function returnOrder(Request $request,$id){


        Order::where('id',$id)->update([
                'return_reason'=>$request->return,
                'return_order'=>0,
                'return_date' =>Carbon::now(),
        ]);
        $notice = array(
            'message' => "Return Order successfuly",
            "alert-type" => "success"
        );
        return Redirect()->back()->with($notice);
    }


    public function return_user(){
        $detail = Order::where('user_id', Auth::id())->where('return_reason','!=',NULL)->get();

        return view('frontend.user.return_user',compact('detail'));
    }

    public function cancel_user(){
        $orderItem = Order::where('user_id', Auth::id())->where('return_reason','cancel')->get();
        return view('frontend.user.cancel_user',compact('orderItem'));
    }

    public function AllUsers(){
        $users = User::get();
        return view('admin.user.index',compact('users'));
    }
}
