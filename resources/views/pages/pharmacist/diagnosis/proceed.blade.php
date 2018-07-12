@extends('layouts.app')

@section('style')
<link href="{{ asset('material/plugins/wizard/steps.css')}}" rel="stylesheet">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Data Diagnosis</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Diagnosis</a></li>
            <li class="breadcrumb-item">Perbarui Diagnosis</li>
            <li class="breadcrumb-item active">Data Diagnosis</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body wizard-content">
                 <form action="{{ route('pharmacist.diagnosis.store', $diagnoses->id)}}" method="POST" class="tab-wizard wizard-circle">
                    
                    <input type="hidden" name="registration_id" value="{{ $diagnoses->registration->id}}">
                    <!-- Step 1 -->
                    <h6>Info Pasien</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Pasien :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$diagnoses->registration->patient->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Nomor Telepon :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$diagnoses->registration->patient->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name1">Nama Pasien :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$diagnoses->registration->patient->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Tanggal Lahir :</label>
                                    <input type="date" class="form-control" id="date1" disabled value="{{$diagnoses->registration->patient->dob}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1"> Alamat :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$diagnoses->registration->patient->address}}">
                                </div>
                            </div>
                            <br>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <a href="{{ route('doctor.patient.detail', $diagnoses->registration->id)}}"><span><i class="fa fa-info-circle">Details</i></span></a>
                                </div>
                            </div> --}}
                        </div>
                    </section>
                    <!-- Step 2 -->
                    <h6>Hasil Diagnosis</h6>
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Hasil :</label>
                                    <textarea name="result" rows="6" class="form-control" placeholder="Hasil Pasien"></textarea>
                                    <label>Special Request :</label>
                                    <textarea name="special_request" rows="6" class="form-control" placeholder="Patient's Special Request"></textarea>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Masukan Resep</h6>
                    <section>
                        <div id="dynamic_field">
                            @if(isset($medicine_prescriptions))
                            @foreach($medicine_prescriptions as $key => $row_mp)
                                <div class="row" id="{{ 'row' . $key}}">
                                    <div class="col-md-6">
                                        <label for="intType1">Obat</label>
                                        <div class="form-group">
                                            <select class="select2" style="width: 100%" name="medicine[]">
                                                @foreach($medicines as $row )
                                                    <option value="{{$row->id}}" {{($row_mp->medicine->id == $row->id)}}> {{$row->name}} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="control-label">Qty</label>
                                            <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="{{$row_mp->amount}}" placeholder="{{$row_mp->amount}}" name="amount[]"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="registration_id" value="{{ $diagnoses->registration->id}}">
                                            <label for="notation1">Keterangan :</label>
                                            <input name="notation[]" type="text" class="form-control" id="notation1" value="{{$row_mp->notation}}" placeholder="{{$row_mp->notation}}"></div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                                <label for="notation1">Hapus</label>
                                                <button type="button" name="btn_remove" id="{{ $key }}" class="btn btn-danger btn_remove">X</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="intType1">Obat</label>
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
                                        <input type="hidden" name="registration_id" value="{{ $diagnoses->registration->id}}">
                                        <label for="notation1">Keterangan :</label>
                                    <input name="notation[]" type="text" class="form-control" id="notation1" value=""></div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                            <label for="notation1">Hapus</label>
                                            <button type="button" name="btn_remove" id="0" class="btn btn-danger btn_remove">X</button>
                                    </div>
                                </div>
                            </div>
                            @endif
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <center>
                                    <button name="add" id="add" type="button" class="btn btn-block btn-info" data-count={{ isset($medicine_prescriptions) ? count($medicine_prescriptions) : 0 }}>Tambah Obat</button>
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
        $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-6"><div class="form-group"><label for="intType1">Medicine</label><select class="select2" style="width: 100%" name="medicine[]">@foreach($medicines as $row)<option value="{{$row->id}}">{{$row->name}}</option>@endforeach</select></div></div><div class="col-md-1"><div class="form-group"><label class="control-label">Qty</label><input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" name="amount[]"></div></div><div class="col-md-4"><div class="form-group"><input type="hidden" name="registration_id" value="{{ $diagnoses->registration-> id}}"><label for="notation1">Notation :</label><input name="notation[]" type="text" class="form-control" id="notation1" value="{{ isset($prescription) ? $prescription->notation : ''}}" placeholder="{{ isset($prescription) ? $prescription->notation : ''}}"></div></div><div class="col-md-1"><div class="form-group"><label for="notation1">Clear</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
        //<input type="hidden" name="regiqstration_id" value="{{ $diagnoses->registration-> id}}">
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