<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Department;
use Illuminate\Support\Facades\DB;

class DepartmentController extends Controller
{

    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $Department = new Department();
        $Department->name = $request->name;
        $Department->date = date('d-m-Y');
        $Department->company_id = $usercompany;
        $Department->created_by = $useremployee;
        $Department->save();
        return back()->with('status', 'Department Added Successfully');
    }


    public function add_department(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['department'] = DB::table('departments')->select('*')->get();
        return view('client.hrm.department.add-deparment', $data);
    }

    public function edit(Request $request, $id)
    {
        $Department = Department::find($id);
        return response()->json($Department);
    }

    public function update(Request $request)
    {
        $id = $request->department_id;
        $Department = Department::find($id);
        $Department->name = $request->name;
        $Department->save();
        return back()->with('status', 'Department Updated Successfully');
    }

    public function delete_Department($id)
    {
        $Department = Department::find($id);
        $Department->delete();
        return back()->with('status', 'Department Deleted Successfully!!');
    }
}
