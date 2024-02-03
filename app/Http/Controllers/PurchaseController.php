<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Unit;
use App\Models\Brand;
use App\Models\Tax;
use App\Models\Currency;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Purchase;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProductCategory;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class PurchaseController extends Controller
{
    public function add_purchase(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['type'] = DB::table('producttypes')->where('company_id', $usercompany)->orderBy('name')->get();
        $data['category'] = DB::table('product_categories')->where('company_id', $usercompany)->orderBy('name')->get();
        $data['unit'] = DB::table('units')->where('company_id', $usercompany)->orderBy('unit_name', 'DESC')->get();
        $data['warehouse'] = DB::table('warehouses')->where('company_id', $usercompany)->orderBy('name')->get();
        $data['supplier'] = DB::table('suppliers')->where('company_id', $usercompany)->orderBy('name')->get();
        $data['brand'] = DB::table('brands')->where('company_id', $usercompany)->orderBy('title', 'DESC')->get();
        $data['tax'] = DB::table('taxes')->where('company_id', $usercompany)->orderBy('name')->get();
        return view('client.purchase.add-purchase', $data);
    }

    public function fetchproducts(Request $request)
    {
        $data['products'] = DB::table('products')->where("type", $request->product_type)->where('company_id', $usercompany)->distinct()->get('product_name');
        return Response()->json($data);
    }
}
