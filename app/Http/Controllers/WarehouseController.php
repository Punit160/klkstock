<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\WarehouseImport;
use Excel;
use Session;

class WarehouseController extends Controller
{
 
    public function import_warehouse(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $filePath = $request->file('warehouse');
        $import = new WarehouseImport( $usercompany, $useremployee);
        Excel::import($import, $filePath);
        $savedCount = $import->getSavedCount();

        return back()->with('status', $savedCount . ' Rows Imported Successfully');
    }
       public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $validator = $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:warehouses',
        ]);

        $ware = new Warehouse();
        $ware->name = $request->name;
        $ware->phone = $request->phone;
        $ware->email = $request->email;
        $ware->address = $request->address;
        $ware->no_product = '0';
        $ware->stock_quantity = '0';
        $ware->company_id = $usercompany;
        $ware->created_by = $useremployee;
        $ware->save();
        return back()->with('status', 'Warehouse Added Successfully');
    }


    public function view_warehouse(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['warehouse'] = DB::table('warehouses')->select('*')->get();
        return view('client.setting.warehouse.view-warehouse', $data);
    }

    public function edit(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        return response()->json($warehouse);
    }


    public function update(Request $request)
    {

        $id = $request->warehouse_id;
        $ware = Warehouse::find($id);
        $ware->name = $request->name;
        $ware->phone = $request->phone;
        $ware->email = $request->email;
        $ware->address = $request->address;
        $ware->save();
        return back()->with('status', 'Warehouse Updated Successfully');
    }

    public function delete_warehouse($id)
    {
        $Warehouse = Warehouse::find($id);

        $Warehouse->delete();
        return back()->with('status', 'Warehouse Deleted Successfully!!');
    }
}
