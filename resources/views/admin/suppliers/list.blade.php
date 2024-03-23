@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Suppliers List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                     <a href="{{url('admin/suppliers/add')}}" class="btn btn-primary">Add New Suppliers</a>
                    </h5>

                    <table class="table datatable">
                        <thead>
                         <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Suppliers Name</th>
                            <th scope="col">Suppliers Email</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Address</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                         </tr>
                     </thead>
                     <tbody>
                        @foreach($getRecord as $value )
                         <tr>
                         <th scope="row">{{$value->id }}</th>
                            <td >{{$value->suppliers_name}}</td>
                            <td >{{$value->suppliers_email}}</td>
                            <td >{{$value->contact_number}}</td>
                            <td >{{$value->address}}</td>
                            <td >{{ date('d-m-Y H:i:s',strtotime($value->created_at)) }}</td>
                            <td>
                                <a href="{{url('admin/suppliers/edit/'.$value->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                <a href="{{url('admin/suppliers/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')"><i class="bi bi-trash"></i></a>
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