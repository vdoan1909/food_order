@extends('layout.admin.index')

@section('titlepage')
    @lang('titleAddDish')
@endsection

@section('content')
    <form class="row" action="{{ route('admin.dish.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">@lang('titleAddDish')</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("dishName")</label>
                            <input class="form-control" type="text" name="dish_name">
                            @error('dish_name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("dishPrice")</label>
                            <input class="form-control" type="text" name="dish_price">
                            @error('dish_price')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("dishImg")</label>
                            <input class="form-control" type="file" name="dish_img">
                            @error('dish_img')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("dishDes")</label>
                            <input class="form-control" type="text" name="dish_des">
                            @error('dish_des')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">@lang("category")</label>
                            <select class="form-control" name="dish_ctg">
                                <option value="">-- @lang("selectCtg") --</option>
                                @foreach ($list_ctg as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                            @error('dish_ctg')
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
