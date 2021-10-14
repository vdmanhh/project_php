<?php

namespace App\Http\Controllers\admin\subsubcate;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubSubCate extends Controller
{
    //
    public function subcategory(){
        //$subsubcate = SubSubCategory::latest()->get();
        $subsubcate = DB::table('sub_sub_categories')
        ->join('categories','category_id','categories.id')
        ->join('sub_categories','subcategory_id','sub_categories.id')
        -> select ('sub_sub_categories.*','categories.category_name_en','sub_categories.subcategory_name_en')
        ->get();



        $cates = Category::latest()->get();
        return view('admin.subsubcate.index',compact('cates','subsubcate'));
    }

    public function Addsubcategory(Request $request){
        $validated = $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            // categories la ten bang trong csdl
        ], [
            'subsubcategory_name_en.required' => 'Please fill out information',

            'subsubcategory_name_hin.required' => 'Please fill out information',
            'category_id.required' => 'Please fill out information',
            'subcategory_id.required' => 'Please fill out information',
        ]);


        SubSubCategory::insert([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'category_id' => $request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add SubSubCategory was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);

    }

    public function Editsubcategory($id){
            $subsubcate = SubSubCategory::find($id);
            $cates = Category::latest()->get();
            $subs = SubCategory::latest()->get();
            return view('admin.subsubcate.edit',compact('subsubcate','cates','subs'));
    }

    public function Updatesubcategory(Request $request,$id){
        SubSubCategory::find($id)->update([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'category_id' => $request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subsubcategory_name_en)),
            'subsubcategory_slug_hin' => str_replace(' ', '-', $request->subsubcategory_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update SubSubCategory was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('subsubcate')->with($notice);

    }
    public function Deletesubcategory($id){
        SubSubCategory::find($id)->delete();
        $notice = array(
            'message' => 'Deleted SubSubCategory was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }
}
