@extends('Admin.layouts.app')

@section('dashboard')

@endsection

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Add Patient</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Add Patient</li>
    </ol>
</div>
@endsection

@section('content')

<form action="{{route('admin.patient.create')}}">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input type="text" id="firstName" class="form-control" placeholder="">                            
                </div>

                <div class="form-group">
                    <label class="control-label">Date of Birth</label>
                    <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                </div>

                <div class="form-group">
                    <label class="control-label">Category</label>
                    <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                        <option >A</option>
                        <option >B</option>
                        <option >AB</option>
                        <option >O</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input type="text" id="firstName" class="form-control" placeholder="">                            
                </div>

                <div class="form-group">
                    <label class="control-label">Gender</label>
                    <div class="m-b-10">
                        <label class="custom-control custom-radio">
                            <input id="radio5" name="radio" type="radio" class="custom-control-input">
                            <span class="custom-control-label">Male</span>
                        </label>
                        <label class="custom-control custom-radio">
                            <input id="radio6" name="radio" type="radio" class="custom-control-input">
                            <span class="custom-control-label">Female</span>
                        </label>
                    </div>
                </div>

                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-success">Submit</button>                    
                </div>                             
            </div>
        </div>
    </div>
</div>

</form>
    
@endsection

@section('scripts')
<script>
$('#id').on('change', function() {
    var selected = $(this).val();
    $("#name").val(selected);
})
</script>
<script src="{{ asset('material/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script>$('#myTable').DataTable();</script>
@endsection
