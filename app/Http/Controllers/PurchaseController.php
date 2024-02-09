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
use App\Models\Propurchase;
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
        $usercompany = $request->session()->get('loginCompany');
        $data['products'] = DB::table('products')->where("type", $request->type_id)->where('company_id', $usercompany)->distinct('name')->select('name', 'product_code')->get();
        return Response()->json($data);
    }

    public function fetchproductdetails(Request $request)
    {
        $usercompany = $request->session()->get('loginCompany');
        
        $product = DB::table('products')
                    ->where("product_code", $request->product_code)
                    ->where('company_id', $usercompany)
                    ->select('price', 'tax_value')
                    ->first();
    
        if($product) {
            return response()->json(['details' => $product]);
        } else {
            return response()->json(['error' => 'Product not found'], 404);
        }
    }


    public function create(Request $request)
    {
        $purchase = new Purchase();
        $usercompany = $request->session()->get('loginCompany');
        $userid = $request->session()->get('loginId');
        $purchase->company_id = $usercompany;
        $code_rand = rand(10000, 999999);
        $purchase->purch_code = $code_rand;
        $purchase->date = $request->date;
        if($request->hasfile('document')){
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/image/',$filename);
            $purchase->document = $filename;
        }
        $purchase->warehouse = $request->warehouse; 
        $purchase->supplier = $request->supplier;
        $purchase->purch_status = $request->purch_status;
        $purchase->ord_tax = $request->ord_tax;
        $purchase->tc = $request->tc;
        $purchase->disct = $request->disct;
        $purchase->ship_cst = $request->ship_cst;
        $purchase->created_by = $userid;
        $purchase->save();
        if ($purchase){
    if ($request->has('types') && is_array($request->types)) {  
        foreach ($request->types as $key => $value) {
            $products = [
                'product_type' => $request->types[$key],
                'product_code' => $request->products[$key],
                'price' => $request->prices[$key],
                'tax' => $request->taxes[$key], 
                'subtotal' => $request->subtotals[$key],
                'total' => $request->total, 
                'discount' => $request->disct, 
                'shiping_cost' => $request->ship_cst, 
                'company_id' => $usercompany,  
            ];
            $purchase->Propurchase()->create($products);
        }
    }
        return redirect()->back()->with('status', 'Purchase done Successfully !!!');
        }
    }
}
