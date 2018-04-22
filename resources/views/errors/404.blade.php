@extends('layouts.error')

@section('content')
<section id="wrapper" class="error-page">
    <div class="error-box">
        <div class="error-body text-center">
            <h1>404</h1>
            <h3 class="text-uppercase">Page not found </h3>
            <p class="text-muted m-t-30 m-b-30">Please ensure page you want to access.</p>
            <a href="{{ route('home') }}" class="btn btn-dark btn-rounded waves-effect waves-light m-b-40">Back</a> </div>
        <footer class="footer text-center">© 2018 Klinik Ganesha Husada.</footer>
    </div>
</section>
@endsection