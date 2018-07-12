@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Daftar Obat</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Obat</a></li>
            <li class="breadcrumb-item active">Daftar Obat</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        {{--  <h4 class="card-title">Medicine List</h4>  --}}
        {{--  <h6 class="card-subtitle">Just click on word which you want to change and enter</h6>  --}}
        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>ID Obat</th>
                    <th>Nama</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                    
                </tr>
            </thead>
            
            <tbody>
                @foreach($medicines as $key => $row)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->type}}</td>
                        <td>{{$row->stock}}</td>
                        <td>{{$row->price}}</td>
                        <td class="text-nowrap">
                            <a href="{{ route('pharmacist.medicine.edit', $row->id) }}" data-toggle="tooltip" data-original-title="Ubah"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                            
                            <a href="#" onclick="$(this).find('#delete').submit();" data-toggle="tooltip" data-original-title="Hapus"> <i class="fa fa-close text-danger"></i>
                            <form action="{{ route('pharmacist.medicine.delete', $row->id) }}" id="delete" method="post">
                                {{ method_field('DELETE') }} {{--kalo tulis ini sama dengan kayak tulis yang diatas, jadi yang diatas gw comment aja --}}
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

@section('script')
    <!-- This is data table -->
    <script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>$('#example23').DataTable();</script>
@endsection