@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Doctor</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
            <li class="breadcrumb-item active">Add</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="#">
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="John doe">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" name="email" class="form-control" placeholder="Johndoe@mailinator.com">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="password">
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