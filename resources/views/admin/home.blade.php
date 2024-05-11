@extends('layout.admin.index')

@section('titlepage')
    @lang("titleControlPanel")
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="col-md-6">
                    <div class="widget-small primary coloured-icon"><i class='icon bx bxs-user-account fa-3x'></i>
                        <div class="info">
                            <h4>@lang('titleChartTotalCustomer')</h4>
                            <p><b>@lang('contentChartCustomer', ['countCustomer' => 19])</b></p>
                            <p class="info-tong">@lang('textChartCustomer')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget-small info coloured-icon"><i class='icon bx bxs-data fa-3x'></i>
                        <div class="info">
                            <h4>@lang('titleChartTotalDish')</h4>
                            <p><b>@lang('contentChartDish', ['countDish' => 199])</b></p>
                            <p class="info-tong">@lang('textChartDish')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget-small warning coloured-icon"><i class='icon bx bxs-shopping-bags fa-3x'></i>
                        <div class="info">
                            <h4>@lang('titleChartTotalOrder')</h4>
                            <p><b>@lang('contentChartOrder', ['countOrder' => 199])</b></p>
                            <p class="info-tong">@lang('textChartOrder')</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget-small danger coloured-icon"><i class='icon bx bxs-error-alt fa-3x'></i>
                        <div class="info">
                            <h4>@lang('titleChartTotalOrderSuccess')</h4>
                            <p><b>@lang('contentChartOrderSuccess', ['countOrderSuccess' => 9])</b></p>
                            <p class="info-tong">@lang('textChartOrderSuccess', ['countOrderSuccess' => 9])</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">@lang('orderStatus')</h3>
                        <div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>@lang('customerMame')</th>
                                        <th>@lang('totalAmount')</th>
                                        <th>@lang('status')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>AL3947</td>
                                        <td>Phạm Thị Ngọc</td>
                                        <td>
                                            19.770.000 đ
                                        </td>
                                        <td><span class="badge bg-info">@lang('waitingForProgressing')</span></td>
                                    </tr>
                                    <tr>
                                        <td>ER3835</td>
                                        <td>Nguyễn Thị Mỹ Yến</td>
                                        <td>
                                            16.770.000 đ
                                        </td>
                                        <td><span class="badge bg-warning">@lang('beingTransported')</span></td>
                                    </tr>
                                    <tr>
                                        <td>MD0837</td>
                                        <td>Triệu Thanh Phú</td>
                                        <td>
                                            9.400.000 đ
                                        </td>
                                        <td><span class="badge bg-success">@lang('accomplished')</span></td>
                                    </tr>
                                    <tr>
                                        <td>MT9835</td>
                                        <td>Đặng Hoàng Phúc </td>
                                        <td>
                                            40.650.000 đ
                                        </td>
                                        <td><span class="badge bg-danger">@lang('cancelled')</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">@lang('newCustomer')</h3>
                        <div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>@lang('customerMame')</th>
                                        <th>@lang('dateOfBirth')</th>
                                        <th>@lang('phoneNumber')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#183</td>
                                        <td>Hột vịt muối</td>
                                        <td>21/7/1992</td>
                                        <td><span class="tag tag-success">0921387221</span></td>
                                    </tr>
                                    <tr>
                                        <td>#219</td>
                                        <td>Bánh tráng trộn</td>
                                        <td>30/4/1975</td>
                                        <td><span class="tag tag-warning">0912376352</span></td>
                                    </tr>
                                    <tr>
                                        <td>#627</td>
                                        <td>Cút rang bơ</td>
                                        <td>12/3/1999</td>
                                        <td><span class="tag tag-primary">01287326654</span></td>
                                    </tr>
                                    <tr>
                                        <td>#175</td>
                                        <td>Hủ tiếu nam vang</td>
                                        <td>4/12/20000</td>
                                        <td><span class="tag tag-danger">0912376763</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">@lang('monthsOfInputData')</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="tile">
                        <h3 class="tile-title">@lang('statisticsMonthsOfRevenue')</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
