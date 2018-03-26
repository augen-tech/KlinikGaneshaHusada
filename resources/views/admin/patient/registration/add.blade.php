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
                            <label class="control-label">First Name</label>
                            <input type="text" id="firstName" class="form-control" placeholder="John doe">
                            <small class="form-control-feedback"> This is inline help </small> </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group has-danger">
                            <label class="control-label">Last Name</label>
                            <input type="text" id="lastName" class="form-control form-control-danger" placeholder="12n">
                            <small class="form-control-feedback"> This field has error. </small> </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group has-success">
                            <label class="control-label">Gender</label>
                            <select class="form-control custom-select">
                                <option value="">Male</option>
                                <option value="">Female</option>
                            </select>
                            <small class="form-control-feedback"> Select your gender </small> </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Date of Birth</label>
                            <input type="date" class="form-control" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Category</label>
                            <select class="form-control custom-select" data-placeholder="Choose a Category" tabindex="1">
                                <option value="Category 1">Category 1</option>
                                <option value="Category 2">Category 2</option>
                                <option value="Category 3">Category 5</option>
                                <option value="Category 4">Category 4</option>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Membership</label>
                            <div class="m-b-10">
                                <label class="custom-control custom-radio">
                                    <input id="radio5" name="radio" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">Free</span>
                                </label>
                                <label class="custom-control custom-radio">
                                    <input id="radio6" name="radio" type="radio" class="custom-control-input">
                                    <span class="custom-control-label">Paid</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <h3 class="box-title m-t-40">Address</h3>
                <hr>
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label>Street</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!--/span-->
                </div>
                <!--/row-->
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Post Code</label>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-control custom-select">
                                <option>--Select your Country--</option>
                                <option>India</option>
                                <option>Sri Lanka</option>
                                <option>USA</option>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                <button type="button" class="btn btn-inverse">Cancel</button>
            </div>
        </form>
    </div>
</div>
</div>
</div>

            </div>
        </div>
    </div>
</div>
@endsection