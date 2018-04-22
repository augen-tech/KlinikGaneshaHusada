@extends('layouts.error')

@section('content')
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>503</h1>
            <h3 class="text-uppercase">Under maintenance. </h3>
            <p class="text-muted m-t-30 m-b-30">Working on some stuff. Please wait a second.</p>
            <a href="{{ route('home') }}" class="btn btn-dark btn-rounded waves-effect waves-light m-b-40">Back</a> </div>
        <footer class="footer text-center">© 2018 Klinik Ganesha Husada.</footer>
    </div>
</section>
@endsection