@extends('layouts.app')

@section('dashboard')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">List Medicine</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Medicine</a></li>
        <li class="breadcrumb-item active">List Medicine</li>
    </ol>
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
                    <th>Medicine ID</th>
                    <th>Name</th>
                    <th>Stock</th>
                    <th>Price</th>
                    
                </tr>
            </thead>
            
            <tbody>
                @foreach($medicines as $row)
                    <tr>
                        <td>{{$row->id}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->stock}}</td>
                        <td>{{$row->price}}</td>
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>
@endsection

@section('scripts')
    <!-- This is data table -->
    <script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script>$('#example23').DataTable();</script>
@endsection