@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($diagnosis) ? 'Edit Diagnosis': 'Tambah Diagnosis'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($diagnosis) ? 'Edit Diagnosis':'Tambah Diagnosis'}}</li>
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
                        <h3 class="card-title">Informasi Pasien</h3>
                        <hr>
                        <div class="row p-t-20">
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
                                    <a href="{{ route('doctor.patient.detail', $registration->patient->id)}}"><span><i class="fa fa-info-circle">Detil</i></span></a>
                                </div>
                            </div>
                        </div>
                        <h3 class="box-title m-t-40">Unggah Diagnosis</h3>
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">File Diagnosis</h4>
                                    <input type="file" id="file" name="file" class="dropify" required/>
                                </div>
                            </div>
                        </div>
                        <h3 class="box-title m-t-40">Permintaan Khusus</h3>
                        <hr>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{-- <label class="control-label">Special Request</label> --}}
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
                        <hr>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                        <h4 class="card-title">Pesan Permintaan Khusus</h4>
                                        <textarea rows="6" name="field_sr" class="form-control" placeholder="{{ isset($diagnosis) ? $diagnosis->field_sr : ''}}"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <hr>

                        <h3 class="box-title m-t-40">Input Resep</h3>
                        <hr>
                            <div id="dynamic_field">
                                @if(isset($medicine_prescriptions))
                                @foreach($medicine_prescriptions as $key => $row_mp)
                                    <div class="row" id="{{ 'row' . $key}}">
                                        <div class="col-md-6">
                                            <label for="intType1">Obat</label>
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
                                                <label class="control-label">Jumlah</label>
                                                <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" value="{{ isset($medicine_prescriptions) ? $row_mp->amount : ''}}" placeholder="{{ isset($medicine_prescription) ? $row_mp->amount : ''}}" name="amount[]"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                                                <label for="notation1">Aturan :</label>
                                                <input name="notation[]" type="text" class="form-control" id="notation1" value="{{ isset($medicine_prescriptions) ? $row_mp->notation : ''}}" placeholder="{{ isset($medicine_prescriptions) ? $row_mp->notation : ''}}"></div>
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
                                            <label class="control-label">Jumlah</label>
                                            <input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" name="amount[]"></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="registration_id" value="{{ $registration-> id}}">
                                            <label for="notation1">Aturan :</label>
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
                        
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="from-group">
                                        <div class="card-body">
                                            <h4 class="card-title">Harga</h4>
                                            <input type="number" class="form-control" name="price" placeholder="{{ isset($diagnosis) ? $diagnosis->price : ''}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" value="upload"><i class="fa fa-check"></i>Ajukan</button>
                            <button type="button" class="btn btn-inverse">Batalkan</button>
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
        $('#dynamic_field').append('<div class="row" id="row'+i+'"><div class="col-md-6"><div class="form-group"><label for="intType1">Obat</label><select class="select2" style="width: 100%" name="medicine[]">@foreach($medicines as $row)<option value="{{$row->id}}">{{$row->name}}</option>@endforeach</select></div></div><div class="col-md-1"><div class="form-group"><label class="control-label">Jumlah</label><input class="vertical-spin" type="text" data-bts-button-down-class="btn btn-secondary btn-outline" data-bts-button-up-class="btn btn-secondary btn-outline" name="amount[]"></div></div><div class="col-md-4"><div class="form-group"><input type="hidden" name="registration_id" value="{{ $registration-> id}}"><label for="notation1">Aturan :</label><input name="notation[]" type="text" class="form-control" id="notation1" value="{{ isset($prescription) ? $prescription->notation : ''}}" placeholder="{{ isset($prescription) ? $prescription->notation : ''}}"></div></div><div class="col-md-1"><div class="form-group"><label for="notation1">Clear</label><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></div></div></div>');
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
<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 


  
@endsection