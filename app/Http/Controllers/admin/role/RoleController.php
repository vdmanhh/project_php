<?php

namespace App\Http\Controllers\admin\role;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Image;
class RoleController extends Controller
{
    //

    public function Role_User(){
        $users = User::where('type',2)->latest()->get();
        return view('admin.role.index',compact('users'));
    }

    public function Add_Role_User(){

        return view('admin.role.create');
    }

    public function Create_Role_User(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required',
            // categories la ten bang trong csdl
        ], [
            'name.required' => 'Please fill out information',

            'email.required' => 'Please fill out information',
            'password.required' => 'Please fill out information',
            'image.required' => 'Please fill out information',
        ]);


///
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(225,225)->save('upload/admin/'.$name_gen);
            $save_url = 'upload/admin/'.$name_gen;


        User::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>Hash::make( $request->password),
            'category' => $request->category,
            'state_order' => $request->state_order,
            'product' => $request->product,
            'user' => $request->user,
            'ship' => $request->ship,
            'coupon' => $request->coupon,
            'return_order' => $request->return_order,
            'brand' => $request->brand,
            'slider' => $request->slider,
            'access' => $request->access,
            'avatar'=>$save_url,
            'type'=>2,
            'role'=>1,
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add user admin was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('role')->with($notice);
    }

    public function Edit_Role_User($id){

    $user = User::find($id);
    return view('admin.role.edit',compact('user'));
    }




    public function Update_Role_User(Request $request,$id){

        $old_img = $request->old_image;

        if ($request->file('profile_photo_path')) {

                unlink($old_img);
            $image = $request->file('profile_photo_path');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('upload/admin/'.$name_gen);
            $save_url = 'upload/admin/'.$name_gen;


            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'avatar' =>$save_url,
                'category' => $request->category,
                'state_order' => $request->state_order,
                'product' => $request->product,
                'user' => $request->user,
                'ship' =>$request->ship,
                'coupon' => $request->coupon,
                'return_order' => $request->return_order,
                'brand' => $request->brand,
                'slider' => $request->slider,
                'access' => $request->access,
                'type'=>2,
                'role'=>1,

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('role')->with($notification);

            }else{

            User::findOrFail($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'category' => $request->category,
            'state_order' => $request->state_order,
            'product' => $request->product,
            'user' => $request->user,
            'ship' => $request->ship,
            'coupon' => $request->coupon,
            'return_order' => $request->return_order,
            'brand' => $request->brand,
            'slider' => $request->slider,
            'access' => $request->access,
            'type'=>2,
            'role'=>1,

            ]);

            $notification = array(
                'message' => 'Admin User Updated Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('role')->with($notification);

            } // end else
    }
}
