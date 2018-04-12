@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Confirm Prescription</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Prescription</a></li>
            <li class="breadcrumb-item active">Confirm Prescription</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        
        {{--  <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>  --}}
        
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Date</th>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Status</th>
                    <th>Total Price</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            
            <tbody>
                @foreach($prescriptions as $key=> $row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->created_at}}</td>
                        <td>{{$row->diagnosis->registration->patient->name}}</td>
                        <td>{{$row->diagnosis->registration->doctor->name}}</td>
                        <td>
                            @if($row->status == 'no')
                                <span class="label label-warning">{{$row->status}}</span>
                            @elseif($row->status == 'yes')
                                <span class="label label-success">{{$row->status}}</span>
                            @endif
                        </td>
                        <td>Rp. {{$row->total_price}}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('pharmacist.prescription.accept', $row->id) }}" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check m-r-10"></i> </a>
                            {{-- <a href="#" data-toggle="tooltip" data-original-title="Update"><span><i class="fa fa-tasks text-inverse m-r-10"></i></span></a> --}}
                            <a href="#" onclick="$(this).find('#delete').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                            <form action="{{ route('pharmacist.prescription.delete', $row->id) }}" id="delete" method="post">
                                {{ method_field('DELETE') }} 
                            </form>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>            
    </div>
</div>


<!-- sample modal content -->
{{-- <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Prescription</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <h4>Prescription List</h4>
                <p>Data<span style="margin-left: 20%">total</span><span style="margin-left: 20%">Price</span></p>
                @foreach($medipresc as $key=> $row)
                    
                    <p>{{$row->medicine->name}}<span style="margin-left: 20%">{{$row->amount}}</span><span style="margin: 35%">{{$row->medicine->price * $row->amount}}</span></p>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
    
</div> --}}

@endsection

@section('script')
    <!-- This is data table -->
    <script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>$('#example23').DataTable();</script>
@endsection