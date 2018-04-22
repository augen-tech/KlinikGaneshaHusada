@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Midwife</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Midwife</a></li>
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
                        @foreach($midwifes as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td style="vertical-align: middle">
                                <span data-toggle="tooltip" data-placement="top" title="Edit">
                                    <a href="{{ route('superAdmin.midwife.edit', $row->id) }}"><i class="ti-marker-alt text-inverse"></i></a>
                                </span>
                                <span data-toggle="tooltip" data-placement="top" title="Delete">
                                    <a href="javascript:void(0);" onclick="$(this).find('form').submit();">
                                        <i class="ti-trash text-inverse"></i>
                                        <form action="{{ route('superAdmin.midwife.destroy', $row->id) }}" method="POST">
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </a>
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