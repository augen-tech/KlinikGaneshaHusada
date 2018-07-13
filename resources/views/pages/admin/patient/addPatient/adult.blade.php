@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{isset ($patient) ? "Ubah Data Pasien" : "Pasien Dewasa" }}</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Halaman Utama</a></li>
            <li class="breadcrumb-item active">{{isset ($patient) ? "Ubah Data Pasien" : "Pasien Dewasa"}}</li>
        </ol>
    </div>
</div>
@endsection



@section('content')

<form action="{{ isset ($patient) ? route('admin.patient.update',$patient->id) : route('admin.patient.store')}}" method="POST">
    <div class="row">
        <div class="col-12">
            <div class="card">
                
                
                <div class="card-body">                
                    
                    <div class="form-group">
                        <label class="control-label">Nama</label>
                        <input name="name" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->name : ""  }}" placeholder={{isset ($patient) ? $patient->name : ""  }}>  
                                                  
                    </div>

                    <div class="form-group">
                        <label class="control-label">Tanggal Lahir</label>
                        <input name="dob" type="date" class="form-control" value="{{isset ($patient) ? $patient->dob : ""  }}" placeholder={{isset ($patient) ? $patient->dob : ""  }}  >
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="address" type="text" class="form-control" value="{{isset ($patient) ? $patient->address : ""  }}" placeholder={{isset ($patient) ? $patient->address : ""  }}>
                    </div>

                    <div class="form-group" >
                        <label class="control-label">Golongan Darah</label>
                            <div class="row p-t-12">
                                <div class="col-md-1">
                                    <label class="custom-control custom-radio">
                                    <input value="A" id="radio1" name="blood" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">A</span>
                                    </label>
                                </div>
                                <div class="col-md-1">
                                    <label class="custom-control custom-radio ">
                                    <input value="B" id="radio2" name="blood" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">B</span>
                                    </label>
                                </div>
                                <div class="col-md-1">
                                    <label class="custom-control custom-radio">
                                    <input value="AB" id="radio3" name="blood" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">AB</span>
                                    </label>
                                </div>
                                <div class="col-md-1">
                                    <label class="custom-control custom-radio ">
                                    <input value="O" id="radio4" name="blood" type="radio" class="custom-control-input" >
                                    <span class="custom-control-label">O</span>
                                    </label>
                                </div>
                            </div>

                        
                    </div>

                    <div class="form-group">
                        <label class="control-label">Nomer Telepon</label>
                        <input name="phone" type="number" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->phone : ""  }}" placeholder={{isset ($patient) ? $patient->phone : ""  }}>                            
                    </div>
                        
                    <div class="form-group">
                        <label class="control-label">Jenis Kelamin</label>
                        <div class="m-b-10">
                            <label class="custom-control custom-radio">
                                <input value="M" id="radio5" name="gender" type="radio" class="custom-control-input">
                                <span class="custom-control-label">Male</span>
                            </label>
                            <label class="custom-control custom-radio ">
                                <input value="F" id="radio6" name="gender" type="radio" class="custom-control-input">
                                <span class="custom-control-label">Female</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="control-label">Agama</label>
                        <input name="religion" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->religion : ""  }}" placeholder={{isset ($patient) ? $patient->religion : ""  }}>                            
                    </div>
                
                    
                    <div class="form-group">
                        <label class="control-label">Pekerjaan</label>
                        <input name="job" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->job : ""  }}" placeholder={{isset ($patient) ? $patient->job : ""  }}>                            
                    </div>
                        
                    
                    <div class="form-group">
                        <label class="control-label">Riwayat Alergi</label>
                        <input name="aHistory" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->allergy_history : ""  }}" placeholder={{isset ($patient) ? $patient->allergy_history : ""  }}>                            
                    </div>

                    <div class="form-group">
                        <label class="control-label">Riwayat Penyakit</label>
                        <input name="dHistory" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->disease_history : ""  }}" placeholder={{isset ($patient) ? $patient->disease_history : ""  }}>                         
                    </div>

                    <div class="form-group">
                        <label class="control-label">Riwayat Penyakit Keluarga</label>
                        <input name="dHistoryF" type="text" id="firstName" class="form-control" value="{{isset ($patient) ? $patient->disease_history_family : ""  }}" placeholder={{isset ($patient) ? $patient->disease_history_family : ""  }}>                           
                    </div>

                    <div class="col-md-offset-3 col-md-9">
                        <input type="hidden" value="null" name="parent_name">
                        <input type="hidden" value="null" name="parent_job">
                        <input type="hidden" value="0" name="child_order">
                        <input type="hidden" value="0" name="birth_weight">
                        <input type="hidden" value="null" name="birth_attendant">
                        <input type="hidden" value="null" name="labor_method">
                        <button type="submit" class="btn btn-success">Simpan</button>                    
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
