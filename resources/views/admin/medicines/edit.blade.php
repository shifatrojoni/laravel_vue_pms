@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Edit Medicines</h1>
</div>
<Section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Medicines</h5>

                    @include('admin.medicines.form')

                    </div>
            </div>
        </div>
    </div>


</Section>

@endsection