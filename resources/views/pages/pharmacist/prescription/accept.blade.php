@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Tagihan Resep</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Resep</a></li>
            <li class="breadcrumb-item">Konfirmasi Resep</li>
            <li class="breadcrumb-item active">Tagihan Resep</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-body printableArea">
            <h3><b>Tagihan Resep</b> <span class="pull-right">#5669626</span></h3>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="pull-left">
                        <address>
                            <h3> &nbsp;<b class="text-danger">Klinik Ganesha Husada</b></h3>
                            {{-- <p class="text-muted m-l-5">E 104, Dharti-2,
                                <br/> Nr' Viswakarma Temple,
                                <br/> Talaja Road,
                                <br/> Bhavnagar - 364002</p> --}}
                        </address>
                    </div>
                    <div class="pull-right text-right">
                        <address>
                            <h3>Kepada,</h3>
                            <h4 class="font-bold">{{$prescription->diagnosis->registration->patient->name}},</h4>
                            <p class="text-muted m-l-30">
                                {{$prescription->diagnosis->registration->patient->address}}
                            </p>
                            <p class="m-t-30"><b>Terbuat :</b> <i class="fa fa-calendar"></i> {{$prescription->diagnosis->created_at}}</p>
                            <p><b>Jatuh Tempo :</b> <i class="fa fa-calendar"></i> {{$prescription->created_at}}</p>
                        </address>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="table-responsive m-t-40" style="clear: both;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Deskripsi</th>
                                    <th class="text-right">Jumlah</th>
                                    <th class="text-right">Keterangan</th>
                                    <th class="text-right">Harga</th>
                                    <th class="text-right">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">1</td>
                                    <td>Diagnosis</td>
                                    <td class="text-right"></td>
                                    <td class="text-right"> {{$prescription->diagnosis->result}} </td>
                                    <td class="text-right"> Rp. 50000 </td>
                                    <td class="text-right"> Rp. 50000 </td>
                                </tr>
                                @if($prescription->diagnosis->special_request != null)
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>Permintaan Khusus</td>
                                        <td class="text-right"></td>
                                        <td class="text-right">{{$prescription->diagnosis->special_request}}</td>
                                        <td class="text-right">Rp. 50000</td>
                                        <td class="text-right">Rp. 50000</td>
                                    </tr>
                                @endif
                                @foreach($medipres as $key => $row)
                                    <tr>
                                        @if($prescription->diagnosis->special_request != null)
                                            <td class="text-center">{{$key+3}}</td>
                                        @else
                                            <td class="text-center">{{$key+2}}</td>
                                        @endif
                                        <td>
                                            Obat: {{$row->medicine->name}}
                                            @if($row->medicine->type == 'racik')
                                                (racik)
                                            @elseif($row->medicine->type == 'pil')
                                                (pil)
                                            @endif
                                        </td>
                                        <td class="text-right">{{$row->amount}}</td>
                                        <td class="text-right">{{$row->notation}}</td>
                                        <td class="text-right">Rp. {{$row->medicine->price}}</td>
                                        <td class="text-right">Rp. {{$row->medicine->price * $row->amount}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="pull-right m-t-30 text-right">
                        <p>Sub - Total Jumlah: {{$subtotal}}</p>
                        <p>Pajak (10%) : {{$tax}}</p>
                        <hr>
                        <h3><b>Total :</b> {{$prescription->total_price}}</h3>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    @if($prescription->status == 'no')
                        <div class="text-right">
                            <a href="{{ route('pharmacist.prescription.store', $prescription->id) }}"><button class="btn btn-danger" type="button"> Melakukan Pembayaran </button></a>
                            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                        </div>    
                    @elseif($prescription->status == 'yes')
                        <div class="text-right">
                            <p style="float: left; color: green; font-weight: bold">
                                Prescription was created! <i class="fa fa-check m-r-10"></i>
                            </p>
                            <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Accept Form</h4>
                <h6 class="card-subtitle">{{$prescription->created_at}}</h6>
                
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
</div>     --}}
@endsection

@section('script')
<script src="{{ asset('material/js/jquery.PrintArea.js')}}" type="text/JavaScript"></script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
</script>
<!-- ============================================================== -->
<!-- Style switcher -->
<!-- ============================================================== -->
{{-- <script src="../assets/plugins/styleswitcher/jQuery.style.switcher.js"></script> --}}
@endsection