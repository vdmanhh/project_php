<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function category(){
        $category = Category::latest()->get();
        return view('admin.category.index',compact('category'));
    }

    public function Addcate(Request $request){
        $validated = $request->validate([
            'category_name_en' => 'required',
            'category_name_hin' => 'required',
            'category_icon' => 'required',
            // categories la ten bang trong csdl
        ], [
            'category_name_en.required' => 'Please fill out information',

            'category_name_hin.required' => 'Please fill out information',
            'category_icon.required' => 'Please fill out information',
        ]);


        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_icon' => $request->category_icon,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add Category was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }
    public function CatesEdit($id){
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
    }

    public function UpdateCate(Request $request,$id){

        Category::find($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_icon' => $request->category_icon,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => str_replace(' ', '-', $request->category_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update Category was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('category')->with($notice);
    }
    public function categoryDelete($id){
        Category::find($id)->delete();
        $notice = array(
            'message' => 'Delete Category was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }
}
