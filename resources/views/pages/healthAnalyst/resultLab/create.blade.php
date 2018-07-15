@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Lab</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Diagnosa</a></li>
            <li class="breadcrumb-item active">Daftar Diagnosa</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Diagnosis</h4>
                {{-- <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> --}}
                {{-- <div class="table-responsive m-t-40"> --}}
                    <table id="myTable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center">No</th>                                                                                                
                                <th style="text-align:center" style="width:10%">Tanggal</th>                                                                
                                <th style="text-align:center">Pasien</th>                                                                                            
                                <th style="text-align:center">Dokter</th>  
                                <th style="text-align:center">Aksi</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>

                            @foreach($diagnoses as $index => $row)                                
                                <tr>                                    
                                    <td style="text-align:center">{{$index + 1}}</td>
                                    <td style="text-align:center">{{$row->created_at}}</td>
                                    
                                    <td>                                        
                                        {{str_pad($row->registration->patient->id,6,"0",STR_PAD_LEFT)}}<br>
                                        {{$row->registration->patient->name}}
                                    </td>                                
                                    <td>
                                        {{str_pad($row->registration->doctor->id,6,"0",STR_PAD_LEFT)}}<br>
                                        {{$row->registration->doctor->name}}
                                    </td>                                
                                    <td style="text-align:center">                                
                                        <a href="{{ route('healthAnalyst.resultLab.form', $row->id)}}">
                                            <span><i class="fa fa-plus"></i></span>          
                                        </a>   
                                        @if($row->evidence != null) 
                                            <a href="{{ Storage::url($row->evidence) }}" target="_blank">
                                                <span><i class="fa fa-download" ></i></span>
                                            </a>                      
                                        @endif              
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