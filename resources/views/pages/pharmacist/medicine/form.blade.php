@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($medicine) ? 'Ubah Obat' : 'Tambah Obat' }}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Obat</a></li>
        
            <li class="breadcrumb-item active">{{ isset($medicine) ? 'Ubah Obat' : 'Tambah Obat' }}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ isset($medicine) ? 'Ubah Obat' : 'Tambah Obat' }}</h4>
            <form action="{{ isset($medicine) ? route('pharmacist.medicine.update', $medicine->id) : route('pharmacist.medicine.store') }}" method="POST">
                {{ isset($medicine) ? method_field('PUT') : '' }}
                {{ csrf_field() }}
                <div class="form-group">
                    
                    <label>Nama Obat</label>
                    <input type="text" placeholder="nama-obat" name="name" class="form-control" value="{{isset($medicine) ? $medicine->name : '' }}">
                    
                </div>

                <div class="form-group">
                    <label>Jenis Obat</label>
                    <select class="form-control" name="type">
                        <option value="Racik">Racik</option>
                        <option value="Pil" selected>Pil</option>
                    </select>
                </div>

                <div class="form-group">
                    
                    <label>Stok</label>
                    <input type="number" placeholder="jumlah-stok-obat" name="stock" class="form-control" value="{{isset($medicine) ? $medicine->stock : '' }}">
                    
                </div>
                <div class="form-group">
                    
                    <label>Harga</label>
                    <input type="number" placeholder="harga-obat" name="price" class="form-control" value="{{isset($medicine) ? $medicine->price : '' }}">
                    
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{isset($medicine) ? 'Ubah' : 'Submit' }}</button>
            
            </form> 
        
    </div>
</div>
@endsection