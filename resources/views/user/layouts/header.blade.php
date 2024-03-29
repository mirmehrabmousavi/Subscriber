<!-- BEGIN: Header-->
<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-container content">
            <div class="navbar-collapse" id="navbar-mobile">
                <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                    <ul class="nav navbar-nav">
                        <li class="nav-item mobile-menu d-xl-none mr-auto">
                            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav bookmark-icons">
                        <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                        <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                        <!--     i.ficon.feather.icon-menu-->
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="دسته بندی ها">
                                <i class="ficon feather icon-menu"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="محصولات">
                                <i class="ficon feather icon-shopping-bag"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="برگه ها">
                                <i class="ficon feather icon-file"></i>
                            </a>
                        </li>
                        <li class="nav-item d-none d-lg-block">
                            <a class="nav-link" href="#" data-toggle="tooltip" data-placement="top" title="مقالات">
                                <i class="ficon feather icon-book"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="nav-item d-none d-lg-block">
                            <div class="bookmark-input search-input">
                                <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>
                                <input class="form-control input" type="text" placeholder="Explore Vuexy..." tabindex="0" data-search="template-list">
                                <ul class="search-list search-list-bookmark"></ul>
                            </div>
                            <!-- select.bookmark-select-->
                            <!--   option Chat-->
                            <!--   option email-->
                            <!--   option todo-->
                            <!--   option Calendar-->
                        </li>
                    </ul>
                </div>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-language nav-item">
                        <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language">English</span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-flag">
                            <a class="dropdown-item" href="#" data-language="en">
                                <i class="flag-icon flag-icon-us"></i> English
                            </a>
                            <a class="dropdown-item" href="#" data-language="fr">
                                <i class="flag-icon flag-icon-fr"></i> French
                            </a>
                            <a class="dropdown-item" href="#" data-language="de">
                                <i class="flag-icon flag-icon-de"></i> German
                            </a>
                            <a class="dropdown-item" href="#" data-language="pt">
                                <i class="flag-icon flag-icon-pt"></i> Portuguese
                            </a>
                        </div>
                    </li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                    <li class="nav-item nav-search">
                        <a class="nav-link nav-link-search">
                            <i class="ficon feather icon-search"></i>
                        </a>
                        <div class="search-input">
                            <div class="search-input-icon"><i class="feather icon-search primary"></i></div>
                            <input class="input" type="text" placeholder="Explore Vuexy..." tabindex="-1" data-search="template-list">
                            <div class="search-input-close"><i class="feather icon-x"></i></div>
                            <ul class="search-list search-list-main"></ul>
                        </div>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon feather icon-shopping-cart"></i>
                            <span class="badge badge-pill badge-primary badge-up cart-item-count">6</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-cart dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">
                                        <span class="cart-item-count">6</span>
                                        <span class="mx-50">Items</span>
                                    </h3>
                                    <span class="notification-title">In Your Cart</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list">
                                <a class="cart-item" href="app-ecommerce-details.html">
                                    <div class="media">
                                        <div class="media-left d-flex justify-content-center align-items-center">
                                            <img src="{{asset('admin/app-assets/images/pages/eCommerce/4.png')}}" width="75" alt="Cart Item">
                                        </div>
                                        <div class="media-body">
                                            <span class="item-title text-truncate text-bold-500 d-block mb-50">
                                                Apple - Apple Watch Series 1 42mm Space Gray Aluminum Case Black Sport Band - Space Gray Aluminum
                                            </span>
                                            <span class="item-desc font-small-2 text-truncate d-block">
                                                Durable, lightweight aluminum cases in silver, space gray,gold, and rose gold. Sport Band in a variety of colors.
                                                All the features of the original Apple Watch, plus a new dual-core processor for faster performance. All models run watchOS 3.
                                                Requires an iPhone 5 or later to run this device.
                                            </span>
                                            <div class="d-flex justify-content-between align-items-center mt-1">
                                                <span class="align-middle d-block">1 x $299</span>
                                                <i class="remove-cart-item feather icon-x danger font-medium-1"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="empty-cart d-none p-2">Your Cart Is Empty.</li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-notification nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                            <i class="ficon feather icon-bell"></i>
                            <span class="badge badge-pill badge-primary badge-up">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                            <li class="dropdown-menu-header">
                                <div class="dropdown-header m-0 p-2">
                                    <h3 class="white">5 New</h3>
                                    <span class="notification-title">App Notifications</span>
                                </div>
                            </li>
                            <li class="scrollable-container media-list">
                                <a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <i class="feather icon-plus-square font-medium-5 primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="primary media-heading">You have new order!</h6>
                                            <small class="notification-text"> Are your going to meet me tonight?</small>
                                        </div>
                                        <small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                    </div>
                                </a>
                                <a class="d-flex justify-content-between" href="javascript:void(0)">
                                    <div class="media d-flex align-items-start">
                                        <div class="media-left">
                                            <i class="feather icon-download-cloud font-medium-5 success"></i>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="success media-heading red darken-1">99% Server load</h6>
                                            <small class="notification-text">You got new order of goods.</small>
                                        </div>
                                        <small><time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-menu-footer">
                                <a class="dropdown-item p-1 text-center" href="javascript:void(0)">View all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <span class="user-name text-bold-600">{{auth()->user()->site->title}}</span>
                                <span class="user-status">{{auth()->user()->email}}</span>
                            </div>
                            <span>
                                <img class="round" src="" alt="" height="40" width="40">
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">
                                <i class="feather icon-upload"></i>
                                گالری
                            </a>
                            <a class="dropdown-item" href="{{route('admin.settings.index')}}">
                                <i class="feather icon-settings"></i>
                                تنظیمات
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                                <i class="feather icon-power"></i> خروج
                            </a>
                            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<ul class="main-search-list-defaultlist d-none">
    <li class="d-flex align-items-center">
        <a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Files</h6>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
        <a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50">
                    <img src="{{asset('admin/app-assets/images/icons/xls.png')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Two new item submitted</p>
                    <small class="text-muted">Marketing Manager</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
        <a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50">
                    <img src="{{asset('admin/app-assets/images/icons/jpg.png')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
        <a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{asset('admin/app-assets/images/icons/pdf.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;150kb</small>
        </a><
        /li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between w-100" href="#">
            <div class="d-flex">
                <div class="mr-50"><img src="{{asset('admin/app-assets/images/icons/doc.png')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web Designer</small>
                </div>
            </div><small class="search-data-size mr-50 text-muted">&apos;256kb</small>
        </a>
    </li>
    <li class="d-flex align-items-center"><a class="pb-25" href="#">
            <h6 class="text-primary mb-0">Members</h6>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{asset('admin/app-assets/images/portrait/small/avatar-s-8.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer"><a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50">
                    <img src="{{asset('admin/app-assets/images/portrait/small/avatar-s-1.jpg')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd Developer</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50">
                    <img src="{{asset('admin/app-assets/images/portrait/small/avatar-s-14.jpg')}}" alt="png" height="32">
                </div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Milena Gibson</p>
                    <small class="text-muted">Digital Marketing Manager</small>
                </div>
            </div>
        </a>
    </li>
    <li class="auto-suggestion d-flex align-items-center cursor-pointer">
        <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">
            <div class="d-flex align-items-center">
                <div class="avatar mr-50"><img src="{{asset('admin/app-assets/images/portrait/small/avatar-s-6.jpg')}}" alt="png" height="32"></div>
                <div class="search-data">
                    <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>
                </div>
            </div>
        </a>
    </li>
</ul>
<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer">
        <a class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start">
                <span class="mr-75 feather icon-alert-circle"></span>
                <span>No results found.</span>
            </div>
        </a>
    </li>
</ul>
<!-- END: Header-->
