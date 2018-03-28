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
                            <th>Complaint</th>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Blood Pressure</th>
                            <th>Edit</th>
                            <th>Delete</th>

                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $row)
                            <tr>
                                <td>{{$row->id}} </td>
                                <td>{{$row->patient->name}} </td>
                                <td>{{$row->complaint}} </td>
                                <td>{{$row->created_at}}</td>
                                <td>{{ $row->type == 1 ? 'OBGYN' : 'GENERAL'}}</td>
                                <td>{{$row->blood_pressure}} </td>
                                <td><a href="{{ route('admin.registration.edit', $row->id)}}"><span><i class="fa fa-pencil"></span></a></i></td>
                                <td><a href="{{ route('admin.registration.destroy', $row->id)}}"><span><i class="mdi mdi-delete"></span></a></i></td>
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