@extends('healthAnalyst.layouts.app')

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
                            <tr>
                                <th>Id</th>
                                <th width="15%">Diagnosis Id</th>
                                <th>Result</th>                                
                                <th>Edit</th>                                                                 
                                <th>Delete</th>                                                                 
                            </tr>
                        </thead>
                        
                        <tbody>

                            @foreach($resultLab as $row)
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
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>        
    </div>
</div>
@endsection