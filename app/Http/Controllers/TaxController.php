<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tax;
use Illuminate\Support\Facades\DB;
use App\Imports\TaxImport;
use Session;
use Excel;


class TaxController extends Controller
{
    public function view_tax(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['tax'] = DB::table('taxes')->select('*')->get();
        return view('client.setting.tax.view-tax', $data);
    }
    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $Tax = new Tax();
        $Tax->name = $request->name;
        $Tax->rate = $request->rate;
        $Tax->company_id = $usercompany;
        $Tax->created_by = $useremployee;
        $Tax->save();
        return back()->with('status', 'Tax Added Successfully');
    }
    public function edit(Request $request, $id)
    {
        $Tax = Tax::find($id);
        return response()->json($Tax);
    }


    public function update(Request $request)
    {
        $id = $request->tax_id;
        $Tax = Tax::find($id);
        $Tax->name = $request->name;
        $Tax->rate = $request->rate;
        $Tax->save();
        return back()->with('status', 'Tax Updated Successfully');
    }

    public function delete_Tax($id,Request $request)
    {
       
        $Tax = Tax::find($id);
        $Tax->delete();
        return back()->with('status', 'Tax Deleted Successfully!!');
    }
    public function import_tax(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $filePath = $request->file('tax');
        $import = new TaxImport( $usercompany, $useremployee);
        Excel::import($import, $filePath);
        $savedCount = $import->getSavedCount();

        return back()->with('status', $savedCount . ' Rows Imported Successfully');
    }
}
