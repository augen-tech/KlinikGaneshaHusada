@extends('pharmacist.layouts.app')

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">{{ isset($medicine) ? 'Edit Medicine' : 'Add Medicine' }}</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Medicine</a></li>
       
        <li class="breadcrumb-item active">{{ isset($medicine) ? 'Edit Medicine' : 'Add Medicine' }}</li>
    </ol>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ isset($medicine) ? 'Edit Medicine' : 'Add Medicine' }}</h4>
            <form action="{{ isset($medicine) ? route('pharmacist.medicine.update', $medicine->id) : route('pharmacist.medicine.store') }}" method="POST">
                {{ isset($medicine) ? method_field('PUT') : '' }}
                <div class="form-group">
                    
                    <label>Medicine Name</label>
                    <input type="text" placeholder="medicine-name" name="name" class="form-control" value="{{isset($medicine) ? $medicine->name : '' }}">
                    
                </div>
                <div class="form-group">
                    
                    <label>Stock</label>
                    <input type="number" placeholder="your-medicine-stock" name="stock" class="form-control" value="{{isset($medicine) ? $medicine->stock : '' }}">
                    
                </div>
                <div class="form-group">
                    
                    <label>Price</label>
                    <input type="text" placeholder="your-price-stock" name="price" class="form-control" value="{{isset($medicine) ? $medicine->price : '' }}">
                    
                </div>
                <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">{{isset($medicine) ? 'Update' : 'Submit' }}</button>
            
            </form> 
        
    </div>
</div>
@endsection