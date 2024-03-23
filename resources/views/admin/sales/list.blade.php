@extends('admin.layouts.app')
@section('content')

<div class="pagetitle">
    <h1>Sales List</h1>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            @include('message')
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                     <a href="{{url('admin/sales/add')}}" class="btn btn-primary">Add New Sales</a>
                    </h5>

                    <table class="table datatable">
                        <thead>
                         <tr>
                            <th scope="col">ID</th>
                            <th scope="col">member_id</th>
                            <th scope="col">total_items</th>
                            <th scope="col">total_price</th>
                            <th scope="col">discount</th>
                            <th scope="col">paid </th>
                            <th scope="col">received</th>
                            <th scope="col">user_id</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Action</th>

                         </tr>
                     </thead>
                     <tbody>
                        @foreach($getRecord as $value)
                       
                         <tr>
                         <th scope="row">{{$value->id}}</th>
                            <td >{{$value->member_id}}</td>
                            <td >{{$value->total_items}}</td>
                            <td >{{$value->total_price}}</td>
                            <td >{{$value->discount}}</td>
                            <td >{{$value->paid}}</td>
                            <td >{{$value->received}}</td>
                            <td >{{$value->user_id}}</td>
                            <td >{{date('d-m-Y',strtotime($value->purchase_date))}}</td>
                            <td >{{$value->total_amount}}</td>
                          
                            
                            <td>
                                <a href="{{url('admin/sales/edit/'.$value->id)}}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>

                                <a href="{{url('admin/sales/delete/'.$value->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete')"><i class="bi bi-trash"></i></a>
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