<?php

namespace App\Http\Controllers;

use App\Models\SuppliersModel;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
     public function index(Request $request){

      $data['getRecord'] = SuppliersModel::get();
        return view('admin.suppliers.list',$data);

     }
     public function create(Request $request){
          return view('admin.suppliers.add');

     }
     public function store(Request $request){
          //dd($request->all()); 

          $save = new SuppliersModel;
        $save->suppliers_name = trim($request->suppliers_name);
        $save->suppliers_email = trim($request->suppliers_email);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->save();

        return redirect('admin/suppliers')->with('success','Suppliers Successfully create');

     }
     public function edit($id,Request $request){
          $data['getRecord'] = SuppliersModel::find($id);
          return view('admin.suppliers.edit',$data);

     }
     public function update($id,Request $request){
          
          $save =SuppliersModel::find($id);
        $save->suppliers_name = trim($request->suppliers_name);
        $save->suppliers_email = trim($request->suppliers_email);
        $save->contact_number = trim($request->contact_number);
        $save->address = trim($request->address);
        $save->save();

        return redirect('admin/suppliers')->with('success','Suppliers Successfully update.');


     }
     public function delete($id,Request $request){
          $remove = SuppliersModel::find($id);
          $remove->delete();
          return redirect('admin/suppliers')->with('error','Suppliers Successfully Delete.');

     }
}
