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
                
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Daftar</th>
                            <th>Nama Pasien</th>
                            <th>Pic</th>
                            <th>Tipe Perawatan</th>
                            <th>Tekanan DArah</th>
                            <th>Berat Badan</th>
                            <th>Tinggi Badan</th>
                            <th>Keluhan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($registrations as $row)
                            <tr>
                                <td>{{$row->id}} </td>
                                <td>{{$row->created_at}}</td>
                                <td>
                                    <div> {{$row->id=str_pad($row->id, 6, '0', STR_PAD_LEFT)}} </div>
                                    <div> {{$row->patient->name}} </div>
                                </td>
                                <td>{{$row->doctor->name}} </td>
                                <td>{{ $row->type == 1 ? 'OBGYN' : 'GENERAL'}}</td>
                                <td>{{$row->blood_pressure}} </td>
                                <td>{{$row->weight}} </td>
                                <td>{{$row->high}} </td>
                                <td>{{$row->complaint}} </td>
                                <td><a href="{{ route('admin.registration.edit', $row->id)}}"><span><i class="fa fa-pencil"></span></a></i>
                                    <a href="{{ route('admin.registration.destroy', $row->id)}}"><span><i class="mdi mdi-delete"></span></a></i></td>
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
<script>$('#myTable').DataTable();</script>
@endsection