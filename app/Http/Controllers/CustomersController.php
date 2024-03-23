<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomersModel;

class CustomersController extends Controller
{
    public function customers(Request $request){

         $data['getRecord'] = CustomersModel::get();

        return view('admin.customers.list',$data);
    }
    public function add_customers(Request $request){
       
         return view('admin.customers.add');
    }
    public function insert_add_customers(Request $request){

        $save = new CustomersModel;
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success','Customers Successfully create');

        
    }
    public function edit_customers($id,Request $request){
        // echo $id;die();
        $data ['getRecord']= CustomersModel::find($id);
        return view('admin.customers.edit' , $data);

    }

    public function update_customers($id,Request $request){

        
        $save = CustomersModel::find($id);
        $save->name = trim($request->name);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->doctor_name = trim($request->doctor_name);
        $save->doctor_address = trim($request->doctor_address);
        $save->save();

        return redirect('admin/customers')->with('success','Customers Successfully update');

        
    }
    public function delete_customers($id){
        // echo $id;die();
        $delete_record = CustomersModel::find($id);
        $delete_record->delete();

        return redirect('admin/customers')->with('error','Customers Successfully delete');

    }
}
