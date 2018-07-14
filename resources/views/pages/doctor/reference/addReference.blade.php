@extends('layouts.app')

@section('styles')

@endsection

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Tambah Rujukan</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Tambah Rujukan</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width : 5%">ID</th>
                            <th>Tanggal</th>
                            <th style="width : 50%">Pasien</th>
                            <th style="width : 10%">Diagnosis</th>
                            <th style="width : 10%">Tindakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnoses as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->created_at }}</td>
                                <td>{{ $row->registration->patient->name }}</td>
                                <td>
                                    @if (isset($row->evidence))
                                        <a href="{{ Storage::url($row->evidence) }}"><span><i class="fa fa-download"></i></span></a>
                                
                                    
                                    @else
                                        <a href="#"><span><i class="fa fa-search"></i></span></a>
                                    @endif
                                </td>
                                <td><a href="{{ route('doctor.reference.send', $row->id)}}"><center><span><i class="fa fa-ambulance"></i></span></center></a></td>
                            </tr>                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable({
    "order": [[ 1, "asc" ]]
});</script>
@endsection