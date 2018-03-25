@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        
        <div class="card">
            {{--  <div class="card card-outline-info">  --}}
                {{--  <div class="card-header"><h4 class="m-b-0 text-white">Form Result Lab for Diagnosis Id: {{$diagnosis->id}}</h4></div>  --}}
                <div class="card-body ">
                    <h4 class="card-title">Form Result Lab for Diagnosis Id: {{$diagnosis->id}}</h4>
                    {{--  <h6 class="card-subtitle">Just add <code>form-material</code> class to the form that's it.</h6>  --}}
                    <form class="form-material m-t-40" action="{{ route('health_analyst.lab.storeResultLab')}}" method="POST">                         
                        <input type="hidden" name="diagnosis_id" value="{{$diagnosis->id}}">
                        <div class="form-group">
                            {{--  <label>Result</label>  --}}
                            <textarea name="result" class="form-control" rows="5" placeholder="Write Result Lab Here"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Submit</button>                        
                        
                    </form>
                </div>  
            {{--  </div>  --}}
        </div>
    </div>
</div>
@endsection