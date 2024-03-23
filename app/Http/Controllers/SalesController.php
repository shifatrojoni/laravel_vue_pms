<?php

namespace App\Http\Controllers;

use App\Models\SalesModel;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = SalesModel::get();
        return view('admin.sales.list',$data);

    }
    public function create(){
        $data['getRecord'] = SalesModel::get();
        return view('admin.sales.add',$data);
        
    }
    public function store(Request $request){
        // dd($request->all());
        $save = new SalesModel;
        $save->member_id = $request->member_id;
        $save->total_items = $request->total_items;
        $save-> total_price = $request->total_price;
        $save->discount = $request->discount;
        $save->paid = $request->paid;
        $save->received = $request->received;
        $save->user_id = $request->user_id;
        $save->save();
        return redirect('admin/sales')->with('success','Sales  Successfully create');
    }
    public function edit($id,Request $request){
      
        return view('admin.sales.edit');

    }
    public function update($id,Request $request){
        //dd($request->all());

        // $save = SalesModel::find($id);
        // $save->suppliers_id = $request->suppliers_id;
        // $save->invoices_id = $request->invoices_id;
        // $save->voucher_number = $request->voucher_number;
        // $save->purchase_date = $request->purchase_date;
        // $save->total_amount = $request->total_amount;
        // $save->payment_status = $request->payment_status;
        // $save->save();
        return redirect('admin/sales')->with('success','Sales  Successfully update');

    }
    public function delete($id,Request $request){
        $delete_record = SalesModel::find($id);
        $delete_record->delete();

        return redirect('admin/sales')->with('error','Sales Successfully Delete');


    }
}
