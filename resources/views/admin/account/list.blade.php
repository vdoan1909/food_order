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
                                <th>Họ tên</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Ảnh</th>
                                <th>Địa chỉ</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($accounts as $account)
                                <tr>
                                    <td>{{ $account->id }}</td>
                                    <td>{{ $account->ho_ten }}</td>
                                    <td>
                                        @if ($account->so_dien_thoai)
                                            {{ $account->so_dien_thoai }}
                                        @else
                                            Chưa cập nhật
                                        @endif
                                    </td>
                                    <td>{{ $account->email }}</td>
                                    <td>
                                        @if ($account->anh)
                                            <img src="{{ asset('storage/' . $account->anh) }}" alt="">
                                        @else
                                            Chưa cập nhật
                                        @endif
                                    </td>
                                    <td>
                                        @if ($account->dia_chi)
                                            {{ $account->dia_chi }}
                                        @else
                                            Chưa cập nhật
                                        @endif
                                    </td>

                                    <td>
                                        <button
                                            onclick="confirmDelete('{{ $account->id }}', '{{ route('admin.account.delete', ['id' => $account->id]) }}')"
                                            class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
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
