@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Data Pasien</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Halaman Utama</a></li>
            <li class="breadcrumb-item active">Data Pasien</li>
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
                <table id="myTable" class="table table-bordered table-striped" width="200px" style="width:100%">
                    <thead>
                        <tr>
                            <th style="width:2%">Id</th>
                            <th style="width:13%">Nama</th>
                            <th style="width:10%">Tanggal Lahir</th>
                            <th style="width:5%">Agama</th>

                            <th style="width:5%">Jenis Kelamin</th>
                            <th style="width:6%">Pekerjaan</th>
                            <th style="width:5%">Riwayat Alergi</th>
                            <th style="width:5%">Riwayat Penyakit</th>

                            <th style="width:12%">Riwayat Penyakit Keluarga</th>
                            <th style="width:2%">Golongan Darah</th>

                            <th style="width:25%">Alamat</th>

                            <th style="width:6%">Nomer Telepon</th>
                            <th style="width:3%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $row)
                            @if ($row->child_order == 0 )
                                <tr>
                                    <td>{{$row->id}} </td>
                                    <td>{{$row->name}} </td>
                                    <td>{{$row->dob}} </td>
                                    <td>{{$row->religion}} </td>
                                    <td>{{$row->gender}}</td>
                                    <td>{{$row->job}} </td>
                                    <td>{{$row->allergy_history}} </td>
                                    <td>{{$row->disease_history}} </td>
                                    <td>{{$row->disease_history_family}} </td>
                                    <td>{{$row->blood_type}}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td><a href="{{ route('admin.patient.editadult', $row->id)}}"><span><i class="fa fa-pencil"></span></a></i>
                                        <a href="{{ route('admin.patient.destroyadult', $row->id)}}"><span><i class="mdi mdi-delete"></span></a></i></td>
                                </tr>  
                            @endif                          
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