@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
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
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                 <form action="{{ isset($diagnosis) ? route('doctor.diagnosis.update', $diagnosis-> id) : route('doctor.diagnosis.store')}}" method="POST" class="tab-wizard wizard-circle">
                    
                    <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                    <!-- Step 1 -->
                    <h6>Patient Info</h6>
                    <section>
                        <div class="row">
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
                                        <a href="{{ route('doctor.patient.detail', $registration->id)}}"><span><i class="fa fa-info-circle">Details</i></span></a>
                                    </div>
                                </div>
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h6>Dignosis Result</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <textarea name="subject" rows="6" class="form-control" value="{{ isset($diagnosis) ? $diagnosis->subject : ''}}" placeholder="{{ isset($diagnosis) ? $diagnosis->subject : ''}}"></textarea>
                                    <label>Object</label>
                                    <textarea name="object" rows="6" class="form-control" value="{{ isset($diagnosis) ? $diagnosis->object : ''}}" placeholder="{{ isset($diagnosis) ? $diagnosis->object : ''}}"></textarea>
                                    <label>Assesment</label>
                                    <textarea name="assesment" rows="6" class="form-control" value="{{ isset($diagnosis) ? $diagnosis->assesment : ''}}" placeholder="{{ isset($diagnosis) ? $diagnosis->assesment : ''}}"></textarea>
                                    <label>Planning</label>
                                    <textarea name="planning" rows="6" class="form-control" value="{{ isset($diagnosis) ? $diagnosis->planning : ''}}" placeholder="{{ isset($diagnosis) ? $diagnosis->planning : ''}}"></textarea>
                                </div>
                                <div class="form-group">
                                        <label class="control-label">Special Request</label>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input required id="radio5" name="radio" type="radio" class="custom-control-input" value="1" {{ isset($diagnosis) ? ($diagnosis->special_request == 1) ? 'checked' : '' : ''}}>
                                                <span class="custom-control-label">yes</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio6" name="radio" type="radio" class="custom-control-input" value="0" {{ isset($diagnosis) ? ($diagnosis->special_request == 0) ? 'checked' : '' : ''}}>
                                                <span class="custom-control-label">no</span>
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Input Prescription</h6>
                    <section>
                        <div id="dynamic_field">
                            @if(isset($medicine_prescriptions))
                            @foreach($medicine_prescriptions as $key => $row_mp)
                                <div class="row" id="{{ 'row' . $key}}">
                                    <div class="col-md-6">
                                        <label for="intType1">Medicine</label>
                                        <div class="form-group">
                                            <select class="select2" style="width: 100%" name="medicine[]">
                                                @foreach($medicines as $row )
                                                    <option value="{{$row->id}}" {{ ($row_mp->medicine->id == $row->id) ? 'selected' : '' }}> {{$row->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="control-label">Qty</label>
                                            <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="{{ isset($medicine_prescriptions) ? $row_mp->amount : ''}}" placeholder="{{ isset($medicine_prescription) ? $row_mp->amount : ''}}" name="amount[]"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                                            <label for="notation1">Notation :</label>
                                            <input name="notation[]" type="text" class="form-control" id="notation1" value="{{ isset($medicine_prescriptions) ? $row_mp->notation : ''}}" placeholder="{{ isset($medicine_prescriptions) ? $row_mp->notation : ''}}"></div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                                <label for="notation1">Clear</label>
                                                <button type="button" name="btn_remove" id="{{ $key }}" class="btn btn-danger btn_remove">X</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="intType1">Medicine</label>
                                    <div class="form-group">
                                        <select class="select2" style="width: 100%" name="medicine[]">
                                            @foreach($medicines as $row )
                                                <option value="{{$row->id}}"> {{$row->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">Qty</label>
                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" name="amount[]"></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                                        <label for="notation1">Notation :</label>
                                    <input name="notation[]" type="text" class="form-control" id="notation1" value=""></div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                            <label for="notation1">Clear</label>
                                            <button type="button" name="btn_remove" id="0" class="btn btn-danger btn_remove">X</button>
                                    </div>
                                </div>
                            <
                            @endif
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <button name="add" id="add" type="button" class="btn btn-block btn-info" data-count={{ isset($medicine_prescriptions) ? count($medicine_prescriptions): " " }}>Add medicine</button>
                                </center>
                                <br>
                                <br>
                            </div>
                        </div>
                        </div>
                    </section>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script>
$( document ).ready(function() {
    var i = 0;
    i = $(this).attr("data-count");
    $(document).on("click","#add",function() {
        $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-6"><div class="form-group"><label for="intType1">Medicine</label><select class="select2" style="width: 100%" name="medicine[]">@foreach($medicines as $row)<option value="{{$row->id}}">{{$row->name}}</option>@endforeach</select></div></div><div class="col-md-1"><div class="form-group"><label class="control-label">Qty</label><input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" name="amount[]"></div></div><div class="col-md-4"><div class="form-group"><input type="hidden" name="registration_id" value="{{ $registration-> id}}"><label for="notation1">Notation :</label><input name="notation[]" type="text" class="form-control" id="notation1" value="{{ isset($prescription) ? $prescription->notation : ''}}" placeholder="{{ isset($prescription) ? $prescription->notation : ''}}"></div></div><div class="col-md-1"><div class="form-group"><label for="notation1">Clear</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
        //<input type="hidden" name="registration_id" value="{{ $registration-> id}}">
        i++;
        $(".select2").select2();
        $(".vertical-spin").TouchSpin({
            verticalbuttons: true,
            verticalupclass: 'ti-plus',
            verticaldownclass: 'ti-minus'
        });
    });
    $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
    });
    $(".select2").select2();
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true,
        verticalupclass: 'ti-plus',
        verticaldownclass: 'ti-minus'
    });
});
</script> 

  
@endsection