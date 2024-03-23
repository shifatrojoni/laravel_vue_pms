@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1> Edit Purchases</h1>
</div>
<Section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Purchases</h5>

                    <form action="{{url('admin/purchases/edit/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Suppliers Name<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="suppliers_id" required>
                                    @foreach($GetSuppliers as $value1)
                                    <option {{ ($value1->id == $getRecord->suppliers_id) ? 'selected' : ''}} value="{{ $value1->id}}">{{ $value1->suppliers_name}}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Invoices ID<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="invoices_id" required>
                                    @foreach($GetInvoices as $value2)
                                    <option {{ ($value2->id == $getRecord->invoices_id) ? 'selected' : ''}} value="{{$value2->id}}">{{$value2->id}}</option>
                                    @endforeach
                                </select>
                            
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Voucher Number <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="voucher_number" class="form-control" value="{{ $getRecord->voucher_number }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Purchase Date<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" name="purchase_date" class="form-control" value="{{ $getRecord->purchase_date }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Amount<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="total_amount" class="form-control"  value="{{ $getRecord->total_amount }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Payment Status<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <select class="form-control" name="payment_status" required>
                                    <option {{ ($getRecord->payment_status == '1') ? 'selected' : ''}}  value="1">Pending</option>
                                    <option {{ ($getRecord->payment_status == '2') ? 'selected' : ''}}   value="2">Accept</option>
                                    <option {{ ($getRecord->payment_status == '3') ? 'selected' : ''}}   value="3">Cancel</option>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>


</Section>

@endsection