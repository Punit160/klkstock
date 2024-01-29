<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use Session;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
 
  
       public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $validator = $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);
        $Holiday = new Holiday();
        $Holiday->from = $request->from;
        $Holiday->to = $request->to;
        $Holiday->note = $request->note;
        $Holiday->date = date('d-m-Y');
        $Holiday->company_id = $usercompany;
        $Holiday->created_by = $useremployee;
        $Holiday->save();
        return back()->with('status', 'Holiday Added Successfully');
    }


    public function view_holiday(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['holiday'] = DB::table('holidays')->select('*')->get();
        return view('client.hrm.holiday.view-holiday', $data);
    }

    public function edit(Request $request, $id)
    {
        $holiday = Holiday::find($id);
        return response()->json($holiday);
    }


    public function update(Request $request)
    {

        $id = $request->holiday_id;
        $Holiday = Holiday::find($id);
        $Holiday->from = $request->from;
        $Holiday->to = $request->to;
        $Holiday->note = $request->note;
        $Holiday->save();
        return back()->with('status', 'Holiday Updated Successfully');
    }

    public function delete_holiday($id)
    {
        $Holiday = Holiday::find($id);

        $Holiday->delete();
        return back()->with('status', 'Holiday Deleted Successfully!!');
    }
}

