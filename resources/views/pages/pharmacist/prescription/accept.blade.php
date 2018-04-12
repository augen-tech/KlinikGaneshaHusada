@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Accept Prescription</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Prescription</a></li>
            <li class="breadcrumb-item">Confirm Prescription</li>
            <li class="breadcrumb-item active">Accept Prescription</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Accept Form</h4>
                <h6 class="card-subtitle">{{$prescription->created_at}}</h6>
                {{-- <div class="form-group">
                    <label>Patient Name</label>
                    <input type="text" placeholder="" data-mask="(999) 999-9999" class="form-control">
                </div> --}}
                <p><span style="margin-right: 50px; font-weight: bold">Name:</span>{{$prescription->diagnosis->registration->patient->name}}</p>
                <p><span style="margin-right: 50px; font-weight: bold">Diagnosis date:</span>{{$prescription->diagnosis->created_at}}</p>
                <p><span style="font-weight: bold">Receipt:</span></p>
                <table id="smptable" class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Information</th>
                            <th>Amount</th>
                            <th>Notation</th>
                            <th>Price@</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Diagnosis</td>
                            <td></td>
                            <td>{{$prescription->diagnosis->result}}</td>
                            <td>Rp. 50000</td>
                            <td>Rp. 50000</td>
                        </tr>
                        @if($prescription->diagnosis->special_request != null)
                            <tr>
                                <td>2</td>
                                <td>Special Request</td>
                                <td></td>
                                <td>{{$prescription->diagnosis->special_request}}</td>
                                <td>Rp. 50000</td>
                                <td>Rp. 50000</td>
                            </tr>
                        @endif
                        @foreach($medipres as $key => $row)
                            <tr>
                                @if($prescription->diagnosis->special_request != null)
                                    <td>{{$key+3}}</td>
                                @else
                                    <td>{{$key+2}}</td>
                                @endif
                                <td>Medicine: {{$row->medicine->name}}</td>
                                <td>{{$row->amount}}</td>
                                <td>{{$row->notation}}</td>
                                <td>Rp. {{$row->medicine->price}}</td>
                                <td>Rp. {{$row->medicine->price * $row->amount}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <p style="float: right; font-weight: bold; margin-top: 30px">Total:
                    @if($prescription->diagnosis->special_request != null)
                        <span style="margin-right: 5px">Rp. {{$prescription->total_price + 100000}}</span>
                    @else
                        <span style="margin-right: 5px">Rp. {{$prescription->total_price + 50000}}</span>
                    @endif
                </p>
                <div style="clear: both"></div>
                
                @if($prescription->status == 'no')
                    <div style="float: right">
                        <a href="{{ route('pharmacist.prescription.store', $prescription->id) }}"><button type="button" class="btn btn-success waves-effect waves-light m-r-10">Submit</button></a>
                        <a href="{{ route('pharmacist.prescription.confirm') }}"><button type="button" class="btn btn-info waves-effect" data-dismiss="row">Close</button></a>
                    </div>
                @elseif($prescription->status == 'yes')
                    <p style="float: right; position: relative; right: -6px; color: green; font-weight: bold">
                        Prescription was created! <i class="fa fa-check m-r-10"></i>
                    </p>
                    <div style="clear: both"></div>
                    <div style="float: right">
                        <a href="{{ route('pharmacist.prescription.confirm') }}"><button type="button" class="btn btn-info waves-effect" data-dismiss="row">Close</button></a>
                    </div>
                @endif     
            </div>
        </div>
    </div>
</div>    
@endsection