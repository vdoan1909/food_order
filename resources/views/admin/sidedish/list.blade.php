@extends('layout.admin.index')

@section('titlepage')
    @lang('titleListSideDish')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{ route('admin.sidedish.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                @lang('titleAddSideDish')
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>@lang('id')</th>
                                <th>@lang('sideDishName')</th>
                                <th>@lang('sideDishImg')</th>
                                <th>@lang('sideDishPrice')</th>
                                <th>@lang('func')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_side_dish as $sidedish)
                                <tr>
                                    <td>{{ $sidedish->id }}</td>
                                    <td>{{ $sidedish->ten_mon_phu }}</td>
                                    <td>
                                        <img style="width: 200px;height: 200px;object-fit: cover"
                                            src="{{ asset('storage/' . $sidedish->anh_mon_phu) }}" alt="">
                                    </td>
                                    <td>
                                        <b>
                                            {{ number_format($sidedish->gia_mon_phu, 0, ',', '.') }} VND
                                        </b>
                                    </td>
                                    <td>
                                        <button
                                            onclick="confirmDelete('{{ $sidedish->id }}', '{{ route('admin.sidedish.delete', ['id' => $sidedish->id]) }}')"
                                            class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <a href="{{ route('admin.sidedish.detail', ['id' => $sidedish->id]) }}">
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
