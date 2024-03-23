@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Medicines List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                     <a href="{{url('admin/medicines/add')}}" class="btn btn-primary">Add New Medicine</a>
                    </h5>

                    <table class="table datatable">
                        <thead>
                         <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Medicine Name</th>
                            <th scope="col">Packing</th>
                            <th scope="col">Generic Name</th>
                            <th scope="col">Supplier Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                         </tr>
                     </thead>
                     <tbody>
                        @foreach($getRecord as $value )
                         <tr>
                         <th scope="row">{{$value->id }}</th>
                            <td >{{$value->name}}</td>
                            <td >{{$value->packing}}</td>
                            <td >{{$value->generic_name}}</td>
                            <td >{{$value->supplier_name}}</td>
                            <td >{{ date('d-m-Y H:i:s',strtotime($value->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/medicines/edit/'.$value->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                <a href="{{url('admin/medicines/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')"><i class="bi bi-trash"></i></a>
                            </td>
                           
                        </tr>
                        @endforeach
                     </tbody>
                     </table>

                    </div>
    </div>
 </div>
</div>
</section>
@endsection
