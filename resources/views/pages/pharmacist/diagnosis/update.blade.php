@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Update Diagnosis</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Diagnosis</a></li>
            <li class="breadcrumb-item active">Update Diagnosis</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            
                <table id="example23" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Date</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnoses as $key =>$row)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ $row->created_at}}</td>
                                <td>{{ $row->registration->patient->name }}</td>
                                <td></td>
                                <td>        
                                    <a href="{{ route('pharmacist.diagnosis.proceed', $row->id) }}" data-toggle="tooltip" data-original-title="Update"><span><i class="fa fa-tasks text-inverse m-r-10"></i></span></a>
                                    <a href="{{ route('doctor.diagnosis.destroy', $row->id) }}" data-toggle="tooltip" data-original-title="Delete"><span><i class="fa fa-close text-danger"></i></span></a>
                                </td>
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
    <!-- This is data table -->
    <script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>$('#example23').DataTable();</script>
@endsection