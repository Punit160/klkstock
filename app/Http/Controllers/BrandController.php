<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Imports\BrandImport;
use Excel;
use Session;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function import_brand(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|min:5|max:50|unique:billers',
            'email' => 'required|email|unique:billers',
            'image' => 'required|image|max:2048|mimes:jpeg,jpg,png,gif,webp', 
        ]);
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $filePath = $request->file('brand');
        $import = new BrandImport( $usercompany, $useremployee);
        Excel::import($import, $filePath);
        $savedCount = $import->getSavedCount();

        return back()->with('status', $savedCount . ' Rows Imported Successfully');
    }
    public function add_brand(Request $request)
    {

        return view('client.setting.brand.add-brand');
    }

    public function create(Request $request)
    {
        $validator = $request->validate([
           
            'logo' => 'image|max:2048|mimes:jpeg,jpg,png,gif,webp', 
        ]);
        $usercompany = $request->session()->get('loginCompany');
        $useremployee = $request->session()->get('loginEmployee');
        $brand = new Brand();
        $brand->title = $request->title;
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/brand/', $filename);
            $brand->logo = $filename;
        }
        $brand->date = date('d-m-Y');;
        $brand->company_id = $usercompany;
        $brand->created_by = $useremployee;
        $brand->save();
        return back()->with('status', 'brand Added Successfully');
    }

    public function view_brand(Request $request)
    {
        $data['brand'] = DB::table('brands')->select('*')->get();
        return view('client.setting.brand.view-brand', $data);
    }

    public function edit(Request $request, $id)
    {
        $brand = Brand::find($id);
        return response()->json($brand);
    }
    public function update(Request $request)
    { 
        
        $id = $request->brand_id;
        $brand = brand::find($id);     
        
        $request->validate([
           
            'logo' => 'image|max:2048|mimes:jpeg,jpg,png,gif,webp', 
        ]);   
        $brand->title = $request->title;
        if ($request->hasfile('logo')) {
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/brand/', $filename);
            $brand->logo = $filename;
        }
        $brand->save();
        return redirect(route('view-brand'))->with('status', 'Brand Updated Successfully');
    }

    public function delete_brand($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect(route("view-brand"))->with('status', 'brand Deleted Successfully!!');
    }
}
