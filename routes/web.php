<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OuruserController;
use App\Http\Controllers\OurclientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BillerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProducttypeController;
use App\Http\Controllers\TaxController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\CustomerGroupController;
use App\Http\Controllers\HrmSettingController;
use App\Http\Controllers\RewardPointController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ExpensecategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HolidayController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ***************************************************************************************************************************************************
// Our Section 
// ***************************************************************************************************************************************************
// Start OuruserController

Route::get('/our/user/add-user', [OuruserController::class, 'add_user'])->name('add-our-user');
Route::post('/our/user/save-user', [OuruserController::class, 'create'])->name('save-our-user');
Route::get('/our/user/view-user', [OuruserController::class, 'view_user'])->name('view-our-user');
Route::get('/our/user/update-user/{id}', [OuruserController::class, 'edit'])->name('edit-our-user');
Route::put('/our/user/update-user/{id}', [OuruserController::class, 'update'])->name('update-our-user');
Route::get('/our/user/delete-user/{id}',[OuruserController::class, 'destroy'])->name('delete-our-user');

// End OuruserController

// Start ClientController

Route::get('/our/client/add-client', [OurclientController::class, 'add_client'])->name('add-our-client');
Route::post('/our/client/save-client', [OurclientController::class, 'create'])->name('save-our-client');
Route::get('/our/client/view-client', [OurclientController::class, 'view_client'])->name('view-our-client');
Route::get('/our/client/update-client/{id}', [OurclientController::class, 'edit'])->name('edit-our-client');
Route::put('/our/client/update-client/{id}', [OurclientController::class, 'update'])->name('update-our-client');
Route::get('/our/client/delete-client/{id}',[OurclientController::class, 'destroy'])->name('delete-our-client');

// End ClientController

// ***************************************************************************************************************************************************
// End  Our Section 
// ***************************************************************************************************************************************************


// ***************************************************************************************************************************************************
// Client Section 
// ***************************************************************************************************************************************************
// Start UserController

Route::get('/user/add-user', [UserController::class, 'add_user'])->name('add-user');
Route::post('/user/save-user', [UserController::class, 'create'])->name('save-user');
Route::get('/user/view-user', [UserController::class, 'view_user'])->name('view-user');
Route::get('/user/update-user/{id}', [UserController::class, 'edit'])->name('edit-user');
Route::put('/user/update-user/{id}', [UserController::class, 'update'])->name('update-user');
Route::get('/user/delete-user/{id}',[UserController::class, 'destroy'])->name('delete-user');

// End UserController


// Start LoginController
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::match(['get', 'post'],'/loginuser',[LoginController::class,'loginuser'])->name('loginuser');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
// End  LoginController


// Start UnitController
Route::post('/unit/save-unit', [UnitController::class, 'create'])->name('save-unit');
Route::get('/unit/view-unit', [UnitController::class, 'view_unit'])->name('view-unit');
Route::get('unit/edit-unit/{id}', [UnitController::class, 'edit']);
Route::put('/unit/update-unit', [UnitController::class, 'update'])->name('update-unit');
Route::post('/import-units', [UnitController::class, 'import'])->name('import-unit');
Route::get('/unit/delete-unit/{id}',[UnitController::class, 'destroy'])->name('delete-unit');

// End UnitController

// Start BillerController
Route::get('/biller/add-biller', [BillerController::class, 'add_biller'])->name('add-biller');
Route::post('/biller/save-biller', [BillerController::class, 'create'])->name('save-biller');
Route::get('/biller/view-biller', [BillerController::class, 'view_biller'])->name('view-biller');
Route::get('/biller/update-biller/{id}', [BillerController::class, 'edit'])->name('edit-biller');
Route::put('/biller/update-biller/{id}', [BillerController::class, 'update'])->name('update-biller');
Route::get('/biller/delete-biller/{id}',[BillerController::class, 'destroy'])->name('delete-biller');

// End BillerController

// Start SupplierController

