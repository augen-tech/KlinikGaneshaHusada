@extends('doctor.layouts.app')

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">List Diagnosis</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">List Diagnosis</li>
        </ol>
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
                                <th>Id</th>
                                <th style="width:30%">Patient</th>
                                <th>Result</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($diagnoses as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->registration->patient->name }}</td>
                                    <td>{{ $row->result }}</td>
                                    <td><a href="#"><span><i class="fa fa-pencil"></i></span></a>
                                        <a href="#"><span><i class="mdi mdi-delete"></i></span></a>
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