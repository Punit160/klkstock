<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Producttype;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProducttype;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class ProducttypeController extends Controller
{
    public function view_type(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['type'] = DB::table('producttypes')->where('company_id', $usercompany)->orderBy('name', 'DESC')->get();
        return view('client.product.view-type', $data);
       }

       public function create(Request $request)
       {
           $validator = $request->validate([
               'name' => 'required',
           ]);
           $usercompany = $request->session()->get('loginCompany');
           $useremployee = $request->session()->get('loginEmployee');
           $type = new Producttype();
           $type->name = $request->input('name');
           $type->no_product = 0;
           $type->stock_qty = 0;
           $type->company_id = $usercompany;
           $type->created_by = $useremployee;
           $type->save();
           return back()->with('status', 'Product type Added Successfully');
       }

       public function edit(Request $request, $id)
       {
        $type = Producttype::find($id);
        return response()->json($type);
       }


       public function update(Request $request)
       {
        $validator = $request->validate([
            'name' => 'required',
        ]);
           $type_id = $request->input('type_id');
           $type = Producttype::find($type_id);
           $type->name = $request->input('name');
           $type->save();
           return back()->with('status', 'Product type Updated Successfully');
       }


       public function import(Request $request)
       {
           $request->validate([
               'file' => 'required',
           ]);
           $companyId = $request->session()->get('loginCompany');
           $employeeId = $request->session()->get('loginEmployee');
           Excel::import(new ImportProducttype($companyId, $employeeId), $request->file('file'));
           return back()->with('success', 'Product type imported successfully!');
       }

       public function destroy($id){
        $type = Producttype::find($id);
         $type->delete();
         return back()->with('status', 'Product type Deleted Successfully!!');
     }
}
