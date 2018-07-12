@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet" type="text/css"/>
@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Daftar Diagnosis</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Daftar Diagnosis</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tanggal</th>
                                <th style="width:30%">Pasien</th>
                                <th>Rumah Sakit Tujuan</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($references as $row)
                                <tr>
                                    <td><center>{{ $row->id }}</center></td>
                                    <td><center>{{ $row->created_at }}</center></td>
                                    <td><a href="{{ route('doctor.patient.detail', $row->diagnosis->registration->patient->id) }}">
                                            {{ $row->diagnosis->registration->patient->name }}
                                            <br>
                                            ID : {{ str_pad($row->diagnosis->registration->patient->id,6,0,STR_PAD_LEFT) }}
                                        </a>
                                    </td>
                                    <td>{{ $row->hospital }}</td>
                                    <td><center>   
                                            <a href="{{ route('doctor.reference.edit', $row->id) }} " data-toggle="tooltip" data-original-title="Edit"><span><i class="fa fa-pencil"></i></span></a>
                                            <a href="{{ route('doctor.reference.destroy', $row->id) }}"><span><i class="mdi mdi-delete" alt="alert" id="sa-params"></i></span></a>
                                            
                                            {{-- <a href="{{ route('doctor.diagnosis.detail', $row->id) }}"><span><i class="fa fa-search"></i></span></a> --}}
                                        </center>
                                    </td>
                                </tr>                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{ asset('material/plugins/sweetalert/jquery.sweet-alert.custom.js')}}"></script>
<script>$('#myTable').DataTable({
    "order": [[ 1, "desc" ]]
});</script>
@endsection