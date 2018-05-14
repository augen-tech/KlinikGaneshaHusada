@extends('layouts.app')

@section('breadcumb')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">Dashboard</h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Lab</a></li>
            <li class="breadcrumb-item active">Result Lab</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">        
        <div class="card">
            
                <div class="card-body ">
                    {{-- <h4 class="card-title">{{ !isset($resultLab) ? "Form Result Lab for Diagnosis Id: " . $diagnosis->id  : "Edit Result Lab for Id: " . $resultLab->id  }}</h4> --}}                    
                    <form class="form-horizontal m-t-40" action="{{ isset($resultLab) ? route('healthAnalyst.resultLab.update', $resultLab->id) : route('healthAnalyst.resultLab.store')}}" method="POST">                                                 
                        <input type="hidden" name={{isset($resultLab) ? "resultLab_id" : "diagnosis_id"}} value="{{ isset($resultLab) ? $resultLab->id : $diagnosis->id}}">
                        <div class="form-group">                            
                            <label class="control-label">{{ !isset($resultLab) ? "Form Result Lab for Diagnosis Id: " . $diagnosis->id  : "Edit Result Lab for Id: " . $resultLab->id  }}</label>
                            <textarea name="result" class="form-control" rows="5" placeholder="Write Result Lab Here">{{ isset($resultLab) ?  $resultLab->result : ''}}</textarea>
                            <label class="control-label">Price</label>
                            <input name="price" type="number" class="form-control" placeholder="Price">
                        </div>                      
                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>                                                
                    </form>
                </div>  
             
        </div>
    </div>
</div>
@endsection