Route::get('/supplier/add-supplier', [SupplierController::class, 'add_supplier'])->name('add-supplier');
Route::post('/supplier/save-supplier', [SupplierController::class, 'create'])->name('save-supplier');
Route::get('/supplier/view-supplier', [SupplierController::class, 'view_supplier'])->name('view-supplier');
Route::get('/supplier/update-supplier/{id}', [SupplierController::class, 'edit'])->name('edit-supplier');
Route::put('/supplier/update-supplier/{id}', [SupplierController::class, 'update'])->name('update-supplier');
Route::get('/supplier/delete-supplier/{id}',[SupplierController::class, 'destroy'])->name('delete-supplier');

// End SupplierController


// Start ProductCategoryController
Route::get('/product/category', [ProductCategoryController::class, 'view_category'])->name('view-product-category');
Route::post('/product/save-category', [ProductCategoryController::class, 'create'])->name('save-product-category');
Route::get('product/edit-category/{id}', [ProductCategoryController::class, 'edit']);
Route::put('/product/update-category', [ProductCategoryController::class, 'update'])->name('update-product-category');
Route::get('/product/delete-category/{id}',[ProductCategoryController::class, 'destroy'])->name('delete-product-category');
Route::post('/import-product-category', [ProductCategoryController::class, 'import'])->name('import-product-category');
// End ProductCategoryController


// Start ProducttypeController
Route::get('/product/type', [ProducttypeController::class, 'view_type'])->name('view-product-type');
Route::post('/product/save-type', [ProducttypeController::class, 'create'])->name('save-product-type');
Route::get('product/edit-type/{id}', [ProducttypeController::class, 'edit']);
Route::put('/product/update-type', [ProducttypeController::class, 'update'])->name('update-product-type');
Route::get('/product/delete-type/{id}',[ProducttypeController::class, 'destroy'])->name('delete-product-type');
Route::post('/import-product-type', [ProducttypeController::class, 'import'])->name('import-product-type');
// End ProducttypeController

//Start WarehouseController
Route::post('/warehouse/save-warehouse', [WarehouseController::class, 'create'])->name('save-warehouse');
Route::get('/warehouse/view-warehouse', [WarehouseController::class, 'view_warehouse'])->name('view-warehouse');
Route::get('/warehouse/edit-warehouse/{id}', [WarehouseController::class, 'edit'])->name('edit-warehouse');
Route::any('/update-warehouse', [WarehouseController::class, 'update'])->name('update-warehouse');
Route::get('/warehouse/delete-warehouse/{id}', [WarehouseController::class, 'delete_warehouse'])->name('delete-warehouse');
Route::any('/import-warehouse', [WarehouseController::class, 'import_warehouse'])->name('import-warehouse');
//End WarehouseController

//Start BrandController
Route::get('/brand/add-brand', [BrandController::class, 'add_brand'])->name('add-brand');
Route::post('/brand/save-brand', [BrandController::class, 'create'])->name('save-brand');
Route::get('/brand/view-brand', [BrandController::class, 'view_brand'])->name('view-brand');
Route::get('/brand/edit-brand/{id}', [BrandController::class, 'edit'])->name('edit-brand');
Route::any('/update-brand', [BrandController::class, 'update'])->name('update-brand');
Route::get('/delete-brand/{id}', [BrandController::class, 'delete_brand'])->name('delete-brand');
Route::any('/import-brand', [BrandController::class, 'import_brand'])->name('import-brand');
//End BrandController

//Start CurrencyController
Route::get('/currency/add-currency', [CurrencyController::class, 'add_currency'])->name('add-currency');
Route::post('/currency/save-currency', [CurrencyController::class, 'create'])->name('save-currency');
Route::get('/currency/view-currency', [CurrencyController::class, 'view_Currency'])->name('view-currency');
Route::get('/currency/edit-currency/{id}', [CurrencyController::class, 'edit'])->name('edit-currency');
Route::any('/update-currency', [CurrencyController::class, 'update'])->name('update-currency');
Route::get('/delete-currency/{id}', [CurrencyController::class, 'delete_currency'])->name('delete-currency');
Route::any('/import-currency', [CurrencyController::class, 'import_currency'])->name('import-currency');
//End CurrencyControllerd

