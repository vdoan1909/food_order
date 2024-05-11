@extends('layout.admin.index')

@section('titlepage')
    @lang('titleAddNews')
@endsection

@section('content')
    <form class="row" action="{{ route('admin.news.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">@lang('titleAddNews')</h3>
                <div class="tile-body">
                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang('newsName')</label>
                            <input class="form-control" type="text" name="news_name">
                            @error('news_name')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang('newsDes')</label>
                            <input class="form-control" type="text" name="news_des">
                            @error('news_des')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">@lang('newsImg')</label>
                            <input class="form-control" type="file" name="news_img">
                            @error('news_img')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">@lang('category')</label>
                            <select class="form-control" name="news_ctg">
                                <option value="">-- @lang("selectCtg") --</option>
                                @foreach ($list_news_ctg as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten_danhmuc_tintuc }}</option>
                                @endforeach
                            </select>
                            @error('news_ctg')
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
