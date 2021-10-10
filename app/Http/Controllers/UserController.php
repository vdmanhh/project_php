<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{

    public function login()
    {
        return view('login');
    }
    public function home(){
        return view('admin.body.index');
    }
    public function logins(Request $request)
    {
        $user = new User();
        ///dd($user->getType());
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            $user = User::where('email', $request->email)->first();
            $role = $user->role;
            if($role==1){
                Auth::login($user);
                $notice = array(
                    'message'=>'Login success',
                    'alert-type'=>'success'
                );
                return Redirect()->route('admin.home')->with($notice);
            }
            else{
                Auth::login($user);
                return Redirect()->route('home');
            }

        }
        else{
            return Redirect()->back();
        }

    }

    public function logouts(){
        Auth::logout();
        $notice = array(
            'message'=>'Logout success',
            'alert-type'=>'success'
        );
        return Redirect()->route('login')->with($notice);
    }

    public function user_profile(){
        $user = Auth::user();
        return view('admin.body.edit_profile',compact('user'));
    }

    public function user_profile_update(Request $request){

        if($request->file('image')){
            @unlink(public_path('upload/admin/'.Auth::user()->avatar));
            $image = $request->file('image');
            $filename = date('YmdHi').$image->getClientOriginalName();
            $image->move(public_path('upload/admin'),$filename);

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
                'message'=>'Change profile admin success',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notice);
        }
    }

    public function admin_pass(){
        return view('admin.body.change_pass');
    }

    public function update_admin_pass(Request $request){

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
