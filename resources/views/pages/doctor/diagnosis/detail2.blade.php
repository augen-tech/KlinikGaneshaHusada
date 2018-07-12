@extends('layouts.app')

@section('style')
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
            <div class="card-body ">
                 <form action="{{ isset($diagnosis) ? route('doctor.diagnosis.update', $diagnosis-> id) : route('doctor.diagnosis.store')}}" method="POST" class="tab-wizard wizard-circle">
                    
                    <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                    <!-- Step 1 -->
                    <h3>Informasi Pasien</h3>
                    <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Pasien :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$registration->patient->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Nomor Telepon :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$registration->patient->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name1">Nama Pasien :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$registration->patient->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Tanggal Lahir :</label>
                                    <input type="date" class="form-control" id="date1" disabled value="{{$registration->patient->dob}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1"> Alamat :</label>
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
                    
                    <!-- Step 2 -->
                    <h3>Hasil Diagnosis</h3>
                    <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <textarea name="subject" rows="6" class="form-control" value="{{ $diagnosis->subject }}" placeholder="{{ $diagnosis->subject }}" disabled></textarea>
                                    <label>Object</label>
                                    <textarea name="object" rows="6" class="form-control" value="{{ $diagnosis->object }}" placeholder="{{ $diagnosis->object }}" disabled></textarea>
                                    <label>Assesment</label>
                                    <textarea name="assesment" rows="6" class="form-control" value="{{ $diagnosis->assesment }}" placeholder="{{ $diagnosis->assesment }}" disabled></textarea>
                                    <label>Planning</label>
                                    <textarea name="planning" rows="6" class="form-control" value="{{ $diagnosis->planning }}" placeholder="{{ $diagnosis->planning }}" disabled></textarea>
                                </div>
                                <div class="form-group">
                                        <label class="control-label">Permintaan Khusus</label>
                                        <div class="m-b-10">
                                            <label class="custom-control custom-radio">
                                                <input required id="radio5" name="radio" type="radio" class="custom-control-input" value="1" {{ isset($diagnosis) ? ($diagnosis->special_request == 1) ? 'checked' : '' : ''}}>
                                                <span class="custom-control-label">Ya</span>
                                            </label>
                                            <label class="custom-control custom-radio">
                                                <input id="radio6" name="radio" type="radio" class="custom-control-input" value="0" {{ isset($diagnosis) ? ($diagnosis->special_request == 0) ? 'checked' : '' : ''}}>
                                                <span class="custom-control-label">Tidak</span>
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    
                    <!-- Step 3 -->
                    <h3>Resep</h3>
                    <hr>
                        <div id="dynamic_field">
                            @foreach($medicine_prescriptions as $key => $row_mp)
                                <div class="row" id="{{ 'row' . $key}}">
                                    <div class="col-md-6">
                                        <label for="intType1">Obat</label>
                                        <div class="form-group">
                                            <select class="select2" style="width: 100%" name="medicine[]">
                                                @foreach($medicines as $row )
                                                    <option disabled value="{{$row->id}}" {{ ($row_mp->medicine->id == $row->id) ? 'selected' : '' }}> {{$row->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="control-label">Jumlah</label>
                                            <input disabled class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="{{ isset($medicine_prescriptions) ? $row_mp->amount : ''}}" placeholder="{{ isset($medicine_prescription) ? $row_mp->amount : ''}}" name="amount[]"></div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                                            <label for="notation1">Aturan :</label>
                                            <input disabled name="notation[]" type="text" class="form-control" id="notation1" value="{{ isset($medicine_prescriptions) ? $row_mp->notation : ''}}" placeholder="{{ isset($medicine_prescriptions) ? $row_mp->notation : ''}}"></div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-actions">
                                    <button type="button" href="{{ route('doctor.diagnosis.list')}}" class="btn btn-inverse">Kembali</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/moment/min/moment.min.js')}}"></script>
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