//Start TaxController
Route::post('/tax/save-tax', [TaxController::class, 'create'])->name('save-tax');
Route::get('/tax/view-tax', [TaxController::class, 'view_tax'])->name('view-tax');
Route::get('/tax/edit-tax/{id}', [TaxController::class, 'edit'])->name('edit-tax');
Route::any('/update-tax', [TaxController::class, 'update'])->name('update-tax');
Route::get('/delete-tax/{id}', [TaxController::class, 'delete_tax'])->name('delete-tax');
Route::any('/import-tax', [TaxController::class, 'import_tax'])->name('import-tax');
//End TaxController


//Start DiscountController

Route::get('/discount/add-discount', [DiscountController::class, 'add_discount'])->name('add-discount');
Route::post('/discount/save-discount', [DiscountController::class, 'create'])->name('save-discount');
Route::get('/discount/view-discount', [DiscountController::class, 'view_discount'])->name('view-discount');
Route::get('/discount/edit-discount/{id}', [DiscountController::class, 'edit'])->name('edit-discount');
Route::any('/update-discount', [DiscountController::class, 'update'])->name('update-discount');

//End DiscountController

//Start EmployeeController

Route::get('/employee/add-employee', [EmployeeController::class, 'add_employee'])->name('add-employee');
Route::post('/employee/save-employee', [EmployeeController::class, 'create'])->name('save-employee');
Route::get('/employee/view-employee', [EmployeeController::class, 'view_employee'])->name('view-employee');
Route::get('/employee/edit-employee/{id}', [EmployeeController::class, 'edit'])->name('edit-employee');
Route::any('/update-employee', [EmployeeController::class, 'update'])->name('update-employee');
Route::get('/delete-employee/{id}', [EmployeeController::class, 'delete_employee'])->name('delete-employee');

//End  EmployeeController
//Start GeneralSettingController

Route::get('/general/add-general', [GeneralSettingController::class, 'add_general'])->name('add-general');
Route::post('/general/save-general', [GeneralSettingController::class, 'create'])->name('save-general');

//End GeneralSettingController

//Start CustomerGroupController

Route::get('/customerGroup/add-customerGroup', [CustomerGroupController::class, 'add_customerGroup'])->name('add-customerGroup');
Route::post('/customerGroup/save-customerGroup', [CustomerGroupController::class, 'create'])->name('save-customerGroup');
Route::get('/customerGroup/view-customerGroup', [CustomerGroupController::class, 'view_customerGroup'])->name('view-customerGroup');
Route::get('/customerGroup/edit-customerGroup/{id}', [CustomerGroupController::class, 'edit'])->name('edit-customerGroup');
Route::any('/update-customerGroup', [CustomerGroupController::class, 'update'])->name('update-customerGroup');
Route::get('/delete-customerGroup/{id}', [CustomerGroupController::class, 'delete_customerGroup'])->name('delete-customerGroup');
Route::any('/import-customerGroup', [CustomerGroupController::class, 'import_customerGroup'])->name('import-customerGroup');

//End CustomerGroupControllery

//Start HrmSettingController

Route::get('/hrmSetting/add-hrmSetting', [HrmSettingController::class, 'add_hrmSetting'])->name('add-hrmSetting');
Route::post('/hrmSetting/save-hrmSetting', [HrmSettingController::class, 'create'])->name('save-hrmSetting');

//End HrmSettingController

//Start RewardPointController

Route::get('/reward_point/add-reward-point', [RewardPointController::class, 'add_reward_point'])->name('add-reward-point');
Route::post('/reward_point/save-reward-point', [RewardPointController::class, 'create'])->name('save-reward-point');

//End RewardPointController



//Start RolePermissionController

