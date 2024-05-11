@extends('layout.admin.index')

@section('titlepage')
    @lang('titleListCategory')
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="row element-button">
                        <div class="col-sm-2">

                            <a class="btn btn-add btn-sm" href="{{ route('admin.category.add') }}" title="Thêm">
                                <i class="fas fa-plus"></i>
                                @lang('titleAddCategory')
                            </a>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>@lang('id')</th>
                                <th>@lang('categoryName')</th>
                                <th>@lang('func')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list_ctg as $ctg)
                                <tr>
                                    <td>{{ $ctg->id }}</td>
                                    <td>{{ $ctg->ten_danh_muc }}</td>
                                    <td>
                                        <button
                                            onclick="confirmDelete('{{ $ctg->id }}', '{{ route('admin.category.delete', ['id' => $ctg->id]) }}')"
                                            class="btn btn-primary btn-sm trash" type="button" title="Xóa">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <a href="{{ route('admin.category.detail', ['id' => $ctg->id]) }}">
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
