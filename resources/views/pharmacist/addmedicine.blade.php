@extends('pharmacist.layouts.app')

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Add Medicine</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Medicine</a></li>
        <li class="breadcrumb-item active">Add Medicine</li>
    </ol>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Add Medicine</h4>
        {{--  <h6 class="card-subtitle">Use the button classes on an <code>data-mask</code> to the input element.</h6>  --}}
        <form action="{{route('pharmacist.storemedicine')}}" method="POST">
            <div class="form-group">
                <label>Medicine Name</label>
                <input type="text" placeholder="medicine-name" name="name" class="form-control">
                {{--  <span class="font-13 text-muted">(999) 999-9999</span>   --}}
            </div>
            <div class="form-group">
                <label>Stock</label>
                <input type="number" placeholder="your-medicine-stock" name="stock" class="form-control">
                {{--  <span class="font-13 text-muted">dd/mm/yyyy</span>   --}}
            </div>
            <div class="form-group">
                <label>Price</label>
                <input type="text" placeholder="your-price-stock" name="price" class="form-control">
                {{--  <span class="font-13 text-muted">e.g "999-99-9999"</span>   --}}
            </div>
            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>
            {{--  <div class="form-group">
                <label>Phone field + ext.</label>
                <input type="text" placeholder="" data-mask="+40 999 999 999" class="form-control">
                <span class="font-13 text-muted">+40 999 999 999</span> </div>
            <div class="form-group">
                <label>Product Key</label>
                <input type="text" placeholder="" data-mask="a*-999-a999" class="form-control">
                <span class="font-13 text-muted">e.g a*-999-a999</span> </div>  --}}
        </form>
        {{--  <form action="#">
            <div class="form-group">
                <label>Currency</label>
                <input type="text" placeholder="" data-mask="$ 999,999,999.99" class="form-control">
                <span class="font-13 text-muted">$ 999,999,999.99</span> </div>
            <div class="form-group">
                <label>Date 2</label>
                <input type="text" placeholder="" data-mask="99-99-9999" class="form-control">
                <span class="font-13 text-muted">dd-mm-yyyy</span> </div>
            <div class="form-group">
                <label>Eye Script</label>
                <input type="text" placeholder="" data-mask="~9.99 ~9.99 999" class="form-control">
                <span class="font-13 text-muted">~9.99 ~9.99 999</span> </div>
            <div class="form-group">
                <label>Percent</label>
                <input type="text" placeholder="" data-mask="99%" class="form-control">
                <span class="font-13 text-muted">e.g "99%"</span> </div>
            <div class="form-group m-b-0">
                <label>Pc Ip</label>
                <input type="text" placeholder="" data-mask="999.999.999.9999" class="form-control">
                <span class="font-13 text-muted">e.g "999.999.999.9999"</span> </div>
        </form>  --}}
    </div>
</div>
@endsection