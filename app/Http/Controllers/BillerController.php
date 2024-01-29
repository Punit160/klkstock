<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Biller;
use DB;
use Session;
use Illuminate\Support\Facades\File;
class BillerController extends Controller
{
    public function add_biller(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        return view('client.biller.add-biller', $data);
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
        'name' => 'required|min:5|max:50|unique:billers',
        'email' => 'required|email|unique:billers',
        'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp', 
    ]);
       $companyprefix = $request->session()->get('loginComprefix');
       $biller_rand = rand(100,999999);
       $date = date('d');
       $month = date('m');
       $year = date("y");
       $Biller_code = $companyprefix.$year.$month.$biller_rand.$date;
       $useremployee = $request->session()->get('loginEmployee');
       $usercompany = $request->session()->get('loginCompany');
       $biller = new Biller();
       $biller->name = $request->name;
       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/image/',$filename);
        $biller->image = $filename; 
       }
       $biller->company_name = $request->company_name;
       $biller->biller_code = $Biller_code;
       $biller->gst_number = $request->gst_number;
       $biller->vat_number = $request->vat_number;
       $biller->email = $request->email;
       $biller->phone = $request->phone;
       $biller->address = $request->address;
       $biller->city = $request->city;
       $biller->state = $request->state;
       $biller->country = $request->country;
       $biller->postal_code = $request->postal_code;
       $biller->company_id = $usercompany;
       $biller->status = $request->status;
       $biller->created_by = $useremployee;
       $biller->save();
       return redirect(route('view-biller'))->with('status', 'Biller Details Added Successfully');
    }

    
    public function view_biller(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        $data['biller'] = DB::table('billers')->orderBy('name', 'DESC')->get();
         return view('client.biller.view-biller', $data);
       }
 
       public function edit(Request $request, $id){
        $data['biller'] = Biller::find($id);
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
         return view('client.biller.update-biller', $data);
     }
 
 
     public function update(Request $request, $id)
     {
         $validator = $request->validate([
             'name' => 'required|min:5|max:50',
             'email' => 'required|email', 
         ]);
            $biller = Biller::find($id);
            $biller->name = $request->name;
       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/image/',$filename);
        $biller->image = $filename; 
       }
       $biller->company_name = $request->company_name;
       $biller->gst_number = $request->gst_number;
       $biller->vat_number = $request->vat_number;
       $biller->email = $request->email;
       $biller->phone = $request->phone;
       $biller->address = $request->address;
       $biller->city = $request->city;
       $biller->state = $request->state;
       $biller->country = $request->country;
       $biller->postal_code = $request->postal_code;
       $biller->status = $request->status;
       $biller->save();
   return redirect(route('view-biller'))->with('status', 'Biller Details Updated Successfully');
     }
 
     public function destroy($id){
        $biller = Biller::find($id);
         $destination = 'uploads/image/'.$biller->image;
         if(File::exists($destination)){
             File::delete($destination);
         }
         $biller->delete();
         return redirect(route("view-biller"))->with('status', 'Biller Details Deleted Successfully!!');
     }

}
