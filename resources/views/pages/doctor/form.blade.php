@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Lab</a></li>
            <li class="breadcrumb-item active">Result Lab</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">        
        <div class="card">            
                <div class="card-body ">
                    {{-- <h4 class="card-title">{{ !isset($resultLab) ? "Form Result Lab for Diagnosis Id: " . $diagnosis->id  : "Edit Result Lab for Id: " . $resultLab->id  }}</h4> --}}                    
                    <form class="form-horizontal m-t-40" action="{{ isset($resultLab) ? route('healthAnalyst.resultLab.update', $resultLab->id) : route('healthAnalyst.resultLab.store')}}" method="POST">                                                 
                        <div class="form-body">                            
                            
                            <h3 class="card-title">Patient Info</h3>
                            <hr>
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="idPatient1">Id Patient :</label>
                                    <input type="text" class="form-control" disabled id="idPatient1" value="{{ isset($resultLab) ? str_pad($resultLab->diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT) : str_pad($diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Phone Number :</label>
                                        <input type="tel" class="form-control" disabled id="phoneNumber1" value="{{ isset($resultLab) ? str_pad($resultLab->diagnosis->registration->patient->phone,6,"0",STR_PAD_LEFT) : str_pad($diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name1">Patient Name :</label>
                                    <input type="text" class="form-control" disabled id="name1" value="{{ isset($resultLab) ? str_pad($resultLab->diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT) : str_pad($diagnosis->registration->patient->name,6,"0",STR_PAD_LEFT)}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date1">Date of Birth :</label>
                                        <input type="date" class="form-control" id="date1" disabled value="{{ isset($resultLab) ? str_pad($resultLab->diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT) : str_pad($diagnosis->registration->patient->dob,6,"0",STR_PAD_LEFT)}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address1"> Address :</label>
                                        <input type="text" class="form-control" disabled id="address1" value="{{ isset($resultLab) ? str_pad($resultLab->diagnosis->registration->patient->id,6,"0",STR_PAD_LEFT) : str_pad($diagnosis->registration->patient->address,6,"0",STR_PAD_LEFT)}}">
                                    </div>
                                </div>
                                <br>                                
                            </div>

                            <h3 class="box-title m-t-40">Diagnosis</h3>
                            <hr>
                            @if(isset($resultLab) ? $resultLab->diagnosis->subject != null : $diagnosis->subject != null )
                                <div class="col-md-12">
                                    {{-- <div class="card"> --}}
                                        {{-- <div class="card-body"> --}}                                        
                                            <h4 class="card-title">Subject</h4>
                                            <textarea disabled name="subject" rows="6" class="form-control">{{isset($resultLab) ? $resultLab->diagnosis->subject : $diagnosis->subject}}</textarea>
                                        {{-- </div> --}}
                                        {{-- <div class="card-body"> --}}
                                            <h4 class="card-title">Object</h4>
                                            <textarea disabled name="object" rows="6" class="form-control">{{isset($resultLab) ? $resultLab->diagnosis->object : $diagnosis->object}}</textarea>
                                        {{-- </div> --}}
                                        {{-- <div class="card-body"> --}}
                                            <h4 class="card-title">Assesment</h4>
                                            <textarea disabled name="assesment" rows="6" class="form-control">{{isset($resultLab) ? $resultLab->diagnosis->assesment : $diagnosis->assesment}}</textarea>
                                        {{-- </div> --}}
                                        {{-- <div class="card-body"> --}}
                                            <h4 class="card-title">Planning</h4>
                                            <textarea disabled name="planning" rows="6" class="form-control">{{isset($resultLab) ? $resultLab->diagnosis->planning : $diagnosis->planning}}</textarea>
                                        {{-- </div> --}}
                                    {{-- </div> --}}
                                </div> 
                            @else
                                <div class="col-md-12">
                                    <a href="{{ Storage::url(isset($resultLab) ? $resultLab->diagnosis->evidence: $diagnosis->evidence) }}" target="_blank">
                                        <span><i class="fa fa-download" ></i></span>
                                    </a>
                                </div> 
                            @endif 
                            
                            <h3 class="box-title m-t-40"> Result Lab</h3>
                            <hr>
                            <div class="col-md-12">     

                                    
                                {{-- <div class="card-body"> --}}
                                    <h4 class="card-title">Result</h4>
                                    <textarea name="result" rows="6" disabled class="form-control" placeholder="{{$resultLab->result}}" required>{{ $resultLab->result }}</textarea>
                                {{-- </div> --}}

                                {{-- <div class="card-body"> --}}
                                    <h4 class="card-title">Price</h4>
                                    <input type="number" class="form-control" disabled name="price" placeholder="{{ $resultLab->price }}" value="{{ $resultLab->price }}" required>
                                {{-- </div> --}}
                                                                    
                                                                                                 
                            </div> 

                            

                        </div>
                        
                    </form>
                </div>  
             
        </div>
    </div>
</div>
@endsection


