@extends('pharmacist.layouts.app')

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Prescription List</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Prescription</a></li>
            <li class="breadcrumb-item active">Prescription List</li>
        </ol>
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
                        <th>ID</th>
                        <th>Date</th>
                        <th>Patient</th>
                        <th>Recipe</th>
                        <th>Total Price</th>
                        <th>Action</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($prescriptions as $key=> $row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->id}}</td>
                            <td>{{$row->diagnosis->created_at}}</td>
                            <td>{{$row->diagnosis->registration->patient->name}}</td>
                            <td>{{$row->diagnosis->special_request}}</td>
                            <td>{{$row->total_price}}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('pharmacist.medicine.edit', $row->id) }}" data-toggle="tooltip" data-original-title="Accept"> <i class="fa fa-check m-r-10"></i> </a>
                                
                                <a href="#" onclick="$(this).find('#delete').submit();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i>
                                <form action="{{ route('pharmacist.prescription.delete', $row->id) }}" id="delete" method="post">
                                    {{ method_field('DELETE') }} {{-- kalo tulis ini sama dengan kayak tulis yang diatas, jadi yang diatas gw comment aja --}}
                                </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
@endsection

@section('scripts')
    <!-- This is data table -->
    <script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>$('#example23').DataTable();</script>
@endsection