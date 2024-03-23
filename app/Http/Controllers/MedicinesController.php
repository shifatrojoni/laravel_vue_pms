<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicinesModel;
use App\Models\MedicinesStockModel;

class MedicinesController extends Controller
{
   public function medicines(Request $request){
    // echo "Hello";

     $data['getRecord'] = MedicinesModel::where('isDeleted','=',0)->get();
    return view('admin.medicines.list',$data);

   }
   public function add_medicines(){
   

     return view('admin.medicines.add');

   }
   public function add_update_M(Request $request){

        $SaveUpdate = new MedicinesModel;
     $SaveUpdate ->name = $request->name;
     $SaveUpdate ->packing = $request->packing;
     $SaveUpdate ->generic_name = $request->generic_name;
     $SaveUpdate ->supplier_name = $request->supplier_name;
     $SaveUpdate->save();

     return redirect('admin/medicines')->with('success','Medicines successfully saved');
     

   }

   public function edit_medicines($id){

    $data['getRecord'] = MedicinesModel::find($id);
    return view('admin.medicines.edit', $data);

   }

   public function add_update_edit($id = '', Request $request){

    // dd($request->all());
    if(!empty($id)){
        $SaveUpdate = MedicinesModel::find($id);

    }else{

        $SaveUpdate = new MedicinesModel;

    }
  
     $SaveUpdate ->name = $request->name;
     $SaveUpdate ->packing = $request->packing;
     $SaveUpdate ->generic_name = $request->generic_name;
     $SaveUpdate ->supplier_name = $request->supplier_name;
     $SaveUpdate->save();

     return redirect('admin/medicines')->with('success','Medicines successfully update');
     

   }

   public function medicines_delete($id){
     $deleteRecord = MedicinesModel::find($id);
     $deleteRecord->isDeleted = 1;
     $deleteRecord->save();
    // $deleteRecord->delete();
     return redirect()->back()->with('success',"Record Delete");
   }

   public function medicines_stock_list(){
       $data['getRecord'] = MedicinesStockModel::get();
       return view('admin.medicines_stock.list',$data);
   }

   public function medicines_stock_add(){

    $data['getRecord'] = MedicinesModel::where('isDeleted','=',0)->get();
      return view('admin.medicines_stock.add',$data);

   }
   public function medicines_stock_store(Request $request){

       //dd($request->all());
       $SaveUpdate = new MedicinesStockModel;
       $SaveUpdate ->medicines_id = $request->medicines_id;
     $SaveUpdate ->batch_id = $request->batch_id;
     $SaveUpdate ->expiry_date = $request->expiry_date;
     $SaveUpdate ->quantity = $request->quantity;
     $SaveUpdate ->mrp = $request->mrp;
     $SaveUpdate ->rate = $request->rate;
     $SaveUpdate->save();

     return redirect('admin/medicines_stock')->with('success','Medicines Stock successfully save');
     

   }
   public function medicines_stock_delete(Request $request,$id){

        $DeleteRecord = MedicinesStockModel::find($id);
        $DeleteRecord->delete();
     return redirect()->back()->with('success',"Record Delete");
    
   }
   public function medicines_stock_edit($id,Request $request){

        $data['oldRecord']    = MedicinesStockModel::find($id);
       $data['getRecord'] = MedicinesModel::where('isDeleted','=',0)->get();
        return view('admin.medicines_stock.edit',$data);

   }
   public function medicines_stock_edit_update($id,Request $request){

    $SaveUpdate = MedicinesStockModel::find($id);
    $SaveUpdate ->medicines_id = $request->medicines_id;
  $SaveUpdate ->batch_id = $request->batch_id;
  $SaveUpdate ->expiry_date = $request->expiry_date;
  $SaveUpdate ->quantity = $request->quantity;
  $SaveUpdate ->mrp = $request->mrp;
  $SaveUpdate ->rate = $request->rate;
  $SaveUpdate->save();

  return redirect('admin/medicines_stock')->with('success','Medicines Stock successfully updated');
  


   }


}
