@extends('layout.client.index')

@section('title')
    Danh sách món ăn
@endsection

@section('banner')
    <section class="page_breadcrumb" style="background: url('{{ asset('images/counter_bg.jpg') }}')">
        <div class="breadcrumb_overlay">
            <div class="container">
                <div class="breadcrumb_text">
                    <h1>Popular Foods menu</h1>
                    <ul>
                        <li><a href="{{ route('client.home') }}">home</a></li>
                        <li><a href="#">menu</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="menu_page mt_100 xs_mt_70 mb_100 xs_mb_70">
        <div class="container">
            <form class="menu_search_area" action="{{ route('client.menu') }}" method="GET">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="menu_search">
                            <input type="text" name="search" placeholder="tên món ăn..."
                                value="{{ request()->input('search') ? request()->input('search') : '' }}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="menu_search">
                            <div class="select_area">
                                <select class="select_js" name="sort_by" id="sort_by">
                                    <option value="default"
                                        {{ request()->input('sort_by') == 'default' ? 'selected' : '' }}>mặc định</option>
                                    <option value="newest"
                                        {{ request()->input('sort_by') == 'newest' ? 'selected' : '' }}>mới nhất</option>
                                    <option value="low" {{ request()->input('sort_by') == 'low' ? 'selected' : '' }}>từ
                                        thấp tới cao</option>
                                    <option value="high" {{ request()->input('sort_by') == 'high' ? 'selected' : '' }}>
                                        từ cao tới thấp</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="menu_search">
                            <button class="common_btn" type="submit">Search</button>
                        </div>
                    </div>
                </div>
            </form>

            <div class="row">
                @foreach ($list_side_menu as $sidedish)
                    <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="menu_item">
                            <div class="menu_item_img">
                                <img src="{{ asset('storage/' . $sidedish->anh_mon_phu) }}" alt="menu"
                                    class="img-fluid w-100">
                            </div>
                            <div class="menu_item_text">

                                <a class="title" href="{{ route('client.detail', ['id' => $sidedish->id]) }}"
                                    title="{{ $sidedish->ten_mon_phu }}">
                                    {{ Str::limit($sidedish->ten_mon_phu, 20, '...') }}
                                </a>

                                <p class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <i class="far fa-star"></i>
                                    <span>24</span>
                                </p>
                                <h5 class="price">
                                    {{ number_format($sidedish->gia_mon_phu, 0, ',', '.') }} đ
                                </h5>
                                <a class="add_to_cart" href="#" data-bs-toggle="modal" data-bs-target="#cartModal">add
                                    to cart</a>
                                <ul class="d-flex flex-wrap justify-content-end">
                                    <li>
                                        <a href="#" class="add-to-favorite" data-dish-id="{{ $sidedish->id }}">
                                            <i class="fal fa-heart"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('client.detail', ['id' => $sidedish->id]) }}">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="pagination mt_50">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <!-- Previous Page -->
                                <li class="page-item {{ $list_side_menu->currentPage() == 1 ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $list_side_menu->previousPageUrl() }}"><i
                                            class="fas fa-long-arrow-alt-left"></i></a>
                                </li>

                                <!-- Page Numbers -->
                                @for ($i = 1; $i <= $list_side_menu->lastPage(); $i++)
                                    <li class="page-item {{ $list_side_menu->currentPage() == $i ? 'active' : '' }}">
                                        <a class="page-link" href="{{ $list_side_menu->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Next Page -->
                                <li
                                    class="page-item {{ $list_side_menu->currentPage() == $list_side_menu->lastPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="{{ $list_side_menu->nextPageUrl() }}"><i
                                            class="fas fa-long-arrow-alt-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
