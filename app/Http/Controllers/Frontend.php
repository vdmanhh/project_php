<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::where('status',1)->where('product_tags_en',$tag)->where('product_tags_hin',$tag)->orderBy('id','DESC')->get();
        return view('frontend.body.product_tags',compact('products'));
    }
}
