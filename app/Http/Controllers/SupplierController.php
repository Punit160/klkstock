<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use DB;
use Session;
use Illuminate\Support\Facades\File;

class SupplierController extends Controller
{
    public function add_Supplier(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        return view('client.supplier.add-supplier', $data);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
        'name' => 'required|min:5|max:50|unique:suppliers',
        'email' => 'required|email|unique:suppliers',
        'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp', 
    ]);
        $companyprefix = $request->session()->get('loginComprefix');
       $supplier_rand = rand(100,999999);
       $date = date('d');
       $month = date('m');
       $year = date("y");
       $supplier_code = $companyprefix .$year.$month.$supplier_rand.$date;
       $useremployee = $request->session()->get('loginEmployee');
       $usercompany = $request->session()->get('loginCompany');
       $supplier = new Supplier();
       $supplier->name = $request->name;
       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/image/',$filename);
        $supplier->image = $filename; 
       }
       $supplier->company_name = $request->company_name;
       $supplier->supplier_code = $supplier_code;
       $supplier->gst_number = $request->gst_number;
       $supplier->vat_number = $request->vat_number;
       $supplier->email = $request->email;
       $supplier->phone = $request->phone;
       $supplier->address = $request->address;
       $supplier->city = $request->city;
       $supplier->state = $request->state;
       $supplier->country = $request->country;
       $supplier->postal_code = $request->postal_code;
       $supplier->company_id = $usercompany;
       $supplier->status = $request->status;
       $supplier->created_by = $useremployee;
       $supplier->save();
       return redirect(route('view-supplier'))->with('status', 'Supplier Details Added Successfully');
    }

    
    public function view_Supplier(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        $data['supplier'] = DB::table('suppliers')->orderBy('name', 'DESC')->get();
         return view('client.supplier.view-supplier', $data);
       }
 
       public function edit(Request $request, $id){
        $data['supplier'] = Supplier::find($id);
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
         return view('client.supplier.update-supplier', $data);
     }
 
 
     public function update(Request $request, $id)
     {
         $validator = $request->validate([
             'name' => 'required|min:5|max:50',
             'email' => 'required|email', 
         ]);
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/image/',$filename);
        $supplier->image = $filename; 
       }
       $supplier->company_name = $request->company_name;
       $supplier->gst_number = $request->gst_number;
       $supplier->vat_number = $request->vat_number;
       $supplier->email = $request->email;
       $supplier->phone = $request->phone;
       $supplier->address = $request->address;
       $supplier->city = $request->city;
       $supplier->state = $request->state;
       $supplier->country = $request->country;
       $supplier->postal_code = $request->postal_code;
       $supplier->status = $request->status;
       $supplier->save();
   return redirect(route('view-supplier'))->with('status', 'Supplier Details Updated Successfully');
     }
 
     public function destroy($id){
        $supplier = Supplier::find($id);
         $destination = 'uploads/image/'.$supplier->image;
         if(File::exists($destination)){
             File::delete($destination);
         }
         $supplier->delete();
         return redirect(route("view-supplier"))->with('status', 'Supplier Details Deleted Successfully!!');
     }
}
