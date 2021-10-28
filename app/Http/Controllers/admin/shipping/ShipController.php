<?php

namespace App\Http\Controllers\admin\shipping;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShipController extends Controller
{
    //

    public function coupon(){
        $divisions = Division::latest()->get();
       return view('admin.ship.division.index',compact('divisions'));
    }

    public function AddDivision(Request $request){
        $validated = $request->validate([
            'name_disvision' => 'required',

            // categories la ten bang trong csdl
        ], [
            'name_disvision.required' => 'Please fill out information',

        ]);


        Division::insert([
            'name_disvision' => $request->name_disvision,

            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add Division was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);

    }
    public function divisionEdit($id){
        $division = Division::find($id);
       return view('admin.ship.division.edit',compact('division'));
    }
    public function update_division(Request $request,$id){
        Division::find($id)->update([
            'name_disvision' => $request->name_disvision,

            'updated_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update Division was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('ship')->with($notice);
    }

    public function division_delete($id){
        Division::find($id)->delete();

        $notice = array(
            'message' => 'Delete Division was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

    //district

    public function district(){
        $divisions = Division::latest()->get();
        $districts = DB::table('districts')
        ->join('divisions','districts.division_id','divisions.id')
        ->select('districts.*','divisions.name_disvision')
        ->latest()->get();
       return view('admin.ship.district.index',compact('districts','divisions'));
    }

    public function Adddistrict(Request $request){
        $validated = $request->validate([
            'name_disvision' => 'required',
            'district_name' => 'required',
            // categories la ten bang trong csdl
        ], [
            'name_disvision.required' => 'Please fill out information',
            'district_name.required' => 'Please fill out information',
        ]);


        District::insert([
            'division_id' => $request->name_disvision,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add District was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

    public function districtEdit($id){
        $district = District::find($id);
        $divisions = Division::latest()->get();
       return view('admin.ship.district.edit',compact('district','divisions'));
    }


    public function districtUpdate(Request $request,$id){
        District::find($id)->update([
            'district_name' => $request->district_name,
            'division_id' => $request->division_id,
            'updated_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update District was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('district')->with($notice);
    }


    public function deleteDis($id){
        District::find($id)->delete();

        $notice = array(
            'message' => 'Delete District was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

    public function state(){
        $divisions = Division::latest()->get();
        $districts = District::latest()->get();
        $states = DB::table('states')
        ->join('divisions','states.division_id','divisions.id')
        ->join('districts','states.district_id','districts.id')
        ->select('states.*','divisions.name_disvision','districts.district_name')
        ->latest()->get();
       return view('admin.ship.state.index',compact('states','divisions','districts'));
    }

    /// state

    public function Addstate(Request $request){
        $request->validate([
            'name_disvision' => 'required',
            'district_name' => 'required',
            'state_name' => 'required',
            // categories la ten bang trong csdl
        ]);


        State::insert([
            'division_id' => $request->name_disvision,
            'district_id' => $request->district_name,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Add State was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }


    public function Editstate($id){
        $district = District::latest()->get();
        $divisions = Division::latest()->get();
        $state = State::find($id);
       return view('admin.ship.state.edit',compact('district','divisions','state'));
    }

    public function Updatestate(Request $request,$id){
        State::find($id)->update([
            'state_name' => $request->state_name,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'updated_at' => Carbon::now()
        ]);

        $notice = array(
            'message' => 'Update State was success',
            'alert-type' => 'success'
        );
        return Redirect()->route('state')->with($notice);
    }


    public function deletestate($id){
        State::find($id)->delete();

        $notice = array(
            'message' => 'Delete State was success',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notice);
    }

}
