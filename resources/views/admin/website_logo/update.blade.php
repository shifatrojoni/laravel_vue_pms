@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Profile Update</h1>
</div>
<Section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Profile Update</h5>

                    <form action="{{url('admin/my_account')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field()}}

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Name <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required value="{{ $getRecord->name}}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email <span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required value="{{ $getRecord->email}}">
                                <span style="color: red;">{{ $errors->first('email')}}</span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Profile Image<span style="color: red;"></span></label>
                            <div class="col-sm-10">
                                <input class="form-control" name="profile_image" type="file" id="formFile">
                                @if(!empty($getRecord->profile_image))
                                <img src="{{ $getRecord->getProfileImage()}}" height="100px" width="100px">
                                @endif

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