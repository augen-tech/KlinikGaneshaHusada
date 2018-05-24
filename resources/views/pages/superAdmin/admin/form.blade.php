@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Admin</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
            <li class="breadcrumb-item active">{{ isset($admin) ? 'Edit' : 'Add'}}</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ isset($admin) ? route('superAdmin.admin.update', $admin->id) : route('superAdmin.admin.store') }}" method="POST">
                    {{ isset($admin) ? method_field('PATCH') : ''}}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="John doe" value="{{ isset($admin) ? $admin->name : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="m-b-10">
                                <label class="custom-control custom-radio">
                                    <input value="M" id="radio5" name="gender" type="radio" class="custom-control-input" {{ isset($admin) ? $admin->gender == 'M' ? 'checked' : '' : old('gender') == 'M' ? 'checked' : '' }}>
                                    <span class="custom-control-label">Male</span>
                                </label>
                                <label class="custom-control custom-radio ">
                                    <input value="F" id="radio6" name="gender"  type="radio" class="custom-control-input" {{ isset($admin) ? $admin->gender == 'F' ? 'checked' : '' : old('gender') == 'F' ? 'checked' : '' }}>
                                    <span class="custom-control-label">Female</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Johndoe@mailinator.com" value="{{ isset($admin) ? $admin->email : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="johndoe" value="{{ isset($admin) ? $admin->username : '' }}" required>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password" value='' required>
                        </div>
                    </div>
                    <div class="form-actions pull-right">
                        <button type="button" class="btn btn-inverse">Cancel</button>
                        <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection