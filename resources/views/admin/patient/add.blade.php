@extends('Admin.layouts.app')

@section('dashboard')

@endsection

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">{{isset ($patient) ? "Edit Patient" : "Add Patient" }}</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{isset ($patient) ? "Edit Patient" : "Add Patient"}}</li>
    </ol>
</div>
@endsection



@section('content')

<form action="{{ isset ($patient) ? route('admin.patient.update',$patient->id) : route('admin.patient.store')}}">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                {{--  {{isset($patient) ? <h6>edit</h6> : <h6>create</h6>}}  --}}
                
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input name="name" type="text" id="firstName" class="form-control"  value="{{isset ($patient) ? $patient->name : ""  }}" placeholder={{isset ($patient) ? $patient->name : ""  }}>                            
                </div>

                <div class="form-group">
                    <label class="control-label">Date of Birth</label>
                    <input name="dob" type="date" class="form-control" value="{{isset ($patient) ? $patient->dob : ""  }}" >
                </div>

                <div class="form-group" >
                    <label class="control-label">Blood Type</label>
                        <div class="row p-t-12">
                            <div class="col-md-1">
                                <label class="custom-control custom-radio">
                                <input value="A" id="radio1" name="blood" type="radio" class="custom-control-input" >
                                <span class="custom-control-label">A</span>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label class="custom-control custom-radio ">
                                <input value="B" id="radio2" name="blood"  type="radio" class="custom-control-input" >
                                <span class="custom-control-label">B</span>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label class="custom-control custom-radio">
                                <input value="AB" id="radio3" name="blood" type="radio" class="custom-control-input" >
                                <span class="custom-control-label">AB</span>
                                </label>
                            </div>
                            <div class="col-md-1">
                                <label class="custom-control custom-radio ">
                                <input value="O" id="radio4" name="blood"  type="radio" class="custom-control-input" >
                                <span class="custom-control-label">O</span>
                                </label>
                            </div>
                         </div>

                    <!-- <select name="blood" class="form-control custom-select"    >                    
                        <option value = "A">A</option>
                        <option value = "B">B</option>
                        <option value = "AB">AB</option>
                        <option value = "O">O</option>
                    </select> -->
                </div>


                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" class="form-control" value="{{isset ($patient) ? $patient->address : ""  }}" placeholder={{isset ($patient) ? $patient->address : ""  }} >
                </div>

                <div class="form-group">
                    <label class="control-label">Phone Number</label>
                    <input name="phone" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->phone : ""  }}" placeholder={{isset ($patient) ? $patient->phone : ""  }}>                            
                </div>

                <div class="form-group">
                    <label class="control-label">Gender</label>
                    <div class="m-b-10">
                        <label class="custom-control custom-radio">
                            <input value="M" id="radio5" name="gender" type="radio" class="custom-control-input"  >
                            <span class="custom-control-label">Male</span>
                        </label>
                        <label class="custom-control custom-radio ">
                            <input value="F" id="radio6" name="gender"  type="radio" class="custom-control-input" >
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
