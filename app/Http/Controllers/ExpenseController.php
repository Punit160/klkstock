<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Expensecategory;
use App\Models\Expense;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class ExpenseController extends Controller
{
    public function view_expense(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['category'] = DB::table('expensecategories')->where('company_id', $usercompany)->orderBy('name', 'DESC')->get();
        $data['warehouse'] = DB::table('warehouses')->where('company_id', $usercompany)->orderBy('name')->get();
        $data['expense'] = DB::table('expenses')->where('company_id', $usercompany)->orderBy('id', 'DESC')->get();
        return view('client.expense.view-expense', $data);
       }


       public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $companyprefix = $request->session()->get('loginComprefix');
        $refrence1 = rand(1000, 999999);
        $refrence2 = rand(1000, 999999);
        $expense = new Expense();
        $expense->date = $request->date;
        $expense->warehouse_id = $request->warehouse_id;
        $expense->refrence_no = $companyprefix .'_'.$refrence1. '-' . $refrence2;
        $expense->category_id = $request->category_id;
        $expense->amount = $request->amount;
        $expense->remarks = $request->remarks;
        $expense->company_id = $usercompany;
        $expense->created_by = $useremployee;
        $expense->save();
        return back()->with('status', 'expense Added Successfully');
    }

    public function edit(Request $request, $id)
    {
     $expense = Expense::find($id);
     return response()->json($expense);
    }


    public function update(Request $request)
    {
        $expense_id = $request->input('expense_id');
        $expense = Expense::find($expense_id);
        $expense->date = $request->date;
        $expense->warehouse_id = $request->warehouse_id;
        $expense->category_id = $request->category_id;
        $expense->amount = $request->amount;
        $expense->remarks = $request->remarks;
        $expense->save();
        return back()->with('status', 'Expense Updated Successfully');
    }

    public function destroy($id){
        $expense = Expense::find($id);
        $expense->delete();
        return back()->with('status', 'Expense Deleted Successfully!!');
     }
}
