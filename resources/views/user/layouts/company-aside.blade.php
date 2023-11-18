<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">{{env('APP_NAME')}}</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a href="#">
                    <i class="feather icon-home"></i>
                    <span class="menu-title">داشبورد</span>
                    <span class="badge badge badge-warning badge-pill float-right mr-2">2</span>
                </a>
                <ul class="menu-content">
                    <li class="{{Route::is('index') ? 'active' : ''}}">
                        <a href="{{route('index')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">صفحه اصلی</span>
                        </a>
                    </li>
                    <li class="{{Route::is('dashboard', auth()->user()->site->title, auth()->user()->site->title) ? 'active' : ''}}">
                        <a href="{{route('dashboard', auth()->user()->site->title, auth()->user()->site->title)}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-item">پنل مدیریت</span>
                        </a>
                    </li>
                </ul>
            </li>
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item">
                    <a href="#">
                        <i class="feather icon-file-text"></i>
                        <span class="menu-title">دسته بندی ها</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{Route::is('company.categories.index', auth()->user()->site->title) ? 'active' : ''}}">
                            <a href="{{route('company.categories.index', auth()->user()->site->title)}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item">دسته بندی ها</span>
                            </a>
                        </li>
                        <li class="{{Route::is('company.categories.create', auth()->user()->site->title) ? 'active' : ''}}">
                            <a href="{{route('company.categories.create', auth()->user()->site->title)}}">
                                <i class="feather icon-circle"></i>
                                <span class="menu-item">افزودن دسته بندی</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <li class="{{Route::is('logout') ? 'active' : ''}} nav-item">
                <a href="{{route('logout')}}" class="text-danger" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    <i class="text-danger feather icon-power"></i>
                    <span class="menu-title text-danger">خروج</span>
                </a>
                <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->
