@extends('pharmacist.layouts.app')

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Edit Medicine</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Medicine</a></li>
            <li class="breadcrumb-item active">Medicine List</li>
            <li class="breadcrumb-item active">Edit Medicine</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Edit Medicine</h4>
        {{--  <h6 class="card-subtitle">Use the button classes on an <code>data-mask</code> to the input element.</h6>  --}}
        <form action="{{route('pharmacist.updatemedicine', $medicine->id)}}" method="POST">
            <div class="form-group">
                <label>Madicine Name</label>
            <input type="text" value="{{ $medicine->name}}" placeholder="your-medicine-name" name="name" class="form-control">
                {{--  <span class="font-13 text-muted">dd/mm/yyyy</span>   --}}
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" value="{{ $medicine->stock}}" placeholder="your-medicine-stock" name="stock" class="form-control">
                {{--  <span class="font-13 text-muted">dd/mm/yyyy</span>   --}}
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" value="{{ $medicine->price}}" placeholder="your-price-stock" name="price" class="form-control">
                {{--  <span class="font-13 text-muted">e.g "999-99-9999"</span>   --}}
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
            
        </form>
        
    </div>
</div>

@endsection