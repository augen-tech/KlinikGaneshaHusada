@extends('doctor.layouts.app')

@section('styles')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Add Diagnosis</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Add Diagnosis</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                 <form action="{{ route('doctor.diagnosis.store')}}" method="POST" class="tab-wizard wizard-circle">
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
                                    <label>Result :</label>
                                    <textarea name="result" rows="6" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Input Prescription</h6>
                    <section>
                        <div id="dynamic_field">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                                <label for="intType1">Medicine</label>
                                                <select class="select2" style="width: 100%">
                                                    <option>Select</option>
                                                    <optgroup label="A">
                                                        <option value="AK">Asam Mefenamat</option>
                                                    </optgroup>
                                                    <optgroup label="B">
                                                        <option value="CA">Budug</option>
                                                    </optgroup>
                                                    <optgroup label="C">
                                                        <option value="AZ">Cacing</option>
                                                    </optgroup>
                                                    <optgroup label="D">
                                                        <option value="AL">Dendy</option>
                                                    </optgroup>
                                                    <optgroup label="E">
                                                        <option value="CT">Esmeralda</option>
                                                    </optgroup>
                                                </select>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <label class="control-label">Qty</label>
                                        <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="vertical-spin"> </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="notation1">Notation :</label>
                                            <input type="text" class="form-control" id="notation1"> </div>
                                    </div>
                                    <div class="col-md-1">
                                            <div class="form-group">
                                                    <label for="notation1">Clear</label>
                                                    <button type="button" name="remove" id="remove" class="btn btn-danger btn_remove">X</button>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <button name="add" id="add" type="button" class="btn btn-block btn-info">Add medicine</button>
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

@section('scripts')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.steps.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/jquery.validate.min.js')}}"></script>
<script src="{{ asset('material/plugins/wizard/steps.js')}}"></script>
<script src="{{ asset('material/plugins/select2/dist/js/select2.full.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js')}}" type="text/javascript"></script>
<script>
$( document ).ready(function() {
    var i=1;  
    $(document).on("click","#add",function() {
        i++;
        $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-6"><div class="form-group"><label for="intType1">Medicine</label><select class="select2" style="width: 100%"><option>Select</option><optgroup label="A"><option value="AK">Asam Mefenamat</option></optgroup><optgroup label="B"><option value="CA">Budug</option></optgroup><optgroup label="C"><option value="AZ">Cacing</option></optgroup><optgroup label="D"><option value="AL">Dendy</option></optgroup><optgroup label="E"><option value="CT">Esmeralda</option></optgroup></select></div></div><div class="col-md-1"><div class="form-group"><label class="control-label">Qty</label><input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="" name="vertical-spin"> </div></div><div class="col-md-4"><div class="form-group"><label for="notation1">Notation :</label><input type="text" class="form-control" id="notation1"></div></div><div class="col-md-1"><div class="form-group"><label for="notation1">Clear</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
    });
    $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
    $(".vertical-spin").TouchSpin({
        verticalbuttons: true,
        verticalupclass: 'ti-plus',
        verticaldownclass: 'ti-minus'
    });
    $(".select2").select2();
});
</script> 

  
@endsection