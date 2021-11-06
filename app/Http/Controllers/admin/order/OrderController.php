<?php

namespace App\Http\Controllers\admin\order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Redirect;
use DB;
class OrderController extends Controller
{
    //

    public function OrderPending(){
        $pendings = Order::where('status','pending')->orderBy('id','ASC')->get();
        return view('admin.order.pending',compact('pendings'));
    }

    public function OrderDetail($id){
        $detail = Order::where('id',$id)->first();

        $items = OrderItem::where('order_id',$id)->get();
        return view('admin.order.detail_order_admin',compact('detail','items'));
    }

    public function OrderChange(Request $request,$id){
        $order = Order::find($id);
        if($order->status == 'pending'){
            Order::find($id)->update([
                'status'=>$request->change
            ]);
            $notice = array(
                'message' => 'Update Status was success',
                'alert-type' => 'success'
            );

            return Redirect()->route('order.pending')->with($notice);
        }
        elseif($order->status == 'processing'){
            Order::find($id)->update([
                'status'=>$request->change
            ]);
            $notice = array(
                'message' => 'Update Status was success',
                'alert-type' => 'success'
            );

            return Redirect()->route('order.processing')->with($notice);
        }
        elseif($order->status == 'transfer'){
        $product = OrderItem::where('order_id',$id)->get();
        foreach($product as $key){
            Product::where('id',$key->product_id)->update(['product_qty'=>DB::raw('product_qty-'.$key->qty)]);
        }

            Order::find($id)->update([
                'status'=>$request->change
            ]);
            $notice = array(
                'message' => 'Update Status was success',
                'alert-type' => 'success'
            );

            return Redirect()->route('order.transfer')->with($notice);
        }
        else{
            Order::find($id)->update([
                'status'=>$request->change
            ]);
            $notice = array(
                'message' => 'Update Status was success',
                'alert-type' => 'success'
            );

            return Redirect()->route('order.cancel')->with($notice);
        }

    }
    /////////

    public function OrderProcess(){
        $pendings = Order::where('status','processing')->orderBy('id','ASC')->get();
        return view('admin.order.process',compact('pendings'));
    }

    public function OrderTransfer(){
        $pendings = Order::where('status','transfer')->orderBy('id','ASC')->get();
        return view('admin.order.transfer',compact('pendings'));
    }
    public function Orderdelevery(){
        $pendings = Order::where('status','deleveried')->orderBy('id','ASC')->get();
        return view('admin.order.deleveried',compact('pendings'));
    }
    public function OrderCacel(){
        $pendings = Order::where('status','cancel')->orderBy('id','ASC')->get();
        return view('admin.order.cancel',compact('pendings'));
    }
}
