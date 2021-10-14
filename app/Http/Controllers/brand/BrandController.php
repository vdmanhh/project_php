<?php

namespace App\Http\Controllers\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function brands()
    {
        $brands = Brand::latest()->get();
        return view('admin.brand.index',compact('brands'));
    }
    public function Addbrands(Request $request)
    {
        $validated = $request->validate([
            'brand_name_en' => 'required',
            'brand_name_hin' => 'required',
            'image' => 'required',
            // categories la ten bang trong csdl
        ], [
            'brand_name_en.required' => 'Please fill out information',

            'brand_name_hin.required' => 'Please fill out information',
            'image.required' => 'Please fill out information',
        ]);

        $images = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
        Image::make($images)->resize(300,200)->save('upload/brand/'.$name_gen);
        $last_img = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_image' => $last_img,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add brand was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

    public function brandsEdit($id){
        $brand = Brand::find($id);

        return view('admin.brand.edit',compact('brand'));
    }

    public function Updatebrands(Request $request,$id){
        $images = $request->file('image');
        if($images){
            unlink($request->oldimage);
            $name_gen = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
            Image::make($images)->resize(300,200)->save('upload/brand/'.$name_gen);
            $last_img = 'upload/brand/'.$name_gen;

            Brand::find($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_image' => $last_img,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'created_at' => Carbon::now()
            ]);

            $notice = array(
                'message' => 'Update brand was success',
                'alert-type' => 'success'
            );
            return Redirect()->route('brand')->with($notice);
        }
        else{
            Brand::find($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_hin' => $request->brand_name_hin,
                'brand_image' => $request->oldimage,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_hin' => str_replace(' ', '-', $request->brand_name_hin),
                'created_at' => Carbon::now()
            ]);

            $notice = array(
                'message' => 'Update brand was success',
                'alert-type' => 'success'
            );
            return Redirect()->route('brand')->with($notice);
        }
    }
    public function brandsDelete($id){
        Brand::find($id)->delete();

        return Redirect()->back();
    }
}
