@extends('layout.client.index')

@section('title')
    Chi tiết
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>thanh toán</h1>
                    <ul>
                        <li><a href="#">thanh toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="cart_view mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <form method="POST" action="{{ route('client.checkout.confirm') }}" class="row">
                @csrf

                @if ($data['tong_so_luong'] >= 2)
                    @foreach ($data['id_dish_check_out'] as $id_dish_check_out)
                        <input type="hidden" name="id_dish_check_out[]" value="{{ $id_dish_check_out }}">
                        @endforeach
                        @else
                        <input type="hidden" name="id_dish_check_out" value="{{ $data['id_dish_check_out'] }}">
                @endif

                <input type="hidden" name="quantity" value="{{ $quantity }}">
                <input type="hidden" name="total" value="{{ $data['total'] }}">

                <div class="col-xl-8 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="checkout_form">
                        <div class="check_form">
                            <div>
                                <div class="row mt_30">
                                    <div class="col-12">
                                        <h5>Thông tin nhận hàng</h5>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="check_single_form">
                                            <input type="text" placeholder="Tên người nhận" name="pay_username"
                                                value="">
                                            @error('pay_username')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="check_single_form">
                                            <select id="city" class="select_js" name="pay_city">
                                                <option value="">Tỉnh/Thành phố:</option>
                                            </select>
                                            @error('pay_city')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="check_single_form">
                                            <select id="district" class="select_js" name="pay_district">
                                                <option value="">Quận/Huyện:</option>
                                            </select>
                                            @error('pay_district')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="check_single_form">
                                            <select id="ward" class="select_js" name="pay_ward">
                                                <option value="">Phường/Xã:</option>
                                            </select>
                                            @error('pay_ward')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="check_single_form">
                                            <input type="text" placeholder="Số điện thoại *" name="pay_phone"
                                                value="">
                                            @error('pay_phone')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                        <div class="check_single_form">
                                            <input type="text" placeholder="Email *" name="pay_email"
                                                value="{{ session('customer')->email }}">
                                            @error('pay_email')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="check_single_form">
                                            <select class="select_js" name="pay_type">
                                                <option value="" selected>Phương thức thanh toán</option>
                                                <option value="1">Thanh toán khi nhận hàng</option>
                                                <option value="2">Thanh toán bằng VNPay</option>
                                            </select>
                                            @error('pay_type')
                                                <span style="color: red"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="check_single_form mt_30 mb-0">
                                            <h5>Thông tin thêm</h5>
                                            <textarea name="pay_note" cols="3" rows="4"
                                                placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ: ghi chú đặc biệt khi giao hàng"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                    <div id="sticky_sidebar" class="cart_list_footer_button">
                        <div class="cart_list_footer_button_text">
                            <h6>total cart ({{ $quantity }})</h6>
                            <p>subtotal: <span> {{ number_format($data['total'], 0, ',', '.') }}</span></p>
                            <p class="total"><span>total:</span> <span>
                                    {{ number_format($data['total'], 0, ',', '.') }}</span></p>
                            <button
                                style="
                                width: 100%;
                                height: 50px;
                                margin-top: 10px;
                                text-transform: capitalize;
                                padding: 5px 20px 6px 20px;
                                text-align: center;
                                border-radius: 30px;
                                background: var(--colorPrimary);
                                color: var(--colorWhite);
                                font-size: 14px;
                                font-weight: 600;
                                position: static;
                                top: 0; 
                                right: 0; 
                                transform: translateY(0); 
                                -webkit-transform: translateY(0); 
                                -moz-transform: translateY(0);
                                -ms-transform: translateY(0);
                                -o-transform: translateY(0);
                                transition: all linear .3s; 
                                -webkit-transition: all linear .3s; 
                                -moz-transition: all linear .3s;
                                -ms-transition: all linear .3s;
                                -o-transition: all linear .3s;" name="redirect">thanh toán
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