Route::get('/role-permission/add-role', [RolePermissionController::class, 'add_RolePermission'])->name('add-role');
Route::post('/role-permission/save-role', [RolePermissionController::class, 'create'])->name('save-role');
Route::get('/role-permission/edit-role/{id}', [RolePermissionController::class, 'edit'])->name('edit-role');
Route::any('/update-role', [RolePermissionController::class, 'update'])->name('update-role');
Route::get('/role-permission/change-permission/{id}', [RolePermissionController::class, 'editPermission'])->name('change-permission');
Route::any('/update-permission', [RolePermissionController::class, 'update'])->name('update-permission');
//End RolePermissionController


//Start HolidayController

Route::post('/holiday/save-holiday', [HolidayController::class, 'create'])->name('save-holiday');
Route::get('/holiday/view-holiday', [HolidayController::class, 'view_holiday'])->name('view-holiday');
Route::get('/holiday/edit-holiday/{id}', [HolidayController::class, 'edit'])->name('edit-holiday');
Route::any('/update-holiday', [HolidayController::class, 'update'])->name('update-holiday');
Route::get('/delete-holiday/{id}', [HolidayController::class, 'delete_holiday'])->name('delete-holiday');

//End  HolidayController

//Start DepartmentController

Route::get('/department/view-department', [DepartmentController::class, 'add_department'])->name('view-department');
Route::post('/department/save-department', [DepartmentController::class, 'create'])->name('save-department');
Route::get('/department/edit-department/{id}', [DepartmentController::class, 'edit'])->name('edit-department');
Route::any('/update-department', [DepartmentController::class, 'update'])->name('update-department');
Route::get('/delete-department/{id}', [DepartmentController::class, 'delete_department'])->name('delete-department');

//End  DepartmentController


// Start ProductController

Route::get('/product/add-product', [ProductController::class, 'add_product'])->name('add-product');
Route::post('/product/save-product', [ProductController::class, 'create'])->name('save-product');
Route::get('/product/view-product', [ProductController::class, 'view_product'])->name('view-product');

// End ProductController

// Start PurchaseController

Route::get('/purchase/add-purchase', [PurchaseController::class, 'add_purchase'])->name('add-purchase');
Route::post('/purchase/save-purchase', [PurchaseController::class, 'create'])->name('save-purchase');
Route::get('/purchase/view-purchase', [PurchaseController::class, 'view_purchase'])->name('view-purchase');
Route::post('/fetch-product-data', [PurchaseController::class, 'fetchproducts'])->name('fetch-product-data');
Route::post('/fetch-product-details', [PurchaseController::class, 'fetchproductdetails'])->name('fetch-product-details');
// End PurchaseController  

// Start ExpensecategoryController

Route::get('/expense/category', [ExpensecategoryController::class, 'view_category'])->name('view-expense-category');
Route::post('/expense/save-category', [ExpensecategoryController::class, 'create'])->name('save-expense-category');
Route::get('expense/edit-category/{id}', [ExpensecategoryController::class, 'edit']);
Route::put('/expense/update-category', [ExpensecategoryController::class, 'update'])->name('update-expense-category');
Route::get('/expense/delete-category/{id}',[ExpensecategoryController::class, 'destroy'])->name('delete-expense-category');
Route::post('/import-expense-category', [ExpensecategoryController::class, 'import'])->name('import-expense-category');

// End ExpensecategoryController

// Start ExpenseController

Route::post('/expense/save-expense', [ExpenseController::class, 'create'])->name('save-expense');
Route::get('/expense/view-expense', [ExpenseController::class, 'view_expense'])->name('view-expense');
Route::get('/expense/edit-expense/{id}', [ExpenseController::class, 'edit'])->name('edit-expense');
Route::any('/update-expense', [ExpenseController::class, 'update'])->name('update-expense');
Route::get('/expense/delete-expense/{id}', [ExpenseController::class, 'destroy'])->name('delete-expense');

// End ExpenseController

// ***************************************************************************************************************************************************
// End  Client Section 
// ***************************************************************************************************************************************************

