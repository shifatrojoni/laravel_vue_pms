@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1> Add Invoices</h1>
</div>

<Section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Invoices</h5>

 <form action="{{url('admin/invoices/add')}}" method="post" enctype="multipart/form-data">

  
                        {{ csrf_field()}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Customers Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <select class="form_control" name="customers_id" required>
                                    <option value="">Select Customers Name</option>
                                    @foreach($getRecord as $value)
                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Net Total<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('net_total')}}" name="net_total" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Invoices Date<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" value="" name="invoices_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Amount<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('total_amount')}}" name="total_amount" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Total Discount<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('total_discount')}}" name="total_discount" class="form-control" required>
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        
                    </form>
                    

               </div>
            </div>
        </div>
    </div>


</Section>

@endsection