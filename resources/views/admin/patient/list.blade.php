@extends('Admin.layouts.app')

@section('dashboard')
@endsection

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Registration</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Registration</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Blood Type</th>
                            <th>Gender</th>
                            <th>Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $row)
                            <tr>
                                <td>{{$row->id}} </td>
                                <td>{{$row->name}} </td>
                                <td>{{$row->dob}} </td>
                                <td>{{$row->address}}</td>
                                <td>{{$row->blood_type}}</td>
                                <td>{{$row->gender}}</td>
                                <td>{{$row->phone}}</td>
                                <td><a href=""><span><i class="fa fa-pencil"></span></a></i></td>
                                <td><a href="#"><span><i class="fa fa-pencil"></span></a></i></td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection