@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Lab</a></li>
            <li class="breadcrumb-item active">List</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Result</h4>
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                {{-- <div class="table-responsive m-t-40"> --}}
                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            @if(isset($patients))
                                <tr>                                    
                                    <th>Patient</th>
                                    <th>Date of Birth</th>
                                    <th>Address</th>
                                    <th>Blood Type</th>
                                    <th>Gender</th>
                                    <th>Phone</th>
                                                                                                
                                </tr>
                            @else
                                <tr>
                                    <th>Id</th>
                                    <th width="15%">Diagnosis Id</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Result</th>                                
                                    <th>Action</th>                                                                                                     
                                </tr>
                            
                            @endif
                            
                        </thead>
                        
                        <tbody>
                            @if(isset($patients))
                                @foreach($patients as $row)
                                    <tr>
                                        <td>
                                            <div><left>{{str_pad($row->id,6,"0",STR_PAD_LEFT)}}</left></span>                                            
                                            <div><left>{{$row->name}}</left></span>
                                        </td>                                        
                                        <td>{{$row->dob}}</td>
                                        <td>{{$row->address}}</td>
                                        <td>{{$row->blood_type}}</td>
                                        <td>{{$row->gender}}</td>
                                        <td>{{$row->phone}}</td>                                                                           
                                    </tr>
                                @endforeach
                            @else
                                @foreach($resultLabs as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->diagnosis->id}}</td>
                                        <td>                                            
                                            <div><left>{{str_pad($row->diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT)}}</left></span>                                            
                                            <div><left>{{$row->diagnosis->registration->patient->name}}</left></span>
                                        </td>
                                        <td>{{$row->diagnosis->registration->doctor->name}}</td>
                                        <td>{{$row->result}}</td>                                        
                                        <td>
                                            <a href="{{ route('healthAnalyst.resultLab.edit', $row->id)}}">
                                                <span><i class="mdi mdi-lead-pencil"></i></span>          
                                            </a> 
                                            <a href="{{ route('healthAnalyst.resultLab.destroy', $row->id)}}">
                                                <span><i class="mdi mdi-delete"></i></span>          
                                            </a>    
                                        </td>                                    
                                    </tr>
                                @endforeach   
                            @endif
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