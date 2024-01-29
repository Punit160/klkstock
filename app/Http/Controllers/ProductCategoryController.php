<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProductCategory;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProductCategory;
use Illuminate\Support\Facades\File;
use DB;
use Session;

class ProductCategoryController extends Controller
{
    public function view_category(Request $request){
        $data['username'] = $request->session()->get('loginName');
        $data['userrole'] = $request->session()->get('loginRole');
        $data['userid'] = $request->session()->get('loginId');
        $data['useremail'] = $request->session()->get('loginEmail');
        $data['useremployee'] = $request->session()->get('loginEmployee');
        $data['usercompany'] = $request->session()->get('loginCompany');
        $usercompany = $request->session()->get('loginCompany');
        $data['category'] = DB::table('product_categories')->where('company_id', $usercompany)->orderBy('name', 'DESC')->get();
        return view('client.product.view-category', $data);
       }

       public function create(Request $request)
       {
           $validator = $request->validate([
               'name' => 'required',
               'catimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
           ]);
           $usercompany = $request->session()->get('loginCompany');
           $useremployee = $request->session()->get('loginEmployee');
           $category = new ProductCategory();
           $category->name = $request->input('name');
           if($request->hasfile('catimg')){
            $file = $request->file('catimg');
            $extension = $file->getClientOriginalExtension();  
            $filename = time().'.'.$extension;
            $file->move('uploads/image/',$filename);
            $category->catimg = $filename;
        }
           $category->parent_category = $request->input('parent_category');
           $category->no_product = 0;
           $category->stock_qty = 0;
           $category->company_id = $usercompany;
           $category->created_by = $useremployee;
           $category->save();
           return back()->with('status', 'Product Category Added Successfully');
       }

       public function edit(Request $request, $id)
       {
        $category = ProductCategory::find($id);
        return response()->json($category);
       }


       public function update(Request $request)
       {
        $validator = $request->validate([
            'name' => 'required',
            'catimg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
           $category_id = $request->input('category_id');
           $category = ProductCategory::find($category_id);
           $category->name = $request->input('name');
           if($request->hasfile('catimg')){
            $file = $request->file('catimg');
            $extension = $file->getClientOriginalExtension();  
            $filename = time().'.'.$extension;
            $file->move('uploads/image/',$filename);
            $category->catimg = $filename;
        }
           $category->parent_category = $request->input('parent_category');
           $category->save();
           return back()->with('status', 'Product Category Updated Successfully');
       }


       public function import(Request $request)
       {
           $request->validate([
               'file' => 'required',
           ]);
           $companyId = $request->session()->get('loginCompany');
           $employeeId = $request->session()->get('loginEmployee');
           Excel::import(new ImportProductCategory($companyId, $employeeId), $request->file('file'));
           return back()->with('success', 'Product Category imported successfully!');
       }

       public function destroy($id){
        $category = ProductCategory::find($id);
         $destination = 'uploads/image/'.$category->catimg;
         if(File::exists($destination)){
             File::delete($destination);
         }
         $category->delete();
         return back()->with('status', 'Product Category Deleted Successfully!!');
     }
}
