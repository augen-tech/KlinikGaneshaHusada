@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Create Result Lab</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Diagnosis</a></li>
            <li class="breadcrumb-item active">List Diagnosis</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Diagnosis</h4>
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                {{-- <div class="table-responsive m-t-40"> --}}
                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>                                                                                                
                                <th>Date</th>                                
                                <th>Evidence</th>                                
                                <th>Patient</th>                                                                                            
                                <th>Doctor</th>  
                                <th>Action</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>

                            @foreach($diagnoses as $index => $row)
                                
                                <tr>
                                {{-- <td>{{$index + 1}}</td>                                                                 --}}
                                <td>{{$row->id}}</td>
                                <td>{{$row->created_at}}</td>
                                <td>{{$row->evidence}}</td>
                                <td>{{$row->registration->patient->name}}</td>                                
                                <td>{{$row->registration->doctor->name}}</td>                                
                                <td>                                
                                    <a href="{{ route('healthAnalyst.resultLab.form', $row->id)}}">
                                        <span><center><i class="fa fa-check m-r-10"></i></center> </span>          
                                    </a>    
                                </td>
                                </tr>
                                
                            @endforeach
                            
                        </tbody>
                    </table>
                {{-- </div> --}}
            </div>
        </div>        
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection