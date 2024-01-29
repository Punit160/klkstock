<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerGroup;
use Illuminate\Support\Facades\DB;
use App\Imports\CustomerGroupsImport;
use Excel;

class CustomerGroupController extends Controller
{
    


    public function import_customerGroup(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $filePath = $request->file('Customer');
        $import = new CustomerGroupsImport( $usercompany, $useremployee);
        Excel::import($import, $filePath);
        $savedCount = $import->getSavedCount();

        return back()->with('status', $savedCount . ' Rows Imported Successfully');
    }
    public function add_customerGroup(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['Customer'] = DB::table('customer_groups')->select('*')->get();
        return view('client.setting.CustomerGroup.add-customer-group',$data);
    }

    public function create(Request $request)
    {

        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $Customer = new CustomerGroup();
        $Customer->name = $request->name;
        $Customer->percentage = $request->percentage;
        $Customer->company_id = $usercompany;
        $Customer->created_by = $useremployee;
        $Customer->save();
        return back()->with('status', 'Customer Added Successfully');
    }



    public function edit(Request $request, $id)
    {
        $Customer = CustomerGroup::find($id);
        return response()->json($Customer);
    }


    public function update(Request $request)
    {

        $id = $request->cid;
        $Customer = CustomerGroup::find($id);
        $Customer->name = $request->name;
        $Customer->percentage = $request->percentage;
        $Customer->save();
        return back()->with('status', 'Customer Updated Successfully');
    }

    public function delete_customerGroup($id)
    {
        $Customer = CustomerGroup::find($id);
        $Customer->delete();
        return back()->with('status', 'Customer Deleted Successfully!!');
    }
}
