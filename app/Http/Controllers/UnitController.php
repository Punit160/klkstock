<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUnit;
use DB;
use Session;

class UnitController extends Controller
{
    public function view_unit(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['unit'] = DB::table('units')->where('company_id', $usercompany)->orderBy('unit_name', 'DESC')->get();
        return view('client.setting.unit.view-unit', $data);
       }

      
       public function create(Request $request)
       {
           $validator = $request->validate([
               'unit_name' => 'required',
               'unit_code' => 'required',
           ]);
           $usercompany = $request->session()->get('loginCompany');
           $useremployee = $request->session()->get('loginEmployee');
           $unit = new Unit();
           $unit->unit_code = $request->input('unit_code');
           $unit->unit_name = $request->input('unit_name');
           if($request->input('base_unit') == ''){
            $unit->base_unit = 'NA';
            $unit->operator = '*'; 
            $unit->operation_value = '1';
           }
           else{
            $unit->base_unit = $request->input('base_unit');
            $unit->operator = $request->input('operator'); 
            $unit->operation_value = $request->input('operation_value');
           }
           $unit->company_id = $usercompany;
           $unit->created_by = $useremployee;
           $unit->save();
           return back()->with('status', 'Units Added Successfully');
       }


public function edit(Request $request, $id)
{
    $unit = Unit::find($id);
    return response()->json($unit);
}


public function update(Request $request)
       {
           $validator = $request->validate([
               'unit_name' => 'required',
               'unit_code' => 'required',
           ]);
           $unit_id = $request->input('unit_id');
           $unit = Unit::find($unit_id);
           $unit->unit_code = $request->input('unit_code');
           $unit->unit_name = $request->input('unit_name');
           if($request->input('base_unit') == ''){
            $unit->base_unit = 'NA';
            $unit->operator = '*'; 
            $unit->operation_value = '1';
           }
           else{
            $unit->base_unit = $request->input('base_unit');
            $unit->operator = $request->input('operator'); 
            $unit->operation_value = $request->input('operation_value');
           }
           $unit->save();
           return back()->with('status', 'Units Update Successfully');
       }


       public function import(Request $request)
    {
        $request->validate([
            'file' => 'required',
        ]);
        $companyId = $request->session()->get('loginCompany');
        $employeeId = $request->session()->get('loginEmployee');
        Excel::import(new ImportUnit($companyId, $employeeId), $request->file('file'));
        return back()->with('success', 'Units imported successfully!');
    }

    public function destroy($id){
        $unit = Unit::find($id);
        $unit->delete();
        return back()->with('status', 'Unit Data Deleted Successfully!!');
    }
}
