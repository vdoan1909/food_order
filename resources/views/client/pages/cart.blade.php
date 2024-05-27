@extends('layout.client.index')

@section('title')
    Chi tiết
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>giỏ hàng</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">trang chủ</a></li>
                        <li><a href="#">giỏ hàng</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="cart_view mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s">
                    <div class="cart_list">
                        <div class="table-responsive">
                            @if ($tong_so_luong <= 0)
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Không có món ăn trong giỏ hàng
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            @else
                                <table>
                                    <tbody>
                                        <tr>
                                            <th class="pro_img">
                                                Ảnh
                                            </th>

                                            <th class="pro_name">
                                                Tên
                                            </th>

                                            <th class="pro_status">
                                                Giá
                                            </th>

                                            <th class="pro_select">
                                                Số lượng
                                            </th>

                                            <th class="pro_tk">
                                                Tổng tiền
                                            </th>

                                            <th class="pro_icon"></th>
                                        </tr>
                                        <?php $total_cart = 0; ?>
                                        @foreach ($carts as $cart)
                                            <tr>
                                                <td class="pro_img">
                                                    <img src="{{ asset('storage/' . $cart->anh_mon_an) }}" alt="product"
                                                        class="img-fluid w-100">
                                                </td>

                                                <td class="pro_name">
                                                    <a href="#">
                                                        {{ $cart->ten_mon_an }}
                                                    </a>
                                                </td>

                                                <td class="pro_status">
                                                    <h6>
                                                        {{ number_format($cart->gia_mon_an, 0, ',', '.') }} VND
                                                    </h6>
                                                </td>

                                                <td class="pro_select">
                                                    <div class="quentity_btn btn_cart">
                                                        <button class="btn decrease-btn btn-danger btn_cart_danger"
                                                            data-cart-id="{{ $cart->id }}"><i
                                                                class="fal fa-minus"></i></button>
                                                        <input type="text" class="quantity-input" placeholder="1"
                                                            value="{{ $cart->so_luong }}">
                                                        <button class="btn increase-btn btn-success btn_cart_success"
                                                            data-cart-id="{{ $cart->id }}"><i
                                                                class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>

                                                <td class="pro_tk">
                                                    <h6>
                                                        {{ number_format($cart->tong_tien, 0, ',', '.') }} VND
                                                    </h6>
                                                </td>

                                                <td class="pro_icon">
                                                    <a href="#" class="btn_del_cart"
                                                        data-cart-id="{{ $cart->id }}">
                                                        <i class="far fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $total_cart += $cart->tong_tien; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
                @if ($tong_so_luong > 0)
                    <div class="col-lg-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="cart_list_footer_button mt_50">
                            <div class="row">
                                <div class="col-xl-7 col-md-6">
                                    <div class="cart_list_footer_button_img">
                                        <img src="{{ asset('images/cart_offer_img.jpg') }}" alt="cart offer"
                                            class="img-fluid w-100">
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6">
                                    <form class="cart_list_footer_button_text" action="{{ route('client.cart.checkout') }}"
                                        method="GET">
                                        @csrf
                                        @foreach ($carts as $cart)
                                            <input type="hidden" name="id_dish_check_out[]"
                                                value="{{ $cart->id_mon_an }}">
                                        @endforeach
                                        <input type="hidden" name="total" value="{{ $total_cart }}">
                                        <h6>total cart</h6>
                                        <p class="subtotal">subtotal:
                                            <span>
                                                {{ number_format($total_cart, 0, ',', '.') }} VND
                                            </span>
                                        </p>
                                        <p class="total">
                                            <span>total:</span>
                                            <span>
                                                {{ number_format($total_cart, 0, ',', '.') }} VND
                                            </span>
                                        </p>
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
                                            -o-transition: all linear .3s;"
                                            type="submit" name="redirect">checkout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
