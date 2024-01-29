<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouruser;
use DB;
use Session;
use Hash;

class OuruserController extends Controller
{
   public function add_user(Request $request){
          return view('our.user.add-user');
   } 

   
   public function create(Request $request)
   {
       $validator = $request->validate([
           'name' => 'required|min:5|max:50',
           'email' => 'required|email|unique:ourusers,email',
           'password' => 'required|confirmed|min:6',
       ]);
   
       $user = new Ouruser();
       $user->name = $request->input('name');
       $user->email = $request->input('email');
       $user->password = Hash('sha256', $request->input('password')); 
       $user->role = $request->input('role');
       $user->doj = $request->input('doj');
       $user->employee_id = $request->input('employee_id');
       $user->phone = $request->input('phone');
       $user->gender = $request->input('gender');
       $user->status = $request->input('status');
       $user->created_by = $request->input('created_by');
       $user->save();
   
       return redirect()->route('add-our-user')->with('status', 'User Added Successfully');
   }


   public function view_user(Request $request){
       $data['user'] = DB::table('ourusers')->orderBy('name', 'DESC')->get();
       return view('our.user.view-user', $data);
     }

     public function edit(Request $request, $id){
       $data['user'] = Ouruser::find($id);
       return view('our.user.update-user', $data);
   }


   public function update(Request $request, $id)
   {
       $validator = $request->validate([
           'name' => 'required|min:5|max:50',
           'email' => 'required|email', 
       ]);
          $user = Ouruser::find($id);
          $user->name = $request->input('name');
          $user->email = $request->input('email');
          $user->role = $request->input('role');
          $user->doj = $request->input('doj');
          $user->employee_id = $request->input('employee_id');
          $user->phone = $request->input('phone');
          $user->gender = $request->input('gender');
          $user->status = $request->input('status');
          $user->save();
          return redirect(route('view-our-user'))->with('status', 'User Updated Successfully');
   }

   public function destroy($id){
       $user = Ouruser::find($id);
       $user->delete();
       return redirect(route("view-our-user"))->with('status', 'User Data Deleted Successfully!!');
   }

}
