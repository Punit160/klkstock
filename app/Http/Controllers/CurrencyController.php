<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Support\Facades\DB;
use Session;

use Illuminate\Http\Request;


class CurrencyController extends Controller
{

    public function create(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $Currency = new Currency();
        $Currency->name = $request->name;
        $Currency->date = date('d-m-Y');
        $Currency->currency_code = $request->currency_code;
        $Currency->exchange_rate = $request->exchange_rate;
        $Currency->company_id = $usercompany;
        $Currency->created_by = $useremployee;
        $Currency->save();
        return back()->with('status', 'Currency Added Successfully');
    }
    public function view_Currency(Request $request)
    {

        $data['currency'] = DB::table('currencies')->select('*')->get();
        return view('client.setting.Currency.view-Currency', $data);
    }

    public function edit(Request $request, $id)
    {
        $currency = Currency::find($id);
        return response()->json($currency);
    }


    public function update(Request $request)
    {
        $id = $request->currency_id;
        $Currency = Currency::find($id);
        $Currency->name = $request->name;
        $Currency->currency_code = $request->currency_code;
        $Currency->exchange_rate = $request->exchange_rate;
        $Currency->save();
        return back()->with('status', 'Currency Updated Successfully');
    }

    public function delete_Currency($id)
    {
        $Currency = Currency::find($id);

        $Currency->delete();
        return back()->with('status', 'Currency Deleted Successfully!!');
    }
}
