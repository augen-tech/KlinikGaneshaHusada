@extends('Admin.layouts.app')

@section('dashboard')
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <div class="row p-t-20">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Id Patient</label>
                            <input type="text" id="firstName" class="form-control">
                            <small class="form-control-feedback">  </small> 
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div >
                            <label class="control-label">Name</label>
                            <input type="text" id="address" class="form-control">
                            <small class="form-control-feedback">  </small> 
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Type</label>
                        <div class="m-b-10">
                            <label class="custom-control custom-radio">
                                <input id="radio5" name="radio" type="radio" class="custom-control-input">
                                <span class="custom-control-label">General</span>
                            </label>
                            <label class="custom-control custom-radio">
                                <input id="radio6" name="radio" type="radio" class="custom-control-input">
                                <span class="custom-control-label">Obgyn</span>
                            </label>
                        </div>
                    </div>
                </div>
                    <!--/span-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">Complaint</label>
                                <textarea class="textarea_editor form-control" rows="15"></textarea>
                               
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
        </form>
    </div>
    </div>
    </div>
    </div>

    
@endsection