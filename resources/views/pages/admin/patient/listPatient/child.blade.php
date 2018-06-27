@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Patient</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Patient</li>
        </ol>
    </div>
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
                            <th>Parent Name</th>
                            <th>Parent Job</th>
                            <th>Date</th>
                            <!-- <th>Address</th>
                            <th>Phone</th> -->
                            <th>Gender</th>
                            <th>Blood Type</th>
                            <th>Child Order</th>
                            <th>Birth Weight</th>
                            <th>Birth Attendant</th>
                            <th>Labor Method</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $row)
                            @if ($row->religion == "null")                            
                                <tr>
                                    <td>{{$row->id}} </td>
                                    <td>{{$row->name}} </td>
                                    <td>{{$row->parent_name}} </td>
                                    <td>{{$row->parent_job}} </td>
                                    <td>{{$row->dob}}</td>
                                    <!-- <td>{{$row->address}} </td>
                                    <td>{{$row->phone}} </td> -->
                                    <td>{{$row->gender}} </td>
                                    <td>{{$row->blood_type}} </td>
                                    <td>{{$row->child_order}}</td>
                                    <td>{{$row->birth_weight}}</td>
                                    <td>{{$row->birth_attendant}}</td>
                                    <td>{{$row->labor_method}}</td>
                                    <td><a href="{{ route('admin.patient.editchild', $row->id)}}"><span><i class="fa fa-pencil"></span></a></i>
                                        <a href="{{ route('admin.patient.destroychild', $row->id)}}"><span><i class="mdi mdi-delete"></span></a></i></td>
                                </tr>                            
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection