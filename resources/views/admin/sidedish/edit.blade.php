@extends('layout.admin.index')

@section('titlepage')
    @lang('titleAddSideDish')
@endsection

@section('content')
    <form class="row" action="{{ route('admin.sidedish.edit', $side_dish_detail->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">@lang('titleAddSideDish')</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="row m-1">
                            <img style="width: 200px;height: 200px;object-fit: cover" src="{{ asset('storage/' . $side_dish_detail->anh_mon_phu) }}"
                                alt="">
                    </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("sideDishName")</label>
                            <input class="form-control" type="text" name="side_dish_name" value="{{$side_dish_detail->ten_mon_phu}}">
                            @error('side_dish_name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("sideDishImg")</label>
                            <input class="form-control" type="file" name="side_dish_img">
                            @error('side_dish_img')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang("sideDishPrice")</label>
                            <input class="form-control" type="text" name="side_dish_price" value="{{$side_dish_detail->gia_mon_phu}}">
                            @error('side_dish_price')
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
