<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;

class UserController extends Controller
{
    public function add_user(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        return view('client.user.add-user', $data);
    }


    public function create(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:5|max:50|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        $companyprefix = $request->session()->get('loginComprefix');
        $useremployee = $request->session()->get('loginEmployee');
        $usercompany = $request->session()->get('loginCompany');
        $user = new User();
        $company_rand = rand(1000, 999999);
        $order_rand = rand(1000, 99999);
        $date = date('d');
        $month = date('m');
        $year = date("y");
        $employeeId = $companyprefix . $year . $month . $date . $company_rand;
        $user->name = $request->name;
        $user->company_prefix = $companyprefix;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->doj = $request->doj;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->company_id = $usercompany;
        $user->employee_id = $employeeId;
        $user->status = $request->status;
        $user->created_by = $useremployee;
        $user->save();
        return redirect(route('view-user'))->with('status', 'User Added Successfully');
    }


    public function view_user(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        $data['user'] = DB::table('users')->orderBy('name', 'DESC')->get();
        return view('client.user.view-user', $data);
    }

    public function edit(Request $request, $id)
    {
        $data['user'] = User::find($id);
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        return view('client.user.update-user', $data);
    }


    public function update(Request $request, $id)
    {
        $validator = $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email',
        ]);
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->doj = $request->doj;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->status = $request->status;
        $user->save();
        return redirect(route('view-user'))->with('status', 'User Updated Successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route("view-user"))->with('status', 'User Data Deleted Successfully!!');
    }




    public function user_profile(Request $request)
    {
        $id = $request->session()->get('loginId');
        $data['user'] = User::find($id);
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['companyprefix'] = $request->session()->get('loginComprefix');
        return view('client.setting.user-profile.user-profile', $data);
    }

    public function change_password(Request $request)
    {
        $id = $request->session()->get('loginId');
        $data['user'] = User::find($id);
        $user = User::find($id);
        $request->validate([
            'CurrentPassword' => 'required',
            'NewPassword' => 'required',
            'ConfirmPassword' => 'required|same:NewPassword', 

        ]);

        $password = DB::table('users')->where('id', $id)->value('password');
        if ($password === $password) {
            $user->password = $request->NewPassword;
            $user->save();
        } 
        return redirect(route('user-profile'))->with('status', 'Password Changed Successfully');

        // return view('client.setting.user-profile.user-profile', $data);
    }


    public function update_profile(Request $request)
    {
        $id = $request->pid;
        $user = User::find($id);

        $validator = $request->validate([
            'name' => 'required|min:5|max:50',
            'email' => 'required|email',

        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->save();
        return back()->with('status', 'Profile Updated Successfully');
    }
}
