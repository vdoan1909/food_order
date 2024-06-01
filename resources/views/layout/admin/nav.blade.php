<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        @if (session('admin')->anh)
            <img class="app-sidebar__user-avatar" src="{{ asset('storage/' . session('admin')->ho_ten) }}" width="50px"
                alt="User Image">
        @else
            <img class="app-sidebar__user-avatar" src="https://cdn-icons-png.flaticon.com/512/2304/2304226.png"
                width="50px" alt="User Image">
        @endif
        <div>
            <p class="app-sidebar__user-name"><b>{{ session('admin')->ho_ten }}</b></p>
            <p class="app-sidebar__user-designation">@lang('welcomeBack')</p>
        </div>
    </div>
    <hr>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item " href="{{ route('admin.category') }}">
                <i class='app-menu__icon bx bx-id-card'></i>
                <span class="app-menu__label">@lang('categoryManagement')</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="{{ route('admin.newscategory') }}">
                <i class='app-menu__icon bx bx-category'></i>
                <span class="app-menu__label">@lang('newsCategory')</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="{{ route('admin.dish') }}">
                <i class='app-menu__icon bx bx-dish'></i>
                <span class="app-menu__label">@lang('dishManagement')</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item " href="{{ route('admin.news') }}">
                <i class='app-menu__icon bx bx-news'></i>
                <span class="app-menu__label">@lang('newsManagement')</span>
            </a>
        </li>
    </ul>
</aside>
