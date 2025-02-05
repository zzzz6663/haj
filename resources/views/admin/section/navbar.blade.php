


<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon no_link" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xsm-none">
                <a href="{{ route("login") }}" class="logo-link no_link">
                    {{--  <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="لوگو">
                    <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="لوگوی تاریک">  --}}
                    {{--  <img class=" logo-small logo-img logo_side"  src="{{ asset("/site/images/plogo.png") }}">  --}}
                </a>
            </div>
            <!-- .nk-header-brand -->
            <div class="nk-header-search ms-3 ms-xl-0">
                {{--  <a  class="btn btn-primary" href="{{ route("home") }}">
                    مشاهده سفر ها
                </a>  --}}
                {{--  <em class="icon ni ni-search"></em>  --}}
                {{--  <input type="text" class="form-control border-transparent form-focus-none" placeholder="هر چیزی که می خواهید را جستجو کنید">  --}}
            </div>
            <!-- .nk-header-news -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle no_link me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img src="{{ auth()->user()->avatar() }}" alt="">
                                                                                                </div>
                                <div class="user-info d-none d-xl-block">
                                    {{--  <div class="user-status user-status-unverified">
                                        تایید نشده
                                    </div>  --}}
                                    <div class="user-name dropdown-indicator">
                                        {{ auth()->user()->name }}
                                        {{ auth()->user()->family }}
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <img src="{{ auth()->user()->avatar() }}" alt="">
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text">  {{ auth()->user()->name }}
                                            {{ auth()->user()->family }}</span>
                                        <span class="sub-text">
                                            {{ auth()->user()->mobile }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">

                                    <li>

                                        <a class="dark-switch no_link" href="#"><em class="icon ni ni-moon"></em><span>حالت تاریک</span></a>
                                    </li>
                                    @role('customer')
                                    <li>
                                        <a href=""><em class="icon ni ni-activity-alt"></em><span>فعالیت ها</span></a>
                                    </li>
                                    <li>
                                        <a href=""><em class="icon ni ni-user-alt"></em><span>مشاهده پروفایل</span></a>
                                    </li>

                                    @endrole

                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route("logout") }}"><em class="icon ni ni-signout"></em><span>خروج</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- .nk-header-wrap -->
    </div>
    <!-- .container-fliud -->
</div>



