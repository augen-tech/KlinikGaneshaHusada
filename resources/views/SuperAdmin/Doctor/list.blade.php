@extends('SuperAdmin.layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Doctor</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
            <li class="breadcrumb-item active">List</li>
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
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td style="vertical-align: middle">
                                <span data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a href="#"><i class="ti-marker-alt text-inverse"></i></a>
                                </span>
                                <span data-toggle="tooltip" data-placement="top" title="Delete">
                                    <a href="#"><i class="ti-trash text-inverse"></i></a>
                                </span>
                            </td>
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
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script>
$('#myTable').DataTable();
</script>
@endsection