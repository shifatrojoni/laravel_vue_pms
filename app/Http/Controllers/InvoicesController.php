<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvoicesModel;
use App\Models\CustomersModel;

class InvoicesController extends Controller
{
    public function index(Request $request){
        $data['getRecord'] = InvoicesModel::get();
        return view('admin.invoices.list',$data);
    }
    public function create(Request $request){

        $data['getRecord'] = CustomersModel::get();
        return view('admin.invoices.add',$data);

    }
    public function store(Request $request){
        //dd($request->all());
        $save = new InvoicesModel;
        $save->net_total = $request->net_total;
        $save->invoices_date = $request->invoices_date;
        $save->customers_id = $request->customers_id;
        $save->total_amount = $request->total_amount;
        $save->total_discount = $request->total_discount;
        $save->save();

        return redirect('admin/invoices')->with('success','Invoices Successfully create');

    }
    public function delete($id,Request $request){
        $deleteRecord = InvoicesModel::find($id);
        $deleteRecord->delete();
        return redirect()->back()->with('success',"Record Successfully Delete");

    }
    public function edit($id,Request $request){
        $data['EditRecord'] = InvoicesModel::find($id);
        $data['getRecord'] = CustomersModel::get();
        return view('admin.invoices.edit',$data);

    }
    public function update($id,Request $request){
        //dd ($request->all());
        $update = InvoicesModel::find($id);
        $update->net_total = trim($request->net_total);
        $update->customers_id = trim($request->customers_id);
        $update->invoices_date = trim($request->invoices_date);
        $update->total_amount = trim($request->total_amount);
        $update->total_discount = trim($request->total_discount);
        $update->save();

        return redirect('admin/invoices')->with('success','Invoices Successfully update');
    }
}
