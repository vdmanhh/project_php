<?php

namespace App\Http\Controllers\admin\subcategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubCateController extends Controller
{
    //
    public function subcategory(){
       // $subs = SubCategory::latest()->get();
        $cates = Category::latest()->get();
        $subs = DB::table('sub_categories')
        ->join('categories','category_id','categories.id')
        -> select ('sub_categories.*','categories.category_name_en')
        ->get();
        return view('admin.subcate.index',compact('subs','cates'));
    }

    public function addsubcategory(Request $request){
            if($request->category_id =='Choose category'){
                $notice = array(
                    'message' => 'Please choose category',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notice);
            }
        $validated = $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_hin' => 'required',
            'category_id' => 'required',
            // categories la ten bang trong csdl
        ], [
            'subcategory_name_en.required' => 'Please fill out information',

            'subcategory_name_hin.required' => 'Please fill out information',
            'category_id.required' => 'Please fill out information',
        ]);

        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'category_id' => $request->category_id,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add SubCategory was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

    public function subCatesEdit($id){
            $subs = SubCategory::find($id);
            $cates = Category::latest()->get();
            return view('admin.subcate.edit',compact('subs','cates'));
    }

    public function UpdateSubCate(Request $request,$id){
        SubCategory::find($id)->update([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'category_id' => $request->category_id,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => str_replace(' ', '-', $request->subcategory_name_hin),
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update SubCategory was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('subcategory')->with($notice);
    }

    public function subcategoryDelete($id){
        SubCategory::find($id)->delete();
        $notice = array(
            'message' => 'Delete SubCategory was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }
}
