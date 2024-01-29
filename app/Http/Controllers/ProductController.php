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
       $product->product_code = $request->product_code;
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
       $product->product_tax = $request->product_tax;
       $product->tax_method = $request->tax_method;
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
