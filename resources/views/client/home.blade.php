@extends('layout.client.index')

@section('title')
    Trang chủ
@endsection

@section('banner')
    <section class="banner">
        <div class="banner_overlay">
            <span class="banner_shape_1">
                <img src="{{ asset('images/tree_5.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_2">
                <img src="{{ asset('images/tree_3.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_3">
                <img src="{{ asset('images/tree_4.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_4">
                <img src="{{ asset('images/tree_6.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_5">
                <img src="{{ asset('images/tree_7.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <span class="banner_shape_6">
                <img src="{{ asset('images/tree_2.png') }}" alt="shape" class="img-fluid w-100">
            </span>
            <div class="col-12">
                <div class="banner_slider" style="background: url('{{ asset('images/banner_bg.jpg') }}')">
                    <div class="banner_slider_overlay">
                        <div class=" container">
                            <div class="row justify-content-center">
                                <div class="col-xxl-6 col-xl-6 col-md-10 col-lg-6">
                                    <div class="banner_text wow fadeInLeft" data-wow-duration="1s">
                                        <h3>
                                            Thỏa mãn cơn thèm của bạn
                                        </h3>
                                        <h1>
                                            Món ăn ngon với cách ăn uống tuyệt vời
                                        </h1>
                                        <p>
                                            Chào mừng bạn đến với website đặt đồ ăn hàng đầu! Khám phá vô vàn món ăn ngon và
                                            thưởng thức cách ăn uống tuyệt vời ngay tại nhà. Đặt hàng dễ dàng, giao hàng
                                            nhanh chóng, và trải nghiệm dịch vụ đẳng cấp.
                                        </p>

                                    </div>
                                </div>
                                <div class="col-xxl-5 col-xl-6 col-sm-10 col-md-9 col-lg-6">
                                    <div class="banner_img wow fadeInRight" data-wow-duration="1s">
                                        <div class="img">
                                            <img src="{{ asset('images/slider_img_1.png') }}" alt="food item"
                                                class="img-fluid w-100">
                                            <span>
                                                giảm 35%
                                            </span>
                                        </div>
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

