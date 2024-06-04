@extends('layout.admin.index')

@section('titlepage')
    @lang('titleListOrder')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{-- <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{ route('admin.rder.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                @lang('titleAddOrder')
                            </a>
                        </div>
                    </div> --}}
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>@lang('id')</th>
                                <th>Tên người nhận</th>
                                <th>Địa chỉ nhận</th>
                                <th>Email nhận</th>
                                <th>SĐT nhận</th>
                                <th>Tên khách hàng</th>
                                <th>Ghi chú</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->ten_nguoi_nhan }}</td>
                                    <td>{{ $order->dia_chi_nhan }}</td>
                                    <td>{{ $order->email_nhan }}</td>
                                    <td>{{ $order->sdt_nguoi_nhan }}</td>
                                    <td>{{ $order->ten_khach_hang }}</td>
                                    <td>{{ $order->ghi_chu }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @if (Session::has('success'))
        <script>
            swal({
                title: "@lang('swalSuccess')",
                text: "{{ Session::get('success') }}",
                icon: "success",
                buttons: ["@lang('swalCancel')", "@lang('swalAgree')"]
            });
        </script>
    @endif
@endsection
