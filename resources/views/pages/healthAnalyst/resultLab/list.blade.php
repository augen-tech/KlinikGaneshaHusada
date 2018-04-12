@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">List Result</h4>
                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            @if(isset($patients))
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
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
                                    <th>Result</th>                                
                                    <th>Edit</th>                                                                 
                                    <th>Delete</th>                                                                 
                                </tr>
                            
                            @endif
                            
                        </thead>
                        
                        <tbody>
                            @if(isset($patients))
                                @foreach($patients as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
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
                                        <td>{{$row->result}}</td>
                                        <td>
                                            <a href="{{ route('healthAnalyst.resultLab.edit', $row->id)}}">
                                                <span><center><i class="mdi mdi-lead-pencil"></i></center></span>          
                                            </a>    
                                        </td>
                                        <td>
                                            <a href="{{ route('healthAnalyst.resultLab.destroy', $row->id)}}">
                                                <span><center><i class="mdi mdi-delete"></i></center></span>          
                                            </a>    
                                        </td>                                    
                                    </tr>
                                @endforeach   
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection