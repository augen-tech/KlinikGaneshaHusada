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
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Nama Orang Tua</th>
                            <th>Peketjaan Orang Tua</th>
                            <th>Tanggal Lahir</th>
                            <!-- <th>Address</th>
                            <th>Phone</th> -->
                            <th>Jenis Kelamin</th>
                            <th>Golongan Darah</th>
                            <th>Anak ke-</th>
                            <th>Berat Badan</th>
                            <th>Perawat</th>
                            <th>Metode Kelahiran</th>
                            <th>Aksi</th>
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
                                    <!-- <td>{{$row->address}} </td>
                                    <td>{{$row->phone}} </td> -->
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
@endsection

@section('script')
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection