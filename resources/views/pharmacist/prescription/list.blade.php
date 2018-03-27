@extends('pharmacist.layouts.app')

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Prescription</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Prescription</a></li>
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
                        <th>ID</th>
                        
                        <th>Date</th>
                        <th>Patient</th>
                        <th>Total Price</th>
                        
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($prescriptions as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->diagnosis->created_at}}</td>
                            <td>{{$row->diagnosis->registration->patient->name}}</td>
                            <td>{{$row->total_price}}</td>
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