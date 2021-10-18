<?php

namespace App\Http\Controllers\slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Image;
class SliderController extends Controller
{
    //
    public function slider(){
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    public function add_slider(Request $request){
        $validated = $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            // categories la ten bang trong csdl
        ], [
            'title.required' => 'Please fill out information',

            'desc.required' => 'Please fill out information',
            'image.required' => 'Please fill out information',
        ]);

        $images = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
        Image::make($images)->resize(300,200)->save('upload/slider/'.$name_gen);
        $last_img = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $last_img,

            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add Slider was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }


    public function edit_slider($id){
        $slider = Slider::find($id);
        return view('admin.slider.edit',compact('slider'));
    }

    public function update_slider(Request $request,$id){
        $images = $request->file('image');
        if($images){
            unlink($request->oldimage);
            $name_gen = hexdec(uniqid()).'.'.$images->getClientOriginalExtension();
            Image::make($images)->resize(300,200)->save('upload/slider/'.$name_gen);
            $last_img = 'upload/slider/'.$name_gen;

            Slider::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $last_img,

                'created_at' => Carbon::now()
            ]);

            $notice = array(
                'message' => 'Update slider was success',
                'alert-type' => 'success'
            );
            return Redirect()->route('slider')->with($notice);
        }
        else{
            Slider::find($id)->update([
                'title' => $request->title,
                'desc' => $request->desc,
                'image' => $request->oldimage,

                'created_at' => Carbon::now()
            ]);

            $notice = array(
                'message' => 'Update slider was success',
                'alert-type' => 'success'
            );
            return Redirect()->route('slider')->with($notice);
        }
    }

    public function delete_slider($id){
        $slider = Slider::find($id);
        unlink($slider->image);
        Slider::find($id)->delete();
        $notice = array(
            'message' => 'Deleted slider was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }


    public function active($id){
        Slider::find($id)->update([
            'status'=> '1'
        ]);
        $notification = array(
			'message' => 'Active Slider Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function inactive($id){
        Slider::find($id)->update([
            'status'=> '0'
        ]);
        $notification = array(
			'message' => 'InActive Slider Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function korean(){
        session()->get('language');
        session()->forget('language');
        session(['language' => 'korean']);
       return Redirect()->back();
    }

    public function english(){
        session()->get('language');
        session()->forget('language');
        session(['language' => 'english']);
       return Redirect()->back();
    }
}
