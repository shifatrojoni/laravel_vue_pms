@if(!empty($getRecord))

<form action="{{ url('admin/medicines/edit/'.$getRecord->id)}}" method="post" enctype="multipart/form-data">

@else

<form action="{{url('admin/medicines/add_M')}}" method="post" enctype="multipart/form-data">

    @endif
                        {{ csrf_field()}}
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Medicines Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('name', !empty($getRecord) ? $getRecord->name : '')}}" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Packing <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('packing', !empty($getRecord) ? $getRecord->packing : '')}}" name="packing" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Generic Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('generic_name', !empty($getRecord) ? $getRecord->generic_name : '')}}" name="generic_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Supplier Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" value="{{old('supplier_name', !empty($getRecord) ? $getRecord->supplier_name : '')}}" name="supplier_name" class="form-control" required>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        
                    </form>