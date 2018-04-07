@extends('layouts.app')

@section('styles')

@endsection

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Patients</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Patients</li>
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
                            <th style="width : 10%">Id Registration</th>
                            <th style="width : 40%">Patient</th>
                            <th style="width : 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $row)
                            <tr>
                                <td><center>{{ $row->id }}</center></td>
                                <td>{{ $row->name }}</td>
                            <td><a href="{{ route('doctor.patient.detail', $row->id)}}"><center><span><i class="fa fa-search"></i></span></center></a></td>
                            </tr>                            
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