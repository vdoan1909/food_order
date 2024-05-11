@extends('layout.admin.index')

@section('titlepage')
    @lang('titleListDish')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{ route('admin.dish.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                @lang('titleAddDish')
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>@lang('id')</th>
                                <th>@lang('dishName')</th>
                                <th>@lang('dishPrice')</th>
                                <th>@lang('dishImg')</th>
                                <th>@lang('dishDes')</th>
                                <th width="20">@lang('dishView')</th>
                                <th>@lang('category')</th>
                                <th>@lang('dishCreate')</th>
                                <th>@lang('func')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_dish as $dish)
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
                                    <td>{{ $dish->mo_ta }}</td>
                                    <td>{{ $dish->luot_xem }}</td>
                                    @foreach ($list_ctg as $ctg)
                                        @if ($ctg->id === $dish->id_the_loai)
                                            <td>{{ $ctg->ten_danh_muc }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        {{ \Carbon\Carbon::parse($dish->ngay_them)->format('d/m/Y') }}
                                        <br>
                                        {{ \Carbon\Carbon::parse($dish->ngay_them)->diffForHumans() }}
                                    </td>
                                    <td>
                                        <button
                                            onclick="confirmDelete('{{ $dish->id }}', '{{ route('admin.dish.delete', ['id' => $dish->id]) }}')"
                                            class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <a href="{{ route('admin.dish.detail', ['id' => $dish->id]) }}">
                                            <button class="btn btn-primary btn-sm edit" type="button" title="Sửa">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
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
