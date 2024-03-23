<?php
use Inertia\Inertia;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use  App\Http\Controllers\CustomersController;
use  App\Http\Controllers\MedicinesController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\PurchasesController;
use App\Http\Controllers\WebsiteLogoController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\SalesController;

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

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/', [HomeController::class, 'index']);
Route::get('about', [AboutController::class, 'index']);
Route::get('shop', [ShopController::class, 'index']);
Route::get('contact', [ContactController::class, 'index']);




Route::get('/login',[AuthController::class,'login']);

Route::get('/forgot',[AuthController::class,'forgot']);

Route::post('login_post',[AuthController::class,'login_post']);

Route::post('forgot_post',[AuthController::class,'forgot_post']);

Route::group(['middleware' => 'admin'],function(){


    Route::get('admin/dashboard',  [DashboardController::class,'dashboard']);
    Route::get('admin/customers',  [CustomersController::class,'customers']);
    Route::get('admin/customers/add',  [CustomersController::class,'add_customers']);
    Route::post('admin/customers/add',  [CustomersController::class,'insert_add_customers']);
    Route::get('admin/customers/edit/{id}',  [CustomersController::class,'edit_customers']);
    Route::post('admin/customers/edit/{id}',  [CustomersController::class,'update_customers']);
    Route::get('admin/customers/delete/{id}',  [CustomersController::class,'delete_customers']);


    //medicines start
     Route::get('admin/medicines', [MedicinesController::class,'medicines']);
    Route::get('admin/medicines/add', [MedicinesController::class,'add_medicines']);
    Route::post('admin/medicines/add_M', [MedicinesController::class,'add_update_M']);
    Route::get('admin/medicines/edit/{id}', [MedicinesController::class,'edit_medicines']);
    Route::post('admin/medicines/edit/{id}', [MedicinesController::class,'add_update_edit']);
    Route::get('admin/medicines/delete/{id}', [MedicinesController::class,'medicines_delete']);


   //Medicines Stock
   Route::get('admin/medicines_stock',[MedicinesController::class,'medicines_stock_list']);
   Route::get('admin/medicines_stock/add',[MedicinesController::class,'medicines_stock_add']);
   Route::post('admin/medicines_stock/add',[MedicinesController::class,'medicines_stock_store']);
   Route::get('admin/medicines_stock/delete/{id}',[MedicinesController::class,'medicines_stock_delete']);
   Route::get('admin/medicines_stock/edit/{id}',[MedicinesController::class,'medicines_stock_edit']);
   Route::post('admin/medicines_stock/edit/{id}',[MedicinesController::class,'medicines_stock_edit_update']);



   //Suppliers Start
   Route::get('admin/suppliers',[SuppliersController::class,'index']);
   Route::get('admin/suppliers/add',[SuppliersController::class,'create']);
   Route::post('admin/suppliers/add',[SuppliersController::class,'store']);
   Route::get('admin/suppliers/edit/{id}',[SuppliersController::class,'edit']);
   Route::post('admin/suppliers/edit/{id}',[SuppliersController::class,'update']);
   Route::get('admin/suppliers/delete/{id}',[SuppliersController::class,'delete']);
    //Suppliers End

    //Invoices Start
    Route::get('admin/invoices',[InvoicesController::class,'index']);
    Route::get('admin/invoices/add',[InvoicesController::class,'create']);
    Route::post('admin/invoices/add',[InvoicesController::class,'store']);
    Route::get('admin/invoices/delete/{id}',[InvoicesController::class,'delete']);
    Route::get('admin/invoices/edit/{id}',[InvoicesController::class,'edit']);
    Route::post('admin/invoices/edit/{id}',[InvoicesController::class,'update']);
     //Invoices End

     //Purchases Start
     Route::prefix('admin/purchases/')->group(function(){
        
        Route::get('',[PurchasesController::class,'index']);
        Route::get('add',[PurchasesController::class,'create']);
        Route::post('add',[PurchasesController::class,'store']);
        Route::get('edit/{id}',[PurchasesController::class,'edit']);
        Route::post('edit/{id}',[PurchasesController::class,'update']);
        Route::get('delete/{id}',[PurchasesController::class,'delete']);

     });
     //Purchases End

     //Sales Start
     Route::prefix('admin/sales/')->group(function(){
        
        Route::get('',[SalesController::class,'index']);
        Route::get('add',[SalesController::class,'create']);
        Route::post('add',[SalesController::class,'store']);
        Route::get('edit/{id}',[SalesController::class,'edit']);
        Route::post('edit/{id}',[SalesController::class,'update']);
        Route::get('delete/{id}',[SalesController::class,'delete']);

     });


     //Sales End

    //My Account
    Route::get('admin/my_account',[DashboardController::class,'my_account']);
    Route::post('admin/my_account',[DashboardController::class,'my_account_update']);


   Route::get('admin/website_logo',[WebsiteLogoController::class,'website_logo']) ;



});
Route::get('logout',[AuthController::class,'logout']);





