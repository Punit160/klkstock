<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generalsetting;
use Illuminate\Support\Facades\DB;

class GeneralSettingController extends Controller
{
  
    public function add_general(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['general'] = DB::table('generalsettings')->where('company_id', $usercompany)->select('*')->get();
        return view('client.setting.generalsetting.add-generalsetting', $data);
    }

    public function create(Request $request)
    {
        
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
      

        $general = new Generalsetting();
        $general->sys_title = $request->sys_title;
        if ($request->hasfile('sys_logo')) {
            $file = $request->file('sys_logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/general/', $filename);
            $general->sys_logo = $filename;
        }
        $general->rtl = $request->rtl;
        $general->company_name = $request->company_name;
        $general->vat_no = $request->vat_no;
        $general->time_zone = $request->time_zone;
        $general->currency = $request->currency;
        $general->current_pstn = $request->current_pstn;
        $general->after_decimal = $request->after_decimal;
        $general->without_stock = $request->without_stock;
        $general->staff_access = $request->staff_access;
        $general->invoice_formet = $request->invoice_formet;
        $general->date_formet = $request->date_formet;
        $general->created_by = $request->created_by;
        $general->company_id = $usercompany;
        $general->created_by = $useremployee;
        $general->save();
        return back()->with('status', 'general Added Successfully');
    }


   
   

   
}
