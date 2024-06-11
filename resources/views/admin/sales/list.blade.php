@extends('layout.admin.index')

@section('titlepage')
    @lang('titleListOrder')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class='icon  bx bxs-user fa-3x'></i>
                <div class="info">
                    <h4>@lang('titleChartTotalCustomer')</h4>
                    <p><b>@lang('contentChartCustomer', ['countCustomer' => $count_account])</b></p>
                    <p class="info-tong">@lang('textChartCustomer')</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class='icon bx bxs-purchase-tag-alt fa-3x'></i>
                <div class="info">
                    <h4>@lang('titleChartTotalDish')</h4>
                    <p><b>@lang('contentChartDish', ['countDish' => $count_dish])</b></p>
                    <p class="info-tong">@lang('textChartDish')</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class='icon fa-3x bx bxs-shopping-bag-alt'></i>
                <div class="info">
                    <h4>Tổng đơn hàng</h4>
                    <p><b>457 đơn hàng</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class='icon fa-3x bx bxs-chart'></i>
                <div class="info">
                    <h4>Tổng thu nhập</h4>
                    <p><b>104.890.000 đ</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div>
                    <h3 class="tile-title">SẢN PHẨM BÁN CHẠY</h3>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                            <tr>
                                <th>@lang('id')</th>
                                <th>@lang('dishName')</th>
                                <th>@lang('dishPrice')</th>
                                <th>@lang('dishImg')</th>
                                <th width="20">@lang('dishView')</th>
                                <th>@lang('category')</th>
                            </tr>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($top5_dish as $dish)
                                <tr>
                                    <td>{{ $dish->id }}</td>
                                    <td>{{ $dish->ten_mon_an }}</td>
                                    <td>
                                        <b>
                                            {{ number_format($dish->gia_mon_an, 0, ',', '.') }} VND
                                        </b>
                                    </td>
                                    <td>
                                        <img style="width: 200px;height: 200px;object-fit: cover"
                                            src="{{ asset('storage/' . $dish->anh_mon_an) }}" alt="">
                                    </td>
                                    <td>{{ $dish->luot_xem }}</td>
                                    @foreach ($list_ctg as $ctg)
                                        @if ($ctg->id === $dish->id_the_loai)
                                            <td>{{ $ctg->ten_danh_muc }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div>
                    <h3 class="tile-title">TỔNG ĐƠN HÀNG</h3>
                </div>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>@lang('id')</th>
                                <th>Tên người nhận</th>
                                <th>Địa chỉ nhận</th>
                                <th>Email nhận</th>
                                <th>SĐT nhận</th>
                                <th>Tên khách hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái đơn hàng</th>
                                <th>Phương thức thanh toán</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->ma_don_hang }}</td>
                                    <td>{{ $order->ten_nguoi_nhan }}</td>
                                    <td>{{ $order->dia_chi_nhan }}</td>
                                    <td>{{ $order->email_nhan }}</td>
                                    <td>{{ $order->sdt_nguoi_nhan }}</td>
                                    <td>{{ $order->ten_khach_hang }}</td>
                                    <td>
                                        {{ number_format($order->tong_tien, 0, ',', '.') }} VND
                                    </td>
                                    <td>
                                        @if ($order->trang_thai_dh == 1)
                                            <span class="badge bg-success">
                                                @lang('accomplished')
                                            </span>
                                        @else
                                            <span class="badge bg-warning">
                                                @lang('beingTransported')
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($order->pttt == 1)
                                            Thanh toán trực tiếp
                                        @else
                                            Thanh toán online
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">DỮ LIỆU HÀNG THÁNG</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">THỐNG KÊ DOANH SỐ</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection
