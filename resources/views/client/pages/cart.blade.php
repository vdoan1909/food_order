@extends('layout.client.index')

@section('title')
    Chi tiết
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>cart view</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">home</a></li>
                        <li><a href="#">cart view</a></li>
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
                                                Image
                                            </th>

                                            <th class="pro_name">
                                                details
                                            </th>

                                            <th class="pro_status">
                                                price
                                            </th>

                                            <th class="pro_select">
                                                quantity
                                            </th>

                                            <th class="pro_tk">
                                                total
                                            </th>

                                            <th class="pro_icon">
                                                <a class="clear_all" href="#">clear all</a>
                                            </th>
                                        </tr>
                                        <?php $total_cart = 0; ?>
                                        @foreach ($carts as $cart)
                                            <tr class="cart-items" data-cart-id="{{ $cart->id }}">
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
                                                        <button class="btn decrease-btn btn-danger btn_cart_danger"><i
                                                                class="fal fa-minus"></i></button>
                                                        <input type="text" class="quantity-input" placeholder="1"
                                                            value="{{ $cart->so_luong }}">
                                                        <button class="btn increase-btn btn-success btn_cart_success"><i
                                                                class="fal fa-plus"></i></button>
                                                    </div>
                                                </td>

                                                <td class="pro_tk">
                                                    <h6>
                                                        {{ number_format($cart->tong_tien, 0, ',', '.') }} VND
                                                    </h6>
                                                </td>

                                                <td class="pro_icon">
                                                    <a href="#"><i class="far fa-times"></i></a>
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
                                    <div class="cart_list_footer_button_text">
                                        <h6>total cart ({{ $tong_so_luong }})</h6>
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
                                        <a class="common_btn" href="check_out.html">checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
