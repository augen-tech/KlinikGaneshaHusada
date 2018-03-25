@extends('healthAnalyst.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Diagnosis</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Id</th>                                                                
                                {{--  <th>RegistrationId</th>          --}}
                                <th>Result</th>                                
                                <th>Special Request</th>                                
                                <th>Create</th>                                
                            </tr>
                        </thead>
                        
                        <tbody>

                            @foreach($diagnoses as $row)
                                <tr>
                                <td>{{$row->id}}</td>                                
                                {{--  <td>{{$row->registration_id}}</td>      --}}
                                <td>{{$row->result}}</td>
                                <td>{{$row->special_request}}</td>                                
                                <td>                                
                                    <a href="{{ route('healthAnalyst.resultLab.form', $row->id)}}">
                                        <span>
                                            <center>
                                                <i class="fa fa-file-text-o"></i>
                                            </center> 
                                        </span>          
                                    </a>    
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