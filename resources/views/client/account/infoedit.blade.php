@extends('layout.client.index')

@section('title')
    Trang chủ
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>user dashboard</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">home</a></li>
                        <li><a href="#">dashboard</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="dashboard mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="dashboard_area">
                <div class="row">
                    @include('layout.client.info-nav')

                    <div class="col-xl-9 col-lg-8 wow fadeInUp" data-wow-duration="1s">
                        <div class="dashboard_content">
                            <div class="dashboard_body">
                                <h3>edit information<a class="dash_add_new_address"
                                        href="{{ route('client.info') }}">cancel</a>
                                </h3>

                                <div class="dash_personal_info">
                                    <div class="dash_personal_info_edit comment_input p-0 mb_0">
                                        <form action="{{ route('client.info.post.edit', $get_user->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="comment_imput_single">
                                                        <label>name</label>
                                                        <input type="text" placeholder="Name" name="info_name"
                                                            value="{{ $get_user->ho_ten }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="comment_imput_single">
                                                        <label>phone</label>
                                                        <input type="text" placeholder="Phone" name="info_phone"
                                                            value="{{ $get_user->so_dien_thoai }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-6 col-lg-6">
                                                    <div class="comment_imput_single">
                                                        <label>email</label>
                                                        <input type="email" placeholder="Email" name="info_email"
                                                            value="{{ $get_user->email }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="comment_imput_single">
                                                        <label>image</label>
                                                        <input type="file" placeholder="Image" name="info_image"
                                                            value="{{ $get_user->anh }}">
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12">
                                                    <div class="comment_imput_single">
                                                        <label>address</label>
                                                        <input type="text" placeholder="Address" name="info_address"
                                                            value="{{ $get_user->dia_chi }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="common_btn">submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
