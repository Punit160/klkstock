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
use App\Models\Product_warehouse;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProductCategory;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class ProductController extends Controller
{
    public function add_product(Request $request){
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
        $data['brand'] = DB::table('brands')->where('company_id', $usercompany)->orderBy('title', 'DESC')->get();
        $data['tax'] = DB::table('taxes')->where('company_id', $usercompany)->orderBy('name')->get();
        return view('client.product.add-product', $data);
    }


    public function create(Request $request)
    {
       $product = new Product();
       $usercompany = $request->session()->get('loginCompany');
       $userid = $request->session()->get('loginId');
       $product->company_id = $usercompany;
       $product->name = $request->name;
       $code_rand = rand(1000, 99999);
       if($request->product_code == ""){
        $product->product_code = $code_rand;
       }else{
        $product->product_code = $request->product_code;
       }
       $product->type = $request->type;
       $product->category = $request->category; 
       $product->brand = $request->brand;
       $product->product_unit = $request->product_unit;
       $product->sale_unit = $request->sale_unit;
       $product->purchase_unit = $request->purchase_unit;
       $product->cost = $request->cost;
       $product->price = $request->price;
       $product->dso = $request->dso;
       $product->alert_qty = $request->alert_qty;
       $product->tax_method = $request->tax_method;
       $product->product_tax = $request->product_tax;
       if($request->tax_method == '1'){
        $product->tax_value = '0';
       }else{
       $tax =  DB::table('taxes')->where('name', $request->product_tax)->where('company_id', $usercompany)->first();
       $pro_price = floatval($request->price);
       $tax_percent = floatval($tax->rate);
       $taxval =  ($pro_price * $tax_percent)/100;
       $product->tax_value = $taxval;
       }
       $product->detail = $request->detail;
       if($request->hasfile('image')){
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();
        $filename = time().'.'.$extension;
        $file->move('uploads/image/',$filename);
        $product->image = $filename;
    }
       $product->initial_stock = $request->initial_stock;
       $product->created_by = $userid;
       $product->save(); 
       if ($product->save()) {
       $product_id = $product->id;
      if ($request->initial_stock ==  '1') {

        $options = $request->input('options', []);
        $values = $request->input('values', []);
        for ($i = 0; $i <= count($options); $i++) {
            if (isset($options[$i]) && $options[$i] != '') {
                $product->options()->attach($options[$i], ['value' => $values[$i], 'company_id' => $usercompany]);
            }
        }

        $variationnames = $request->input('variation_names', []);
        $skus = $request->input('skus', []);
        $varquantities = $request->input('varqtities', []);
        $varwarehouses = $request->input('varwarehouses', []);
        $variation_prices = $request->input('variation_prices', []);
        for ($j = 0; $j <= count($skus); $j++) {
            if (isset($varquantities[$j]) && $varquantities[$j] != '') {
                $product->variations()->attach($variationnames[$j], [
                    'sku' => $skus[$j],
                    'quantity' => $varquantities[$j],
                    'warehouse' => $varwarehouses[$j],
                    'variation_price' => $variation_prices[$j],
                    'company_id' => $usercompany,
                ]);
        $prowar = DB::table('product_warehouse')->where('product_id', $product_id)->where('warehouse_id', $varwarehouses[$j])->first();
        if($prowar){
            $new_qty = floatval($varquantities[$j]);
            $existing_qty = floatval($prowar->quantity);
            $total_qty = $new_qty + $existing_qty;
            DB::table('product_warehouse')->where('product_id', $product_id)->where('warehouse_id', $varwarehouses[$j])->update(['quantity' => $total_qty]);
        }
        else{
            $warpro = new Product_warehouse;
            $warpro->product_id = $product_id;
            $warpro->warehouse_id = $varwarehouses[$j];
            $warpro->quantity =  $varquantities[$j];
            $warpro->company_id =  $usercompany;
            $warpro->save();
        }
            }
        }
        
        $warehouses = $request->input('warehouses', []);
        $quantititiess = $request->input('quantititiess', []);

        for ($k = 0; $k <= count($warehouses); $k++) {
            if (isset($quantititiess[$k]) && $quantititiess[$k] != '') {
                $product->warehouses()->attach($warehouses[$k], [
                    'quantity' => $quantititiess[$k],
                    'company_id' => $usercompany,
                ]);
            }
        }
    }

        return back()->with('status', 'Details Saved Successfully !!!');
    } else {
        return back()->with('status', 'Failed to save details.');
    }
    }


    public function view_product(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['product'] = Product::where('company_id', $usercompany)
        ->orderBy('id', 'DESC')
        ->get();
        return view('client.product.product-list', $data);
    }
}
