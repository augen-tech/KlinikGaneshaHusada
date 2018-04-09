@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($diagnosis) ? 'Edit Diagnosis': 'Add Diagnosis'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($diagnosis) ? 'Edit Diagnosis':'Add Diagnosis'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($diagnosis) ? route('doctor.diagnosis.update', $diagnosis-> id) : route('doctor.diagnosis.store')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                    <div class="form-body">
                        <h3 class="card-title">Patient Info</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Patient :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$registration->patient->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Phone Number :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$registration->patient->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name1">Patient Name :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$registration->patient->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Date of Birth :</label>
                                    <input type="date" class="form-control" id="date1" disabled value="{{$registration->patient->dob}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1"> Address :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$registration->patient->address}}">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('doctor.patient.detail', $registration->patient->id)}}"><span><i class="fa fa-info-circle">Details</i></span></a>
                                </div>
                            </div>
                        </div>
                        <h3 class="box-title m-t-40">Upload Diagnosis</h3>
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">File Diagnosis</h4>
                                    <input type="file" id="file" name="file" class="dropify">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Special Request</label>
                                <div class="m-b-10">
                                    <label class="custom-control custom-radio">
                                        <input id="radio5" name="radio" type="radio" class="custom-control-input" value="1" {{ isset($diagnosis) ? ($diagnosis->special_request == 1) ? 'checked' : '' : ''}}>
                                        <span class="custom-control-label">yes</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio6" name="radio" type="radio" class="custom-control-input" value="0" {{ isset($diagnosis) ? ($diagnosis->special_request == 0) ? 'checked' : '' : ''}}>
                                        <span class="custom-control-label">no</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i> Submit</button>
                            <button type="button" class="btn btn-inverse">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection

@section('script')
<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 


  
@endsection