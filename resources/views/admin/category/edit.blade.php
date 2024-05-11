@extends('layout.admin.index')

@section('titlepage')
    @lang('titleEditCategory')
@endsection

@section('content')
    <form class="row" action="{{ route('admin.category.edit', $ctg_detail->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">@lang('titleEditCategory')</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group  col-md-3">
                            <label class="control-label">@lang('categoryName')</label>
                            <input class="form-control" type="text" name="ctg_name" value="{{ $ctg_detail->ten_danh_muc}}">
                            @error('ctg_name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-save" type="submit">@lang('buttonSave')</button>
            <button class="btn btn-cancel" type="reset">@lang('buttonReset')</button>
        </div>
    </form>
@endsection
