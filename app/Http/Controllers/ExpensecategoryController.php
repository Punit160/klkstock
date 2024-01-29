<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expensecategory;
use App\Imports\ImportExpenseCategory;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class ExpensecategoryController extends Controller
{
    public function view_category(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['category'] = DB::table('expensecategories')->where('company_id', $usercompany)->orderBy('name', 'DESC')->get();
        return view('client.expense.view-expense-category', $data);
       }


       
       public function create(Request $request)
       {
           $validator = $request->validate([
               'name' => 'required',
           ]);
           $usercompany = $request->session()->get('loginCompany');
           $useremployee = $request->session()->get('loginEmployee');
           $category = new Expensecategory();
           $category->name = $request->input('name');
           $category->company_id = $usercompany;
           $category->created_by = $useremployee;
           $category->save();
           return back()->with('status', 'Expense Category Added Successfully');
       }

       public function edit(Request $request, $id)
       {
        $category = Expensecategory::find($id);
        return response()->json($category);
       }


       public function update(Request $request)
       {
        $validator = $request->validate([
            'name' => 'required',
            'catimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
           $category_id = $request->input('category_id');
           $category = Expensecategory::find($category_id);
           $category->name = $request->input('name');
           $category->save();
           return back()->with('status', 'Expense Category Updated Successfully');
       }


       public function import(Request $request)
       {
           $request->validate([
               'file' => 'required',
           ]);
           $companyId = $request->session()->get('loginCompany');
           $employeeId = $request->session()->get('loginEmployee');
           Excel::import(new ImportExpenseCategory($companyId, $employeeId), $request->file('file'));
           return back()->with('success', 'Expense Category Imported Successfully!');
       }

       public function destroy($id){
        $category = Expensecategory::find($id);
         $destination = 'uploads/image/'.$category->catimg;
         if(File::exists($destination)){
             File::delete($destination);
         }
         $category->delete();
         return back()->with('status', 'Expense Category Deleted Successfully!!');
     }
}
