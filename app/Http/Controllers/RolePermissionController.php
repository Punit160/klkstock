<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Session;

class RolePermissionController extends Controller
{
    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $Role = new Role();
        $Role->name = $request->name;
        $Role->description = $request->description;
        $Role->company_id = $usercompany;
        $Role->created_by = $useremployee;
        $Role->save();
        return back()->with('status', 'Role  Added Successfully');
    }


    public function add_RolePermission(Request $request)
    {
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $data['role'] = DB::table('roles')->select('*')->get();
        return view('client.setting.role-permission.add-role', $data);
    }

    public function edit(Request $request, $id)
    {
        $role = Role::select('id', 'name', 'description')->find($id);
        return response()->json($role);
    }

    public function editPermission(Request $request, $id)
    {
        $data['role'] = Role::find($id);
        return view('client.setting.role-permission.change-permission', $data);
    }


    public function update(Request $request)
    {

        $id = $request->role_id;
        $Role = Role::find($id);
        $Role->product_view = $request->product_view;
        $Role->product_add = $request->product_add;
        $Role->product_edit = $request->product_edit;
        $Role->product_delete = $request->product_delete;
        $Role->purchase_view = $request->purchase_view;
        $Role->purchase_add = $request->purchase_add;
        $Role->purchase_edit = $request->purchase_edit;
        $Role->purchase_delete = $request->purchase_delete;
        $Role->purchase_pymt_view = $request->purchase_pymt_view;
        $Role->purchase_pymt_add = $request->purchase_pymt_add;
        $Role->purchase_pymt_edit = $request->purchase_pymt_edit;
        $Role->purchase_pymt_delete = $request->purchase_pymt_delete;
        $Role->sale_view = $request->sale_view;
        $Role->sale_add = $request->sale_add;
        $Role->sale_edit = $request->sale_edit;
        $Role->sale_delete = $request->sale_delete;
        $Role->sale_pymt_view = $request->sale_pymt_view;
        $Role->sale_pymt_add = $request->sale_pymt_add;
        $Role->sale_pymt_edit = $request->sale_pymt_edit;
        $Role->sale_pymt_delete = $request->sale_pymt_delete;
        $Role->expense_view = $request->expense_view;
        $Role->expense_add = $request->expense_add;
        $Role->expense_edit = $request->expense_edit;
        $Role->expense_delete = $request->expense_delete;
        $Role->quotation_view = $request->quotation_view;
        $Role->quotation_add = $request->quotation_add;
        $Role->quotation_edit = $request->quotation_edit;
        $Role->quotation_delete = $request->quotation_delete;
        $Role->transfer_view = $request->transfer_view;
        $Role->transfer_add = $request->transfer_add;
        $Role->transfer_edit = $request->transfer_edit;
        $Role->transfer_delete = $request->transfer_delete;
        $Role->sale_return_view = $request->sale_return_view;
        $Role->sale_return_add = $request->sale_return_add;
        $Role->sale_return_edit = $request->sale_return_edit;
        $Role->sale_return_delete = $request->sale_return_delete;
        $Role->purchase_return_view = $request->purchase_return_view;
        $Role->purchase_return_add = $request->purchase_return_add;
        $Role->purchase_return_edit = $request->purchase_return_edit;
        $Role->purchase_return_delete = $request->purchase_return_delete;
        $Role->employee_view = $request->employee_view;
        $Role->employee_add = $request->employee_add;
        $Role->employee_edit = $request->employee_edit;
        $Role->employee_delete = $request->employee_delete;
        $Role->user_view = $request->user_view;
        $Role->user_add = $request->user_add;
        $Role->user_edit = $request->user_edit;
        $Role->user_delete = $request->user_delete;
        $Role->customer_view = $request->customer_view;
        $Role->customer_add = $request->customer_add;
        $Role->customer_edit = $request->customer_edit;
        $Role->customer_delete = $request->customer_delete;
        $Role->biller_add = $request->biller_add;
        $Role->biller_view = $request->biller_view;
        $Role->biller_edit = $request->biller_edit;
        $Role->biller_delete = $request->biller_delete;
        $Role->supplier_add = $request->supplier_add;
        $Role->supplier_view = $request->supplier_view;
        $Role->supplier_edit = $request->supplier_edit;
        $Role->supplier_delete = $request->supplier_delete;
        $Role->dshbrd_proft_smry = $request->dshbrd_proft_smry;
        $Role->dshbrd_cash_flow = $request->dshbrd_cash_flow;
        $Role->dshbrd_mnth_smry = $request->dshbrd_mnth_smry;
        $Role->dshbrd_yr_rprt = $request->dshbrd_yr_rprt;
        $Role->acc_account = $request->acc_account;
        $Role->acc_mny_tnsfr = $request->acc_mny_tnsfr;
        $Role->acc_blnce_sheet = $request->acc_blnce_sheet;
        $Role->acc_account_stmt = $request->acc_account_stmt;
        $Role->hrm_dept = $request->hrm_dept;
        $Role->hrm_atndce = $request->hrm_atndce;
        $Role->hrm_payroll = $request->hrm_payroll;
        $Role->hrm_holiday = $request->hrm_holiday;
        $Role->rpt_smry = $request->rpt_smry;
        $Role->rpt_best_seller = $request->rpt_best_seller;
        $Role->rpt_daily_sale = $request->rpt_daily_sale;
        $Role->rpt_mnth_sale = $request->rpt_mnth_sale;
        $Role->rpt_daily_purchse = $request->rpt_daily_purchse;
        $Role->rpt_mnth_purchse = $request->rpt_mnth_purchse;
        $Role->rpt_product = $request->rpt_product;
        $Role->rpt_payment = $request->rpt_payment;
        $Role->rpt_purchse = $request->rpt_purchse;
        $Role->rpt_sale = $request->rpt_sale;
        $Role->rpt_sale_chrt = $request->rpt_sale_chrt;
        $Role->rpt_warehouse = $request->rpt_warehouse;
        $Role->rpt_warehouse_chrt = $request->rpt_warehouse_chrt;
        $Role->rpt_product_expry = $request->rpt_product_expry;
        $Role->rpt_dailysale_obj = $request->rpt_dailysale_obj;
        $Role->rpt_product_qty = $request->rpt_product_qty;
        $Role->rpt_user = $request->rpt_user;
        $Role->rpt_customer = $request->rpt_customer;
        $Role->rpt_customer_due = $request->rpt_customer_due;
        $Role->rpt_supplier = $request->rpt_supplier;
        $Role->rpt_supplier_due = $request->rpt_supplier_due;
        $Role->Seting_cstm_feld = $request->Seting_cstm_feld;
        $Role->Seting_all_notifctn = $request->Seting_all_notifctn;
        $Role->Seting_send_notifctn = $request->Seting_send_notifctn;
        $Role->Seting_dscnt = $request->Seting_dscnt;
        $Role->Seting_warehouse = $request->Seting_warehouse;
        $Role->Seting_custmr_grp = $request->Seting_custmr_grp;
        $Role->Seting_brand = $request->Seting_brand;
        $Role->Seting_unit = $request->Seting_unit;
        $Role->Seting_currency = $request->Seting_currency;
        $Role->Seting_tax = $request->Seting_tax;
        $Role->Seting_generl = $request->Seting_generl;
        $Role->Seting_mail = $request->Seting_mail;
        $Role->Seting_sms = $request->Seting_sms;
        $Role->Seting_create_sms = $request->Seting_create_sms;
        $Role->Seting_pos = $request->Seting_pos;
        $Role->Seting_hrm = $request->Seting_hrm;
        $Role->Seting_reward_point = $request->Seting_reward_point;
        $Role->misc_category = $request->misc_category;
        $Role->misc_delivery = $request->misc_delivery;
        $Role->misc_stockcnt = $request->misc_stockcnt;
        $Role->misc_adjust = $request->misc_adjust;
        $Role->misc_giftcard = $request->misc_giftcard;
        $Role->misc_coupon = $request->misc_coupon;
        $Role->misc_prodct_histry = $request->misc_prodct_histry;
        $Role->misc_pbarcode = $request->misc_pbarcode;
        $Role->misc_emp_db = $request->misc_emp_db;
        $Role->misc_today_sale = $request->misc_today_sale;
        $Role->misc_today_profit = $request->misc_today_profit;
        $Role->company_id = $request->company_id;
        $Role->created_by = $request->created_by;
        $Role->created_at = $request->created_at;
        $Role->updated_at = $request->updated_at;
        $Role->save();
        return back()->with('status', 'Role Added Successfully');
        $Role->save();
        return back()->with('status', 'Role Updated Successfully');
    }

    public function delete_RolePermission($id)
    {
        $RolePermission = Role::find($id);
        $RolePermission->delete();
        return back()->with('status', 'Role Deleted Successfully!!');
    }
}
