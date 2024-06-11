@extends('layout.client.index')

@section('title')
    Đơn hàng
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>đơn hàng</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">trang chủ</a></li>
                        <li><a href="#">đơn hàng</a></li>
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
                                <h3>danh sách đơn hàng</h3>
                                <div class="dashboard_order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr class="t_header">
                                                    <th>Mã đơn hàng</th>
                                                    <th>Ngày đặt</th>
                                                    <th>Trạng thái thanh toán</th>
                                                    <th>Loại thanh toán</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <h5>
                                                                {{ $order->ma_don_hang }}
                                                            </h5>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                {{ $order->ngay_mua }}
                                                            </p>
                                                        </td>
                                                        <td>
                                                            @if ($order->trang_thai == 1)
                                                                <span class="complete">Đã thanh toán</span>
                                                            @else
                                                                <span class="cancel">Chưa thanh toán</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($order->loai_thanh_toan == 2)
                                                                <span class="complete">Trực tuyến</span>
                                                            @else
                                                                <span class="cancel">Trực tiếp</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <h5>
                                                                {{ number_format($order->tong_tien, 0, ',', '.') }} VND
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
