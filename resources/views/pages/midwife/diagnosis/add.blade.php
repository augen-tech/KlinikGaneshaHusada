@extends('layouts.app')

@section('styles')

@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Add Diagnosis</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Add Diagnosis</li>
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
                            <th style="width : 5%">ID</th>
                            <th>Date</th>
                            <th style="width : 30%">Patient</th>
                            <th style="width : 40%">Complaint</th>
                            <th style="width : 10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->patient->name }}</td>
                                <td>{{ $row->complaint }}</td>
                                <td><a href="{{ route('midwife.diagnosis.create', $row->id)}}"><center><span><i class="fa fa-stethoscope"></i></span></center></a></td>
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
<script>$('#myTable').DataTable({
    "order": [[ 1, "asc" ]]
});</script>
@endsection