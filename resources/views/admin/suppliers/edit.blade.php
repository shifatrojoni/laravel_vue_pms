@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Edit Suppliers</h1>
</div>
<Section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Suppliers</h5>

                    <form action="{{url('admin/suppliers/edit',$getRecord->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field()}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Suppliers Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{$getRecord->suppliers_name}}" name="suppliers_name" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Suppliers Email <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value= "{{$getRecord->suppliers_email}}" name="suppliers_email" class="form-control" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Contact Number<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" value= "{{$getRecord->contact_number}}"  name="contact_number" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-10">
                                <textarea name="address" class="form-control">{{$getRecord->address}}</textarea>
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