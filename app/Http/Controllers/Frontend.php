<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\FuncCall;

class Frontend extends Controller
{
    //
    public function frontend(){
        $hotdeals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->limit(4)->get();
        $special_offers = Product::where('special_offer',1)->where('discount_price','!=',NULL)->limit(4)->get();
        $featured = Product::where('featured',1)->where('discount_price','!=',NULL)->limit(5)->get();
        $special_deals = Product::where('special_deals',1)->where('discount_price','!=',NULL)->limit(4)->get();
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        return view('frontend.body.index',compact('hotdeals','special_offers','featured','special_deals','tags_hin','tags_en'));
    }

    public function tag($tag){

        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
       // $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->get();
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->paginate(3);
        $cates =Category::latest()->get();
        return view('frontend.body.product_tags',compact('products','tags_hin','tags_en','cates'));
    }

    public function categoriess(Request $request,$slugs){
        $products = Product::where('status',1)->where('subcategory_id',$slugs)->orderBy('id','DESC')->paginate(1);
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        $cates =Category::latest()->get();

        //ajax load more
        if ($request->ajax()) {
            $grid_view = view('frontend.body.grid_view',compact('products'))->render();

            $list_view = view('frontend.body.list_view',compact('products'))->render();
             return response()->json(['grid_view' => $grid_view,'list_view'=>$list_view]);

                 }
        //end ajax
        return view('frontend.body.subcategory',compact('products','tags_en','tags_hin','cates'));
    }

    public function subcategoriess($slugs){
        $products = Product::where('status',1)->where('subsubcategory_id',$slugs)->orderBy('id','DESC')->paginate(3);
        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        $cates =Category::latest()->get();
        return view('frontend.body.subsubcategory',compact('products','tags_en','tags_hin','cates'));
    }

    public function product_modal($id){
        $product =Product::find($id);

        $category = Category::where('id', $product->category_id)->first();
        $brand = Brand::where('id', $product->brand_id)->first();
        $color = $product->product_color_en;
        $new_color = explode(',',$color);
        $size =  $product->product_size_en;
        $new_size =  explode(',',$size);

        return response()->json(array(
            "product" =>  $product,
            'color' =>  $new_color,
            'size' =>  $new_size,
            'brand'=>$brand->brand_name_en,
            'category'=>$category->category_name_en,
        ));
    }

    public function product_addCart(Request $request){

        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $product  = Product::find($request->id);
        if($product->discount_price == NULL){
            Cart::add( [
                'id' => $request->id,
                'name' => $request->name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->size,
                    'color'=>$request->color,
                    'image'=>$product->product_thambnail
                ]
                ]);
                return response()->json(['success'=>'add to cart success']);
        }
        else{
            Cart::add( [
                'id' => $request->id,
                'name' => $request->name,
                'qty' => $request->quantity,
                'price' => $product->discount_price,
                'weight' => 1,
                'options' => [
                    'size' => $request->size,
                    'color'=>$request->color,
                    'image'=>$product->product_thambnail
                ]
                ]);
                return response()->json(['success'=>'add to cart success']);
        }

    }

    public function miniCart(){

    	$carts = Cart::content();
    	$cartQty = Cart::count();
    	$cartTotal = Cart::total();
        return response()->json(array(
            'carts' =>$carts,
            'cartQty' =>$cartQty,
            'cartTotal' =>round($cartTotal),
        ));
    }

    public function removeCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'Remove cart successfully']);
    }

    public function search(Request $request){
        $request->validate(["search" => "required"]);
        $item = $request->search;

        $products = Product::where('product_name_en','LIKE',"%$item%")->get();


        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        $cates =Category::latest()->get();
        return view('frontend.body.search',compact('products','tags_en','tags_hin','cates'));
    }


    public function Advancesearch(Request $request){
        $request->validate(["code" => "required"]);
        $item = $request->code;
        $products = Product::where('product_name_en','LIKE',"%$item%")->select('product_name_en','product_thambnail','selling_price','id','product_slug_en')->limit(5)->get();
        // return view('frontend.body.form_search',compact('products'));
        return response()->json($products);
    }

    /// shop
    public function shop(){
        $products = Product::query();
        if(!empty($_GET['category'])){
            //dd($_GET['category']);
            $slugs = explode(',',$_GET['category']);
            $catIds = Category::select('id')->whereIn('category_slug_en',$slugs)->pluck('id')->toArray();

            $products = $products->whereIn('category_id',$catIds)->paginate(3);
        }
        else{
            $products = Product::where('status',1)->orderBy('id','DESC')->paginate(3);
       }



        $tags_en = Product::groupBy('product_tags_en')->select('product_tags_en')->get();
        $tags_hin = Product::groupBy('product_tags_hin')->select('product_tags_hin')->get();
        $cates =Category::latest()->get();
        return view('frontend.body.shop',compact('products','cates','tags_en','tags_hin'));
    }


    public function shopFilter(Request $request){

        $data= $request->all();

        $catUrl = "";
        if (!empty($data['category'])) {
           foreach ($data['category'] as $category) {
              if (empty($catUrl)) {
                 $catUrl .= '&category='.$category;
              }else{
                $catUrl .= ','.$category;
              }
           } // end foreach condition
        } // end if condition

        return redirect()->route('shop',$catUrl);
    }
}
