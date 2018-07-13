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
                    <table id="myTable" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:1%">Id</th>
                                <th style="width:10%">Nama</th>
                                <th style="width:10%">Nama Orang Tua</th>
                                <th style="width:8%">Pekerjaan Orang Tua</th>

                                <th style="width:11%">Tanggal Lahir</th>
                                <th style="width:20%">Address</th>
                                <th style="width:5%">Phone</th>
                                <th style="width:3%">Jenis Kelamin</th>

                                <th style="width:3%">Golongan Darah</th>
                                <th style="width:3%">Anak ke-</th>
                                <th style="width:3%">Berat Badan</th>
                                <th style="width:10%">Perawat</th>

                                <th style="width:4%">Metode Kelahiran</th>
                                <th style="width:3%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $row)
                                @if ($row->religion == "null")                            
                                    <tr>
                                        <td>{{$row->id}} </td>
                                        <td>{{$row->name}} </td>
                                        <td>{{$row->parent_name}} </td>
                                        <td>{{$row->parent_job}} </td>
                                        <td>{{$row->dob}}</td>
                                        <td>{{$row->address}} </td>
                                        <td>{{$row->phone}} </td>
                                        <td>{{$row->gender}} </td>
                                        <td>{{$row->blood_type}} </td>
                                        <td>{{$row->child_order}}</td>
                                        <td>{{$row->birth_weight}}</td>
                                        <td>{{$row->birth_attendant}}</td>
                                        <td>{{$row->labor_method}}</td>
                                        <td><a href="{{ route('admin.patient.editchild', $row->id)}}"><span><i class="fa fa-pencil"></span></a></i>
                                            <a href="{{ route('admin.patient.destroychild', $row->id)}}"><span><i class="mdi mdi-delete"></span></a></i></td>
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