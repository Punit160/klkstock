<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouruser;
use App\Models\Ourclient;
use App\Models\Ourorder;
use App\Models\User;
use DB;
use Session;
use hash;

class OurclientController extends Controller
{
    public function add_client(Request $request){
        return view('our.client.add-client');
    }


    public function create(Request $request)
    {
        $validator = $request->validate([
        'company_name' => 'required|min:8|max:200|unique:ourclients',
        'company_prefix' => 'required|min:2|unique:ourclients',
        'email' => 'required|email|unique:ourclients',
        'password' => 'unique:ourclients',
        'company_id' => 'unique:company_id',   
    ]);
       
       $client = new Ourclient();
       $pass_rand = rand(10000,99999);
       $company_rand = rand(1000,999999);
       $order_rand = rand(1000,99999);
       $date = date('d');
       $month = date('m');
       $year = date("y");
       $password = 'APK@'.$year.$pass_rand;
       $orderId = 'Ord'.$month.$year.$order_rand;
       $companyId = 'APK'.$year.$month.$date.$company_rand;
       $client->package = $request->package;
       $client->company_name = $request->company_name;
       $client->company_prefix = $request->company_prefix;
       $client->company_id = $companyId;
       $client->order_id = $orderId;
       $client->password = $password;
       $client->gst_number = $request->gst_number;
       $client->email = $request->email;
       $client->phone = $request->phone;
       $client->alternate_phone = $request->alternate_phone;
       $client->address = $request->address;
       $client->doj = $request->doj;
       $client->status = $request->status;
       $client->sale_id = $request->sale_id;
       $client->payment_detail = $request->payment_detail;
       $client->price = $request->price;
       $client->referal_code = $request->referal_code;
       $client->save();
       if($client){
        $user = new User();
        $user->name = $request->company_name;
        $user->company_prefix = $request->company_prefix;
        $user->email = $request->email;
        $user->password = $password;
        $user->role = '1';
        $user->company_id = $companyId;
        $user->employee_id = $companyId;
        $user->doj = $request->doj;
        $user->phone = $request->phone;
        $user->status = $request->status;
        $user->save();
        if($user){
            $order = new Ourorder();
            $order->order_id = $orderId;
            $order->package = $request->package;
            $order->company_id = $companyId;
            $order->sale_id = $request->sale_id;
            $order->start_date = date('d-m-Y');
            $order->payment_detail = $request->payment_detail;
            $order->price = $request->price;
            $order->referal_code = $request->referal_code;
            $order->save();
        }
       }
       return redirect(route('view-our-client'))->with('status', 'client Added Successfully!!');
    }


    public function view_client(Request $request){
      $data['client'] = DB::table('ourclients')->orderBy('company_name', 'DESC')->get();
      return view('our.client.view-client', $data);
    }

    public function edit(Request $request, $id){
        $data['client'] = Ourclient::find($id);
        return view('our.client.update-client', $data);
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
        'company_name' => 'required|min:8|max:200',
        'email' => 'required|email',
    ]);      
       $client = Ourclient::find($id);
       $client->package = $request->package;
       $client->company_name = $request->company_name;
       $client->gst_number = $request->gst_number;
       $client->email = $request->email;
       $client->phone = $request->phone;
       $client->alternate_phone = $request->alternate_phone;
       $client->address = $request->address;
       $client->doj = $request->doj;
       $client->status = $request->status;
       $client->save();
       if($client){
        DB::table('users')->where('company_id', $request->company_id)->where('role', '1')->update(['name' => $request->company_name, 'email' => $request->email,
         'doj' =>  $request->doj, 'phone' => $request->phone]);

         if($request->status){
            DB::table('users')->where('company_id', $request->company_id)->update(['status' => $request->status]);
         }
       }

       return redirect(route('view-client'))->with('status', 'Client Data Updated Successfully!!');
    }

    public function destroy($id){
        $client = Ourclient::find($id);
        $client->delete();
        if($client){
        DB::table('users')->where('company_id', $client->company_id)->delete();   
        }
        return redirect(route("view-client"))->with('status', 'Client Data Deleted Successfully!!');
    }
}
