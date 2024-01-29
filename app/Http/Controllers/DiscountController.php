<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;
use Session;
use Excel;


class DiscountController extends Controller
{
    public function add_Discount(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        return view('client.setting.discount.add-discount');
    }
    public function view_Discount(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['Discount'] = DB::table('discounts')->where('company_id', $usercompany)->select('*')->get();
        return view('client.setting.discount.view-discount', $data);
    }
    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $Discount = new Discount();
        $Discount->name = $request->name;
        $Discount->plan = $request->plan;
        $Discount->applicable = $request->applicable;
        $Discount->status = $request->status;
        $Discount->valid_from = $request->valid_from;
        $Discount->valid_till = $request->valid_till;
        $Discount->type = $request->type;
        $Discount->value = $request->value;
        $Discount->min_qty = $request->min_qty;
        $Discount->max_qty = $request->max_qty;
        $Discount->monday = $request->monday;
        $Discount->tuesday = $request->tuesday;
        $Discount->wednesday = $request->wednesday;
        $Discount->thursday = $request->thursday;
        $Discount->friday = $request->friday;
        $Discount->saturday = $request->saturday;
        $Discount->sunday = $request->sunday;
        $Discount->company_id = $request->min_qty;
        $Discount->created_by = $request->max_qty;
        $Discount->date = date('d-m-Y');
        $Discount->company_id = $usercompany;
        $Discount->created_by = $useremployee;
        $Discount->save();
        return back()->with('status', 'Discount Added Successfully');
    }
    public function edit(Request $request, $id)
    {
        $data['Discount'] = Discount::find($id);
        return view('client.setting.discount.update-discount',$data);
    }


    public function update(Request $request)
    {
        $id = $request->Discount_id;
        $Discount = Discount::find($id);
        $Discount->name = $request->name;
        $Discount->plan = $request->plan;
        $Discount->applicable = $request->applicable;
        $Discount->status = $request->status;
        $Discount->valid_from = $request->valid_from;
        $Discount->valid_till = $request->valid_till;
        $Discount->type = $request->type;
        $Discount->value = $request->value;
        $Discount->min_qty = $request->min_qty;
        $Discount->max_qty = $request->max_qty;
        $Discount->monday = $request->monday;
        $Discount->tuesday = $request->tuesday;
        $Discount->wednesday = $request->wednesday;
        $Discount->thursday = $request->thursday;
        $Discount->friday = $request->friday;
        $Discount->saturday = $request->saturday;
        $Discount->sunday = $request->sunday;
        $Discount->company_id = $request->min_qty;
        $Discount->created_by = $request->max_qty;
        $Discount->date = date('d-m-Y');
        $Discount->save();
        return back()->with('status', 'Discount Updated Successfully');
    }

    public function delete_Discount($id, Request $request)
    {

        $Discount = Discount::find($id);
        $Discount->delete();
        return back()->with('status', 'Discount Deleted Successfully!!');
    }
   
}
