@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{ asset('material/plugins/dropify/dist/css/dropify.min.css')}}">
<link href="{{ asset('material/plugins/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('material/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@endsection
@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($reference) ? 'Edit Rujukan': 'Tambah Rujukan'}}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">{{ isset($reference) ? 'Edit Rujukan':'Tambah Rujukan'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline-info">
            <div class="card-body">
                <form action="{{ isset($reference) ? route('doctor.reference.update', $reference-> id) : route('doctor.reference.store')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="diagnosis_id" value="{{ $diagnosis-> id}}">
                    <div class="form-body">
                        <h3 class="card-title">Informasi Pasien</h3>
                        <hr>
                        <div class="row p-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="idPatient1">Id Pasien :</label>
                                <input type="text" class="form-control" disabled id="idPatient1" value="{{$diagnosis->registration->patient->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phoneNumber1">Nomor Telepon :</label>
                                    <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{$diagnosis->registration->patient->phone}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name1">Nama Pasien :</label>
                                <input type="text" class="form-control" disabled id="name1" value="{{$diagnosis->registration->patient->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="date1">Tanggal Lahir :</label>
                                    <input type="date" class="form-control" id="date1" disabled value="{{$diagnosis->registration->patient->dob}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address1"> Alamat :</label>
                                    <input type="text" class="form-control" disabled id="address1" value="{{$diagnosis->registration->patient->address}}">
                                </div>
                            </div>
                            <br>
                        </div>
                        
                        <h3 class="box-title m-t-40">Kirim Rujukan</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rumah Sakit Tujuan</label>
                                    <textarea name="hospital" rows="6" class="form-control" placeholder="{{ isset($reference) ? $reference->hospital : ''}}" ></textarea>
                                    <label>Alamat</label>
                                    <textarea name="address" rows="6" class="form-control" placeholder="{{ isset($reference) ? $reference->address : ''}}" ></textarea>
                                    <label>Pesan</label>
                                    <textarea name="message" rows="6" class="form-control" placeholder="{{ isset($reference) ? $reference->message : ''}}" ></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
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

<script src="{{ asset('material/plugins/dropify/dist/js/dropify.min.js')}}"></script>
<script>
$( document ).ready(function() {
    $('.dropify').dropify();
});

</script> 


  
@endsection