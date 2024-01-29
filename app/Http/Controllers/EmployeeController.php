<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Imports\EmployeeImport;
use App\Models\User;
use Session;
use Excel;


class EmployeeController extends Controller
{
    public function add_Employee(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['department'] = DB::table('departments')->where('company_id', $usercompany)->select('*')->get();
        return view('client.hrm.employee.add-employee', $data);
    }
    public function view_Employee(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['employee'] = DB::table('Employees')->where('company_id', $usercompany)->get();
        $data['department'] = DB::table('departments')->where('company_id', $usercompany)->select('*')->get();
        return view('client.hrm.employee.view-employee', $data);
    }
    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $companyprefix = $request->session()->get('loginComprefix');
        $company_rand = rand(1000, 999999);
        $date = date('d');
        $month = date('m');
        $year = date("y");
        $employeeId = $companyprefix . $year . $month . $date . $company_rand;
        $Employee = new Employee();
        $Employee->name = $request->name;
        $Employee->status = $request->status;
        $Employee->dept = $request->dept;
        $Employee->contact = $request->contact;
        $Employee->address = $request->address;
        $Employee->email = $request->email;
        $Employee->city = $request->city;
        $Employee->country = $request->country;
        $Employee->staff_id = $request->staff_id;
        $Employee->emp_id = $employeeId;
        $Employee->doj = $request->doj;
        $Employee->company_id = $usercompany;
        $Employee->created_by = $useremployee;
        $Employee->save();
        return back()->with('status', 'Employee Added Successfully');
    }
    public function edit(Request $request, $id)
    {
        $employee = Employee::find($id);
        return response()->json($employee);
    }

    public function update(Request $request)
    {
        $id = $request->employee_id;
        $Employee = Employee::find($id);
        $Employee->name = $request->name;
        $Employee->dept = $request->dept;
        $Employee->status = $request->status;
        $Employee->contact = $request->contact;
        $Employee->address = $request->address;
        $Employee->email = $request->email;
        $Employee->city = $request->city;
        $Employee->country = $request->country;
        $Employee->doj = $request->doj;
        $Employee->save();
        return back()->with('status', 'Employee Updated Successfully');
    }

    public function delete_Employee($id, Request $request)
    {

        $Employee = Employee::find($id);
        $Employee->delete();
        return back()->with('status', 'Employee Deleted Successfully!!');
    }
   
}
