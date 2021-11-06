<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Commment extends Controller
{
    //

    public function Comment(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'comment' => 'required',

            // categories la ten bang trong csdl
        ], [
            'title.required' => 'Please fill out information',

            'comment.required' => 'Please fill out information',

        ]);


        Comment::insert([
            'title' => $request->title,
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'product_id' =>  $request->id,
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Comment was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

    public function OrderReturn(){
        $detail = Order::where('return_order',0)->get();

        return view('admin.order.return_order',compact('detail'));
    }

    public function Orderaccept($id){
        Order::find($id)->update(['return_order'=>1]);

        $notice = array(
            'message' => 'Accept return order success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }
}
