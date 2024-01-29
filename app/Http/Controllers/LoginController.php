<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Session;


class LoginController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('loginName'))
        {
        $data['user'] =  $request->session()->get('loginName');
        return view('client.pages.login', $data);
        }else{
            return view('client.pages.login');
        }
       }
    
    
        public function loginuser(Request $request){
            $validator = $request->validate([
                'employee_id' => 'required',
                'password' => 'required'
            ]);
           
    
            $user = DB::table('users')->where('employee_id', '=', $request->employee_id)->first();
            if($user){
                if($request->input('password') == $user->password){
                    if($user->status == '1'){
                    $request->session()->put('loginId', $user->id );
                    $request->session()->put('loginEmail', $user->email);
                    $request->session()->put('loginName', $user->name);
                    $request->session()->put('loginRole', $user->role);
                    $request->session()->put('loginEmployee', $user->employee_id);
                    $request->session()->put('loginCompany', $user->company_id);
                    $request->session()->put('loginComprefix', $user->company_prefix);
                        return redirect(route('add-user'));
                    }
                    else{
                        return back()->with('status','Permission Denied !!!');
                    }
                }
                else{
                    return back()->with('status','Password not matches');
                }
            }  
        }

        public function logout(){
            if (Session::has('loginName')){
                Session::pull('loginName');
                Session::pull('loginId');
                Session::pull('role');
                return redirect(route('login'));
            }
        }
    
}
