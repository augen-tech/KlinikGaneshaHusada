@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Daftar Registrasi</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Halaman Utama</a></li>
            <li class="breadcrumb-item active">Daftar Registrasi</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div style="height:500px; overflow-y: scroll;">
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                
                                <th>Id Diagnosa</th>
                                <th>Rumah Sakit</th>
                                <th>Alamat</th>
                                <th>Pesan</th>
                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($references as $row)
                                <tr>
                                    <td>{{$row->diagnosis_id}} </td>                                    
                                    <td>{{$row->hospital}}</td>
                                    <td>{{$row->address}} </td>
                                    <td>{{$row->message}} </td>
                                    
                                </tr>                            
                            @endforeach
                        </tbody>
                    </table>               
                </div>
            </div>                        
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection