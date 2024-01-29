@include('client.component.tablehead')
@include('client.component.header')
@include('client.component.sidebar')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: fit-content !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card " style="border-top: 4px solid #0c1476; border-bottom: 4px solid #0c1476;">
            <div class="card-header bg-light">
                            <h3 class="card-title"> <span style="text-transform:uppercase"> {{$role->name}} </span> Group Permission</h3>

                            <div class="card-tools">
                                <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>bhai
                                </button> -->
                            </div>
                        </div>
                <form action="{{route('update-permission')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="card-body">
                    <div class="mx-3 pt-3 rounded">
                        <table class="w-100 table table-bordered table-striped d-block d-lg-table" style="overflow-x: scroll;">
                        <input type="hidden" name="role_id" value="{{$role->id}}">

                            <thead class="table-secondary text-center">
                                <tr>
                                    <th rowspan="2" class="w-25 text-left pl-5">Module Name</th>
                                    <th colspan="4"><input type="checkbox" name="allPermission" id="allPermission">&emsp;Permissions</th>
                                </tr>
                                <tr>
                                    <th>View</th>
                                    <th>Add</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>
                                    <td class="w-25 text-left pl-5">Product</td>
                                    <td><input {{$role->product_view === '1' ? 'checked': '' }} type="checkbox" name="product_view" id="product_view" value="1"></td>
                                    <td><input {{$role->product_add === '1' ? 'checked': '' }} type="checkbox" name="product_add" id="product_add" value="1"></td>
                                    <td><input {{$role->product_edit === '1' ? 'checked': '' }} type="checkbox" name="product_edit" id="product_edit" value="1"></td>
                                    <td><input {{$role->product_delete === '1' ? 'checked': '' }} type="checkbox" name="product_delete" id="product_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Purchase</td>
                                    <td><input {{$role->purchase_view === '1' ? 'checked': '' }} type="checkbox" name="purchase_view" id="purchase_view" value="1"></td>
                                    <td><input {{$role->purchase_add === '1' ? 'checked': '' }} type="checkbox" name="purchase_add" id="purchase_add" value="1"></td>
                                    <td><input {{$role->purchase_edit === '1' ? 'checked': '' }} type="checkbox" name="purchase_edit" id="purchase_edit" value="1"></td>
                                    <td><input {{$role->purchase_delete === '1' ? 'checked': '' }} type="checkbox" name="purchase_delete" id="purchase_delete" value="1"></td>

                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Purchase Payment</td>
                                    <td><input {{$role->purchase_pymt_view === '1' ? 'checked': '' }} type="checkbox" name="purchase_pymt_view" id="purchase_pymt_view" value="1"></td>
                                    <td><input {{$role->purchase_pymt_add === '1' ? 'checked': '' }} type="checkbox" name="purchase_pymt_add" id="purchase_pymt_add" value="1"></td>
                                    <td><input {{$role->purchase_pymt_edit === '1' ? 'checked': '' }} type="checkbox" name="purchase_pymt_edit" id="purchase_pymt_edit" value="1"></td>
                                    <td><input {{$role->purchase_pymt_delete === '1' ? 'checked': '' }} type="checkbox" name="purchase_pymt_delete" id="purchase_pymt_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Sale</td>
                                    <td><input {{$role->sale_view === '1' ? 'checked': '' }} type="checkbox" name="sale_view" id="sale_view" value="1"></td>
                                    <td><input {{$role->sale_add === '1' ? 'checked': '' }} type="checkbox" name="sale_add" id="sale_add" value="1"></td>
                                    <td><input {{$role->sale_edit === '1' ? 'checked': '' }} type="checkbox" name="sale_edit" id="sale_edit" value="1"></td>
                                    <td><input {{$role->sale_delete === '1' ? 'checked': '' }} type="checkbox" name="sale_delete" id="sale_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Sale Payment</td>
                                    <td><input {{$role->sale_pymt_view === '1' ? 'checked': '' }} type="checkbox" name="sale_pymt_view" id="sale_pymt_view" value="1"></td>
                                    <td><input {{$role->sale_pymt_add === '1' ? 'checked': '' }} type="checkbox" name="sale_pymt_add" id="sale_pymt_add" value="1"></td>
                                    <td><input {{$role->sale_pymt_edit === '1' ? 'checked': '' }} type="checkbox" name="sale_pymt_edit" id="sale_pymt_edit" value="1"></td>
                                    <td><input {{$role->sale_pymt_delete === '1' ? 'checked': '' }} type="checkbox" name="sale_pymt_delete" id="sale_pymt_delete" value="1"></td>

                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Expense</td>
                                    <td><input {{$role->expense_view === '1' ? 'checked': '' }} type="checkbox" name="expense_view" id="expense_view" value="1"></td>
                                    <td><input {{$role->expense_add === '1' ? 'checked': '' }} type="checkbox" name="expense_add" id="expense_add" value="1"></td>
                                    <td><input {{$role->expense_edit === '1' ? 'checked': '' }} type="checkbox" name="expense_edit" id="expense_edit" value="1"></td>
                                    <td><input {{$role->expense_delete === '1' ? 'checked': '' }} type="checkbox" name="expense_delete" id="expense_delete" value="1"></td>

                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Quotation</td>
                                    <td><input {{$role->quotation_view === '1' ? 'checked': '' }} type="checkbox" name="quotation_view" id="quotation_view" value="1"></td>
                                    <td><input {{$role->quotation_add === '1' ? 'checked': '' }} type="checkbox" name="quotation_add" id="quotation_add" value="1"></td>
                                    <td><input {{$role->quotation_edit === '1' ? 'checked': '' }} type="checkbox" name="quotation_edit" id="quotation_edit" value="1"></td>
                                    <td><input {{$role->quotation_delete === '1' ? 'checked': '' }} type="checkbox" name="quotation_delete" id="quotation_delete" value="1"></td>
                                </tr>
                                <tr>

                                    <td class="w-25 text-left pl-5">Transfer</td>
                                    <td><input {{$role->transfer_view === '1' ? 'checked': '' }} type="checkbox" name="transfer_view" id="transfer_view" value="1"></td>
                                    <td><input {{$role->transfer_add === '1' ? 'checked': '' }} type="checkbox" name="transfer_add" id="transfer_add" value="1"></td>
                                    <td><input {{$role->transfer_edit === '1' ? 'checked': '' }} type="checkbox" name="transfer_edit" id="transfer_edit" value="1"></td>
                                    <td><input {{$role->transfer_delete === '1' ? 'checked': '' }} type="checkbox" name="transfer_delete" id="transfer_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Sale Return</td>
                                    <td><input {{$role->sale_return_view === '1' ? 'checked': '' }} type="checkbox" name="sale_return_view" id="sale_return_view" value="1"></td>
                                    <td><input {{$role->sale_return_add === '1' ? 'checked': '' }} type="checkbox" name="sale_return_add" id="sale_return_add" value="1"></td>
                                    <td><input {{$role->sale_return_edit === '1' ? 'checked': '' }} type="checkbox" name="sale_return_edit" id="sale_return_edit" value="1"></td>
                                    <td><input {{$role->sale_return_delete === '1' ? 'checked': '' }} type="checkbox" name="sale_return_delete" id="sale_return_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Purchase Return</td>
                                    <td><input {{$role->purchase_return_view === '1' ? 'checked': '' }} type="checkbox" name="purchase_return_view" id="purchase_return_view" value="1"></td>
                                    <td><input {{$role->purchase_return_add === '1' ? 'checked': '' }} type="checkbox" name="purchase_return_add" id="purchase_return_add" value="1"></td>
                                    <td><input {{$role->purchase_return_edit === '1' ? 'checked': '' }} type="checkbox" name="purchase_return_edit" id="purchase_return_edit" value="1"></td>
                                    <td><input {{$role->purchase_return_delete === '1' ? 'checked': '' }} type="checkbox" name="purchase_return_delete" id="purchase_return_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Employee</td>
                                    <td><input {{$role->employee_view === '1' ? 'checked': '' }} type="checkbox" name="employee_view" id="employee_view" value="1"></td>
                                    <td><input {{$role->employee_add === '1' ? 'checked': '' }} type="checkbox" name="employee_add" id="employee_add" value="1"></td>
                                    <td><input {{$role->employee_edit === '1' ? 'checked': '' }} type="checkbox" name="employee_edit" id="employee_edit" value="1"></td>
                                    <td><input {{$role->employee_delete === '1' ? 'checked': '' }} type="checkbox" name="employee_delete" id="employee_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">User</td>
                                    <td><input {{$role->user_view === '1' ? 'checked': '' }} type="checkbox" name="user_view" id="user_view" value="1"></td>
                                    <td><input {{$role->user_add === '1' ? 'checked': '' }} type="checkbox" name="user_add" id="user_add" value="1"></td>
                                    <td><input {{$role->user_edit === '1' ? 'checked': '' }} type="checkbox" name="user_edit" id="user_edit" value="1"></td>
                                    <td><input {{$role->user_delete === '1' ? 'checked': '' }} type="checkbox" name="user_delete" id="user_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Customer</td>
                                    <td><input {{$role->customer_view === '1' ? 'checked': '' }} type="checkbox" name="customer_view" id="customer_view" value="1"></td>
                                    <td><input {{$role->customer_add === '1' ? 'checked': '' }} type="checkbox" name="customer_add" id="customer_add" value="1"></td>
                                    <td><input {{$role->customer_edit === '1' ? 'checked': '' }} type="checkbox" name="customer_edit" id="customer_edit" value="1"></td>
                                    <td><input {{$role->customer_delete === '1' ? 'checked': '' }} type="checkbox" name="customer_delete" id="customer_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Biller</td>
                                    <td><input {{$role->biller_view === '1' ? 'checked': '' }} type="checkbox" name="biller_view" id="biller_view" value="1"></td>
                                    <td><input {{$role->biller_add === '1' ? 'checked': '' }} type="checkbox" name="biller_add" id="biller_add" value="1"></td>
                                    <td><input {{$role->biller_edit === '1' ? 'checked': '' }} type="checkbox" name="biller_edit" id="biller_edit" value="1"></td>
                                    <td><input {{$role->biller_delete === '1' ? 'checked': '' }} type="checkbox" name="biller_delete" id="biller_delete" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Supplier</td>
                                    <td><input {{$role->supplier_view === '1' ? 'checked': '' }} type="checkbox" name="supplier_view" id="supplier_view" value="1"></td>
                                    <td><input {{$role->supplier_add === '1' ? 'checked': '' }} type="checkbox" name="supplier_add" id="supplier_add" value="1"></td>
                                    <td><input {{$role->supplier_edit === '1' ? 'checked': '' }} type="checkbox" name="supplier_edit" id="supplier_edit" value="1"></td>
                                    <td><input {{$role->supplier_delete === '1' ? 'checked': '' }} type="checkbox" name="supplier_delete" id="supplier_delete" value="1"></td>
                                </tr>

                                <!-- Full data cells -->
                                <tr>
                                    <td class="w-25 text-left pl-5">Dashboard</td>
                                    <td colspan="4" class="p-0">
                                        <table class="w-100 table m-0">
                                            <tbody>
                                                <tr class="bg-transparent">

                                                    <td class="text-left border-0 text-nowrap w-25" style="font-size: 0.9rem;"><input {{$role->dshbrd_proft_smry === '1' ? 'checked': '' }} value="1" type="checkbox" name="dshbrd_proft_smry" id="dshbrd_proft_smry" class="allSelect"> Revenue and Profit Summary</td>
                                                    <td class="text-left border-0 text-nowrap w-25" style="font-size: 0.9rem;"><input {{$role->dshbrd_cash_flow === '1' ? 'checked': '' }} value="1" type="checkbox" name="dshbrd_cash_flow" id="dshbrd_cash_flow" class="allSelect"> Cash Flow</td>
                                                    <td class="text-left border-0 text-nowrap w-25" style="font-size: 0.9rem;"><input {{$role->dshbrd_mnth_smry === '1' ? 'checked': '' }} value="1" type="checkbox" name="dshbrd_mnth_smry" id="dshbrd_mnth_smry" class="allSelect"> Monthly Summary</td>
                                                    <td class="text-left border-0 text-nowrap w-25" style="font-size: 0.9rem;"><input {{$role->dshbrd_yr_rprt === '1' ? 'checked': '' }} value="1" type="checkbox" name="dshbrd_yr_rprt" id="dshbrd_yr_rprt" class="allSelect"> Yearly Report</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Accounting</td>
                                    <td colspan="4" class="p-0">
                                        <table class="w-100 table m-0">
                                            <tbody>
                                                <tr class="bg-white">
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->acc_account === '1' ? 'checked': '' }} value="1" type="checkbox" name="acc_account" id="acc_account" class="allSelect"> Account</td>
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->acc_mny_tnsfr === '1' ? 'checked': '' }} value="1" type="checkbox" name="acc_mny_tnsfr" id="acc_mny_tnsfr" class="allSelect"> Money Transfer</td>
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->acc_blnce_sheet === '1' ? 'checked': '' }} value="1" type="checkbox" name="acc_blnce_sheet" id="acc_blnce_sheet" class="allSelect"> Balance Sheet </td>
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->acc_account_stmt === '1' ? 'checked': '' }} value="1" type="checkbox" name="acc_account_stmt" id="acc_account_stmt" class="allSelect"> Account Statement</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">HRM</td>
                                    <td colspan="4" class="p-0">
                                        <table class="w-100 table m-0">
                                            <tbody>
                                                <tr class="bg-transparent">
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->hrm_dept === '1' ? 'checked': '' }} value="1" type="checkbox" name="hrm_dept" id="hrm_dept" class="allSelect"> Department</td>
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->hrm_atndce === '1' ? 'checked': '' }} value="1" type="checkbox" name="hrm_atndce" id="hrm_atndce" class="allSelect"> Attendance</td>
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->hrm_payroll === '1' ? 'checked': '' }} value="1" type="checkbox" name="hrm_payroll" id="hrm_payroll" class="allSelect"> Payroll</td>
                                                    <td class="text-left border-0" style="width: 25%; font-size: 0.9rem;"><input {{$role->hrm_holiday === '1' ? 'checked': '' }} value="1" type="checkbox" name="hrm_holiday" id="hrm_holiday" class="allSelect"> Holiday Approve</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="w-25 text-left pl-5">Reports</td>
                                    <td colspan="4" class="p-0">
                                        <table class="w-100 table border-0 m-0">
                                            <tbody>
                                                <tr class="bg-white border-0">
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_smry === '1' ? 'checked': '' }} value="1" name="rpt_smry" id="rpt_smry" class="allSelect"> Summary Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_mnth_purchse === '1' ? 'checked': '' }} value="1" name="rpt_mnth_purchse" id="rpt_mnth_purchse" class="rpt_mnth_purchse"> Monthly Purchase</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_sale_chrt === '1' ? 'checked': '' }} value="1" name="rpt_sale_chrt" id="rpt_sale_chrt" class="allSelect"> Sale Report Chart</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_product_qty === '1' ? 'checked': '' }} value="1" name="rpt_product_qty" id="rpt_product_qty" class="allSelect"> Product Quantity Alert</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_customer_due === '1' ? 'checked': '' }} value="1" name="rpt_customer_due" id="rpt_customer_due" class="allSelect"> Customer Due Report</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_best_seller === '1' ? 'checked': '' }} value="1" name="rpt_best_seller" id="rpt_best_seller" class="allSelect"> Best Seller</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_product === '1' ? 'checked': '' }} value="1" name="rpt_product" id="rpt_product" class="rpt_product"> Product Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_warehouse === '1' ? 'checked': '' }} value="1" name="rpt_warehouse" id="rpt_warehouse" class="allSelect"> Warehouse Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_user === '1' ? 'checked': '' }} value="1" name="rpt_user" id="rpt_user" class="allSelect"> User Report</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_daily_sale === '1' ? 'checked': '' }} value="1" name="rpt_daily_sale" id="rpt_daily_sale" class="allSelect"> Daily Sale</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_payment === '1' ? 'checked': '' }} value="1" name="rpt_payment" id="rpt_payment" class="allSelect"> Payment Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_warehouse_chrt === '1' ? 'checked': '' }} value="1" name="rpt_warehouse_chrt" id="rpt_warehouse_chrt" class="allSelect"> Warehouse Stock Chart</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_customer === '1' ? 'checked': '' }} value="1" name="rpt_customer" id="rpt_customer" class="allSelect"> Customer Report</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_mnth_sale === '1' ? 'checked': '' }} value="1" name="rpt_mnth_sale" id="rpt_mnth_sale" class="allSelect"> Monthly Sale</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_purchse === '1' ? 'checked': '' }} value="1" name="rpt_purchse" id="rpt_purchse" class="allSelect"> Purchase Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_product_expry === '1' ? 'checked': '' }} value="1" name="rpt_product_expry" id="rpt_product_expry" class="allSelect"> Product Expiry Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_supplier === '1' ? 'checked': '' }} value="1" name="rpt_supplier" id="rpt_supplier" class="allSelect"> Supplier Report</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_daily_purchse === '1' ? 'checked': '' }} value="1" name="rpt_daily_purchse" id="rpt_daily_purchse" class="allSelect"> Daily Purchase</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_sale === '1' ? 'checked': '' }} value="1" name="rpt_sale" id="rpt_sale" class="allSelect"> Sale Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_dailysale_obj === '1' ? 'checked': '' }} value="1" name="rpt_dailysale_obj" id="rpt_dailysale_obj" class="allSelect"> Daily Sale Objective Report</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->rpt_supplier_due === '1' ? 'checked': '' }} value="1" name="rpt_supplier_due" id="rpt_supplier_due" class="allSelect"> Supplier Due Report</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Settings</td>
                                    <td colspan="4" class="p-0">
                                        <table class="w-100 table border-0 m-0">
                                            <tbody>
                                                <tr class="bg-white border-0">
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_cstm_feld === '1' ? 'checked': '' }} value="1" name="Seting_cstm_feld" id="Seting_cstm_feld" class="allSelect"> Custom Field</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_warehouse === '1' ? 'checked': '' }} value="1" name="Seting_warehouse" id="Seting_warehouse" class="allSelect"> Warehouse</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_warehouse === '1' ? 'checked': '' }} value="1" name="Seting_tax" id="Seting_tax" class="allSelect"> Tax</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_create_sms === '1' ? 'checked': '' }} value="1" name="Seting_create_sms" id="Seting_create_sms" class="allSelect"> Create SMS</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_all_notifctn === '1' ? 'checked': '' }} value="1" name="Seting_all_notifctn" id="Seting_all_notifctn" class="allSelect"> All Notification</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_custmr_grp === '1' ? 'checked': '' }} value="1" name="Seting_custmr_grp" id="Seting_custmr_grp" class="allSelect"> Customer Group</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_pos === '1' ? 'checked': '' }} value="1" name="Seting_pos" id="Seting_pos" class="allSelect"> POS Setting</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_send_notifctn === '1' ? 'checked': '' }} value="1" name="Seting_send_notifctn" id="Seting_send_notifctn" class="allSelect"> Send Notification</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_brand === '1' ? 'checked': '' }} value="1" name="Seting_brand" id="Seting_brand" class="allSelect"> Brand</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_generl === '1' ? 'checked': '' }} value="1" name="Seting_generl" id="Seting_generl" class="allSelect"> General Setting</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_hrm === '1' ? 'checked': '' }} value="1" name="Seting_hrm" id="Seting_hrm" class="allSelect"> HRM Setting</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_unit === '1' ? 'checked': '' }} value="1" name="Seting_unit" id="Seting_unit" class="allSelect"> Unit</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_mail === '1' ? 'checked': '' }} value="1" name="Seting_mail" id="Seting_mail" class="allSelect"> Mail Setting</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_reward_point === '1' ? 'checked': '' }} value="1" name="Seting_reward_point" id="Seting_reward_point" class="allSelect"> Reward Point Setting</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_dscnt === '1' ? 'checked': '' }} value="1" name="Seting_dscnt" id="Seting_dscnt" class="allSelect"> Discount</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_currency === '1' ? 'checked': '' }} value="1" name="Seting_currency" id="Seting_currency" class="allSelect"> Currency</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->Seting_sms === '1' ? 'checked': '' }} value="1" name="Seting_sms" id="Seting_sms" class="allSelect"> SMS Setting</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-25 text-left pl-5">Miscellaneous</td>
                                    <td colspan="4" class="p-0">
                                        <table class="w-100 table border-0 m-0">
                                            <tbody>
                                                <tr class="bg-white border-0">
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_category === '1' ? 'checked': '' }} value="1" name="misc_category" id="misc_category" class="allSelect"> Category</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_coupon === '1' ? 'checked': '' }} value="1" name="misc_coupon" id="misc_coupon" class="allSelect"> Coupon</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_today_profit === '1' ? 'checked': '' }} value="1" name="misc_today_profit" id="misc_today_profit" class="allSelect"> Today's Profit</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_delivery === '1' ? 'checked': '' }} value="1" name="misc_delivery" id="misc_delivery" class="allSelect"> Delivery</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_prodct_histry === '1' ? 'checked': '' }} value="1" name="misc_prodct_histry" id="misc_prodct_histry" class="allSelect"> Product History</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_stockcnt === '1' ? 'checked': '' }} value="1" name="misc_stockcnt" id="misc_stockcnt" class="allSelect"> Stock Count</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_pbarcode === '1' ? 'checked': '' }} value="1" name="misc_pbarcode" id="misc_pbarcode" class="allSelect"> Print Barcode</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_adjust === '1' ? 'checked': '' }} value="1" name="misc_adjust" id="misc_adjust" class="allSelect"> Adjustment</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_emp_db === '1' ? 'checked': '' }} value="1" name="misc_emp_db" id="misc_emp_db" class="allSelect"> Empty Database</div>
                                                        </div>
                                                    </td>
                                                    <td class="text-left border-0" style="width: 20%; font-size: 0.9rem;">
                                                        <div class="row">
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_giftcard === '1' ? 'checked': '' }} value="1" name="misc_giftcard" id="misc_giftcard" class="allSelect"> Gift Card</div>
                                                            <div class="col-12"><input type="checkbox" {{$role->misc_today_sale === '1' ? 'checked': '' }} value="1" name="misc_today_sale" id="misc_today_sale" class="allSelect"> Today's Sale</div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer bg-light"> 
                            <button type="submit" class="btn btn-info">Submit</button>
                            <button type="reset" class="btn btn-default float-right">Cancel</button>
                          </div>
                        <!-- <div class="col-12 col-sm-3">
                            <button class="btn btn-primary ">Submit</button>
                        </div> -->
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit_btn', function() {
            var role_id = $(this).val();
            console.log(role_id);
            $.ajax({
                type: "GET",
                url: "/role-permission/edit-role/" + role_id,
                success: function(response) {
                    console.log(response);
                    $("#role_id").val(response.id);
                    $("#name").val(response.name);
                    $("#description").val(response.description);
                }
            })

        });
    });
</script>

@include('client.component.tablefooter')