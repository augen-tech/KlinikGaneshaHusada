@extends('Admin.layouts.app')

@section('dashboard')

@endsection

@section('breadcumb')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">{{isset ($registration) ? "Edit Registration" : "Add Registration" }}</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">{{isset ($registration) ? "Edit Registration" : "Add Registration" }}</li>
    </ol>
</div>
@endsection

@section('content')

<form action="{{isset ($registration) ? route('admin.registration.update', $registration->id) : route('admin.registration.store')}}">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="row p-t-12">
                        <div class="col-md-6">
                                <div class="form-group">
                                        {{--  {{isset ($registration) && $row->id=$registration->patient_id ? $registration->patient_id  : $row->id}}  --}}
                                    <label class="control-label">Id Patient</label>
                                    <select id="id" class="form-control custom-select" name="patient_id">
                                    @foreach($patients as $row)
                                        <option value="{{$row->id}}">{{$row->id}}</option>                           
                                    @endforeach
                                    </select>
                                </div>
                    </div>
                    <!--/span-->

                    <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <div class="m-b-10">
                                    <label class="custom-control custom-radio">
                                        <input id="radio5" value= "0" name="type" type="radio" class="custom-control-input">
                                        <span class="custom-control-label">General</span>
                                    </label>
                                    <label class="custom-control custom-radio">
                                        <input id="radio6" value= "1" name="type" type="radio" class="custom-control-input">
                                        <span class="custom-control-label">Obgyn</span>
                                    </label>
                                </div>
                            </div>
                        </div>                    
                    <!--/span-->
                </div>

                
                <!--/row-->
                <div class="row p-t-12">
                        <div class="col-md-6">
                        <div >
                            <label class="control-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{isset ($registration) ? $registration->patient->name : ""  }}" placeholder={{isset ($registration) ? $registration->patient->name : ""  }}>
                            <small class="form-control-feedback">  </small> 
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div >
                                <label class="control-label">Blood Pressure</label>
                                <input type="text" id="address" class="form-control" name="blood_pressure" value="{{isset ($registration) ? $registration->blood_pressure : ""  }}" >
                                <small class="form-control-feedback">  </small> 
                            </div>
                        </div>

                </div>
                    <!--/span-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Complaint</label>
                                <textarea class="textarea_editor form-control" rows="15"  name="complaint" value="{{isset ($registration) ? $registration->complaint : ""  }}" placeholder={{isset ($registration) ? $registration->complaint : ""  }} ></textarea>
                               
                            </div>
                        </div>
                    <!--/span-->
                    </div>
                <!--/row-->
                
                <!--/row-->
                
            <div class="form-actions">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn btn-inverse">Cancel</button>
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
