<?php

namespace App\Http\Controllers\product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    //
    public function product(){
        $brands = Brand::latest()->get();
        $cates =Category::latest()->get();
        return view('admin.product.addproduct',compact('brands','cates'));
    }

    public function addProduct(Request $request){

        $request->validate([
            'down' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:10000',
          ]);

          if ($files = $request->file('down')) {
            $destinationPath = 'upload/pdf'; // upload path
            $digitalItem = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath,$digitalItem);
          }




        //////
        $image = $request->file('product_thambnail');
    	$name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
    	Image::make($image)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
    	$save_url = 'upload/product/thambnail/'.$name_gen;

      $product_id = Product::insertGetId([
      	'brand_id' => $request->brand_id,
      	'category_id' => $request->category_id,
      	'subcategory_id' => $request->subcategory_id,
      	'subsubcategory_id' => $request->subsubcategory_id,
      	'product_name_en' => $request->product_name_en,
      	'product_name_hin' => $request->product_name_hin,
      	'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
      	'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
      	'product_code' => $request->product_code,

      	'product_qty' => $request->product_qty,
      	'product_tags_en' => $request->product_tags_en,
      	'product_tags_hin' => $request->product_tags_hin,
      	'product_size_en' => $request->product_size_en,
      	'product_size_hin' => $request->product_size_hin,
      	'product_color_en' => $request->product_color_en,
      	'product_color_hin' => $request->product_color_hin,

      	'selling_price' => $request->selling_price,
      	'discount_price' => $request->discount_price,
      	'short_descp_en' => $request->short_descp_en,
      	'short_descp_hin' => $request->short_descp_hin,
      	'long_descp_en' => $request->long_descp_en,
      	'long_descp_hin' => $request->long_descp_hin,

      	'hot_deals' => $request->hot_deals,
      	'featured' => $request->featured,
      	'special_offer' => $request->special_offer,
      	'special_deals' => $request->special_deals,

      	'product_thambnail' => $save_url,

          'down' => $digitalItem,
      	'status' => 1,
      	'created_at' => Carbon::now(),

      ]);

      // multi img

      $images = $request->file('multi_img');
      foreach ($images as $img) {
      	$make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/product/multi-image/'.$make_name);
    	$uploadPath = 'upload/product/multi-image/'.$make_name;

    	MultiImg::insert([

    		'product_id' => $product_id,
    		'photo_name' => $uploadPath,
    		'created_at' => Carbon::now(),

    	]);

      }
      ////////// Een Multiple Image Upload Start ///////////
       $notification = array(
			'message' => 'Product Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function product_manager(){

        $products = Product::latest()->get();
        return view('admin.product.manager',compact('products'));
    }

    /// update product
    public function product_edit($id){
        $product = Product::find($id);
        $brands = Brand::latest()->get();
        $cates = Category::latest()->get();
        $subs = SubCategory::latest()->get();
        $subsubs = SubSubCategory::latest()->get();
        $imgs = MultiImg::where('product_id',$id)->get();
        return view('admin.product.edit',compact('product','brands','subsubs','subs','cates','imgs'));
    }


    public function updateProduct(Request $request,$id){
        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_name_hin' => $request->product_name_hin,
            'product_slug_en' =>  strtolower(str_replace(' ', '-', $request->product_name_en)),
            'product_slug_hin' => str_replace(' ', '-', $request->product_name_hin),
            'product_code' => $request->product_code,

            'product_qty' => $request->product_qty,
            'product_tags_en' => $request->product_tags_en,
            'product_tags_hin' => $request->product_tags_hin,
            'product_size_en' => $request->product_size_en,
            'product_size_hin' => $request->product_size_hin,
            'product_color_en' => $request->product_color_en,
            'product_color_hin' => $request->product_color_hin,

            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'short_descp_hin' => $request->short_descp_hin,
            'long_descp_en' => $request->long_descp_en,
            'long_descp_hin' => $request->long_descp_hin,

            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'updated_at' => Carbon::now(),

        ]);

            $notification = array(
              'message' => 'Product Updated Successfully',
              'alert-type' => 'success'
          );

          return redirect()->back()->with($notification);
    }

    public function updateProductMultiImage(Request $request,$id){
        $images = $request->oldimage;
        foreach($images as $idx=> $img){
        $image = MultiImg::find($idx);


        unlink($image->photo_name);
        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
    	Image::make($img)->resize(917,1000)->save('upload/product/multi-image/'.$make_name);
    	$uploadPath = 'upload/product/multi-image/'.$make_name;

    	MultiImg::where('id',$id)->update([
    		'photo_name' => $uploadPath,
    		'updated_at' => Carbon::now(),

    	]);
        }

        $notification = array(
			'message' => 'Product Image Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }

    public function addMulti(Request $request,$id){

        $img = $request->file('add_iamge');
            if($img){
                $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/product/multi-image/'.$make_name);
                $uploadPath = 'upload/product/multi-image/'.$make_name;
              MultiImg::insert([

                  'product_id' => $id,
                  'photo_name' => $uploadPath,
                  'created_at' => Carbon::now(),

              ]);
              $notification = array(
                  'message' => 'Add Multiimage Successfully',
                  'alert-type' => 'info'
              );

              return redirect()->back()->with($notification);
            }
            $notification = array(
                'message' => 'Choose a Image to add Multi image',
                'alert-type' => 'warning'
            );

            return redirect()->back()->with($notification);
    }

    public function changetham(Request $request,$id){


        $img = $request->file('change_thamn');

        $make_name = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
      Image::make($img)->resize(917,1000)->save('upload/product/thambnail/'.$make_name);
      $uploadPath = 'upload/product/thambnail/'.$make_name;

        Product::findOrFail($id)->update([

            'product_thambnail' => $uploadPath,
        ]);

        $notification = array(
			'message' => 'Update Thambnail Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);
    }
    public function deletMul($id){
        $image = MultiImg::find($id);
        unlink( $image->photo_name);
        MultiImg::where('id',$id)->delete();

        $notification = array(
			'message' => 'Delete Multi Image Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function active($id){
        Product::find($id)->update([
            'status'=> '1'
        ]);
        $notification = array(
			'message' => 'Active Product Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function inactive($id){
        Product::find($id)->update([
            'status'=> '0'
        ]);
        $notification = array(
			'message' => 'InActive Product Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function deleteP($id){
        Product::find($id)->delete();
        $imgs = MultiImg::where('product_id',$id)->get();
        foreach($imgs as $key){
            unlink($key->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }


        $notification = array(
			'message' => 'Delete Product Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function detail_product($id,$slug){
        $product = Product::find($id);
        $imgs = MultiImg::where('product_id',$id)->get();
        $color = $product->product_color_en;
        $new_color = explode(',',$color);
        $size =  $product->product_size_en;
        $new_size =  explode(',',$size);
        $product_relevant = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->limit(4)->get();
        return view('frontend.body.detail',compact('product','imgs','new_size','new_color','product_relevant'));
    }
}
