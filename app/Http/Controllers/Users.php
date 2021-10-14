<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Controller
{
    //

    public function admin_pass(){
        $user = Auth::user();
        return view('frontend.user.profile',compact('user'));
    }

    public function userUpdate(Request $request){
        if($request->file('image')){
            @unlink(public_path('upload/admin/'.Auth::user()->avatar));
            $image = $request->file('image');
            $filename = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/user'),$filename);

            DB::table('users')->where('id',Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'avatar'=>$filename
            ]);
            $notice = array(
                'message'=>'Change profile admin success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notice);

        }
        else{
            User::find(Auth::user())->update([
                'name'=>$request->name,
                'email'=>$request->email

            ]);
            $notice = array(
                'message'=>'Change profile user success!!!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notice);
        }
    }
    public function userUpdatePass(){
        $user = Auth::user();
        return view('frontend.user.changepasss',compact('user'));
    }

    public function finalChangePass(Request $request){
        $validated = $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ],[
            'new_password.required' => 'Please fill out information',
            'old_password.required' => 'Please fill out information',
            'confirm_password.required' => 'Please fill out information',
        ]);


        if(Hash::check($request->old_password,Auth::user()->password)){
            $new = Hash::make($request->new_password);
            DB::table('users')->where('id',Auth::user()->id)->update([
                'password'=>$new
            ]);
            Auth::logout();
            $notice = array(
                'message'=> "Change password admin success",
                "alert-type" => "success"
            );
            return Redirect()->route('logout')->with($notice);
        }
        else{
            $notice = array(
                'message'=> "Old password admin was wrong or not exits",
                "alert-type" => "success"
            );
            return Redirect()->back()->with($notice);
        }
    }
}