@section('content')
    <!-- CART POPUT START -->
    <div class="cart_popup">
        <div class="modal fade" id="cartModal" tabindex="-1" aria-hidden="true">
            <p style="display: none" id="dish_id"></p>
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                                class="fal fa-times"></i></button>
                        <div class="cart_popup_img">
                            <img src="" alt="menu" class="img-fluid w-100">
                        </div>
                        <div class="cart_popup_text">
                            <a href="#" class="title"></a>

                            <h4 class="price"> </h4>
                            <div class="details_quentity">
                                <h5>Số lượng</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger"><i class="fal fa-minus"></i></button>
                                        <input type="text" placeholder="1" value="1">
                                        <button class="btn btn-success"><i class="fal fa-plus"></i></button>
                                    </div>
                                    <h3 id="sum_cart_popup"></h3>
                                </div>
                            </div>
                            <ul class="details_button_area d-flex flex-wrap">
                                <li><a class="common_btn" href="#">Thêm giỏ hàng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CART POPUT END -->
    <section class="menu mt_95 xs_mt_65">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="section_heading mb_25">
                        <h4>Thực đơn</h4>
                        <h2>Món ăn ngon phổ biến</h2>
                    </div>
                </div>
            </div>

            <div class="row grid">
                @foreach ($dish_populars as $dish_popular)
                    <div class="col-xxl-3 col-sm-6 col-lg-4 chicken wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="{{ asset('storage/' . $dish_popular->anh_mon_an) }}" alt="menu"
                                    class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">
                                @foreach ($categorys as $category)
                                    @if ($dish_popular->id_the_loai == $category->id)
                                        <a class="category" href="#">
                                            {{ $category->ten_danh_muc }}
                                        </a>
                                    @endif
                                @endforeach

                                <a class="title" href="{{ route('client.detail', ['id' => $dish_popular->id]) }}"
                                    title="{{ $dish_popular->ten_mon_an }}">
                                    {{ Str::limit($dish_popular->ten_mon_an, 20, '...') }}
                                </a>

                                <p class="rating">
                                    @if ($dish_popular->average_rating)
                                        @php
                                            $rounded_rating = round($dish_popular->average_rating * 2) / 2;
                                        @endphp

                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($i < floor($rounded_rating))
                                                <!-- Full star -->
                                                <i class="fas fa-star"></i>
                                            @elseif ($i < $rounded_rating)
                                                <!-- Half star -->
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <!-- Empty star -->
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                    @else
                                        <span>Không có đánh giá</span>
                                    @endif
                                    <span>{{ $dish_popular->reviewers_count }}</span>
                                </p>
                                <h5 class="price">
                                    {{ number_format($dish_popular->gia_mon_an, 0, ',', '.') }} đ
                                </h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal"
                                    data-dish-id="{{ $dish_popular->id }}"
                                    data-dish-name="{{ $dish_popular->ten_mon_an }}"
                                    data-dish-img="{{ asset('storage/' . $dish_popular->anh_mon_an) }}"
                                    data-dish-price="{{ $dish_popular->gia_mon_an }}">
                                    add to cart
                                </a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li>
                                        <a href="#" class="add-to-favorite"
                                            data-dish-id="{{ $dish_popular->id }}">
                                            <i class="fal fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('client.detail', ['id' => $dish_popular->id]) }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    {{-- <section class="team mt_100 xs_mt_70 pt_95 xs_pt_65 pb_95 xs_pb_65">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="section_heading mb_25">
                        <h4>our team</h4>
                        <h2>meet our expert chefs</h2>
                    </div>
                </div>
            </div>

            <div class="row team_slider">
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="{{ asset('images/chef_1.jpg') }}" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>ismat joha</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="{{ asset('images/chef_2.jpg') }}" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>arun chandra</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="{{ asset('images/chef_3.jpg') }}" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>isita rahman</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="{{ asset('images/chef_4.jpg') }}" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>khandakar rashed</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                    <div class="single_team">
                        <div class="single_team_img">
                            <img src="{{ asset('images/chef_5.jpg') }}" alt="team" class="img-fluid w-100">
                        </div>
                        <div class="single_team_text">
                            <h4>naurin nipu</h4>
                            <p>senior chef</p>
                            <ul class="d-flex flex-wrap ">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="download mt_100 xs_mt_70">
        <div class="row">
            <div class="col-xl-4 col-lg-4">
                <div class="download_text_bg" style="background: url('{{ asset('images/download_img.png') }}')">
                    <div class="download_text_overlay">
                        <div class="download_text wow fadeInUp" data-wow-duration="1s">
                            <h5>$5.00 Cashback</h5>
                            <h2>Easy To Order Our All Food</h2>
                            <ul class="d-flex flex-wrap">
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="fab fa-google-play"></i></span>
                                        <p>
                                            <span>Available on the</span>
                                            Google Play
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="icon"><i class="fab fa-apple"></i></span>
                                        <p>
                                            <span>Download on the</span>
                                            App Store
                                        </p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8">
                <div class="row download_slider_item">
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="download_slider">
                            <img src="{{ asset('images/download_slider_4.jpg') }}" alt="app download"
                                class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="download_slider">
                            <img src="{{ asset('images/download_slider_3.jpg') }}" alt="app download"
                                class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="download_slider">
                            <img src="{{ asset('images/download_slider_2.jpg') }}" alt="app download"
                                class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="download_slider">
                            <img src="{{ asset('images/download_slider_1.jpg') }}" alt="app download"
                                class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="download_slider">
                            <img src="{{ asset('images/download_slider_5.jpg') }}" alt="app download"
                                class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="counter_part" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="counter_overlay pt_120 xs_pt_90 pb_100 xs_pb_0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">85,000</h2>
                                <span><i class="fas fa-user"></i></span>
                            </div>
                            <p>customer serve</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">120</h2>
                                <span><i class="fas fa-hat-chef"></i></span>
                            </div>
                            <p>experience chef</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">72,000</h2>
                                <span><i class="fas fa-users"></i></span>
                            </div>
                            <p>happy customer</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_counter">
                            <div class="text">
                                <h2 class="counter">30</h2>
                                <span><i class="fas fa-trophy"></i></span>
                            </div>
                            <p>winning award</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="blog pt_95 xs_pt_65 pb_65 xs_pb_35">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <div class="section_heading mb_25">
                        <h4>
                            Tin tức
                        </h4>
                        <h2>Tin tức món ăn mới nhất</h2>
                    </div>
                </div>
            </div>

            <div class="row blog_slider">
                @foreach ($list_news as $news)
                    <div class="col-xl-4 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="single_blog">
                            <div class="single_blog_img">
                                <img src="{{ asset('storage/' . $news->anh) }}" alt="author" class="img-fluid w-100">
                            </div>
                            <div class="single_blog_author">
                                <div class="text">
                                    <p>{{ $news->ngay_dang }}</p>
                                </div>
                            </div>
                            <div class="single_blog_text">
                                <a class="category"
                                    href="{{ route('client.news.detail', ['id' => $news->id]) }}">{{ $news->ten_danhmuc_tintuc }}</a>
                                <a class="title" href="#" title="{{ $news->ten_tin_tuc }}">
                                    {{ Str::limit($news->ten_tin_tuc, 25, '...') }}

                                </a>
                                <p>
                                    {{ $news->mo_ta_tin_tuc }}
                                </p>
                                <div class="single_blog_footer">
                                    <a class="read_btn" href="{{ route('client.news.detail', ['id' => $news->id]) }}">
                                        xem thêm <i class="far fa-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="toast"></div>
    @if (session('success') && !session('toastShown'))
        @php
            session(['toastShown' => true]);
        @endphp
        @if (session('customer'))
            <script>
                window.onload = function() {
                    FuiToast("{{ session('success') }} {{ session('customer')->ho_ten }}", {
                        style: {
                            backgroundColor: '#1DC071',
                            width: 'auto'
                        },
                        className: 'dark-mode'
                    })
                };
            </script>
        @elseif (session('admin'))
            <script>
                window.onload = function() {
                    FuiToast("{{ session('success') }} {{ session('admin')->ho_ten }}", {
                        style: {
                            backgroundColor: '#1DC071',
                            width: 'auto'
                        },
                        className: 'dark-mode'
                    })
                };
            </script>
        @endif
    @endif

    @if (session('error'))
        <script>
            window.onload = function() {
                FuiToast("{{ session('error') }}", {
                    style: {
                        backgroundColor: 'yellow',
                        color: "#000000",
                        width: 'auto'
                    },
                })
            };
        </script>
    @endif
@endsection
