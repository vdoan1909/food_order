@extends('layout.client.index')

@section('title')
    404
@endsection

@section('content')
    <section class="error">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-md-7 m-auto">
                    <div class="error_text wow fadeInUp" data-wow-duration="1s">
                        <img src="{{ asset('images/404_img.png') }}" alt="404" class="img-fluid w-100">
                        <h2>That Page Doesn't Exist!</h2>
                        <p>Sorry, the page you were looking for could not be found.</p>
                        <a class="common_btn" href="{{ route('client.home') }}">home</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
