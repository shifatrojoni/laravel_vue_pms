@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1> Edit Medicines</h1>
</div>

<Section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Medicines</h5>

 <form action="{{url('admin/medicines_stock/edit/'.$oldRecord->id)}}" method="post" enctype="multipart/form-data">

  
                        {{ csrf_field()}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Medicines Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <select class="form_control" name="medicines_id" required>
                                    <option value="">Select Medicines Name</option>
                                    @foreach($getRecord as $value)
                                    <option {{ ($value->id == $oldRecord->medicines_id) ? 'selected' : '' }}value="{{ $value->id }}">{{ $value->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Batch Id <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{ $oldRecord->batch_id}}" name="batch_id" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Expiry Date <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="date" value="{{$oldRecord->expiry_date}}" name="expiry_date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Quantity<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$oldRecord->quantity}}" name="quantity" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">MRP<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$oldRecord->mrp}}" name="mrp" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Rate<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$oldRecord->rate}}" name="rate" class="form-control" required>
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