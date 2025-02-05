<div class="nk-header nk-header-fluid is-theme">
    <div class="container-xl wide-xl">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger me-sm-2 d-lg-none">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="{{asset(" images/lg.png")}}" srcset="./images/logo2x.png 2x"
                        alt="لوگو">
                    <img class="logo-dark logo-img" src="{{asset(" images/lg.png")}}"
                        srcset="./images/logo-dark2x.png 2x" alt="لوگوی تاریک">
                </a>
            </div>
            <!-- .nk-header-brand -->
            <div class="nk-header-menu" data-content="headerNav">
                <div class="nk-header-mobile">
                    <div class="nk-header-brand">
                        <a href="html/index.html" class="logo-link">
                            <img class="logo-light logo-img" src="{{asset(" images/lg.png")}}"
                                srcset="./images/logo2x.png 2x" alt="لوگو">
                            <img class="logo-dark logo-img" src="{{asset(" images/lg.png")}}"
                                srcset="./images/logo-dark2x.png 2x" alt="لوگوی تاریک">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="headerNav"><em
                                class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div>

                <ul class="nk-menu nk-menu nk-menu-main ui-s2">
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="passenger.index"?"active":"" }}">
                        <a href="{{ route("passenger.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-users"></i>

                            <span class="nk-menu-text">زائرین </span>
                        </a>
                    </li>
                    @role('admin|manager|provincialSupervisor')
                    {{-- <li class="nk-menu-item   {{ Route::currentRouteName()=="dashboard.admin"?"active":"" }}">
                        <a href="{{ route("dashboard.admin") }}" class="nk-menu-link  ">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="nk-menu-text">داشبورد </span>
                        </a>
                    </li> --}}
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="imports"?"active":"" }}">
                        <a href="{{ route("imports") }}" class="nk-menu-link  ">
                            <i class="fas fa-sign-in-alt"></i>

                            <span class="nk-menu-text">ورود اطلاعات </span>
                        </a>
                    </li>
                    {{-- <li class="nk-menu-item   {{ Route::currentRouteName()=="imports"?"active":"" }}">
                        <a href="{{ route("imports") }}" class="nk-menu-link  ">
                            <span class="nk-menu-icon">
                                <i class="fas fa-users"></i>
                            </span>
                            <span class="nk-menu-text">ورود اطلاعات </span>
                        </a>
                    </li> --}}
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="karevan.index"?"active":"" }}">
                        <a href="{{ route("karevan.index") }}" class="nk-menu-link  ">

                            <i class="fas fa-caravan"></i>

                            <span class="nk-menu-text">کاروان </span>
                        </a>
                    </li>
                    @endrole
                    @role("admin")
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="manager.index"?"active":"" }}">
                        <a href="{{ route("manager.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-user-tie"></i>

                            <span class="nk-menu-text">مدیران </span>
                        </a>
                    </li>
                    @endrole
                    @role("provincialAgent")
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="commission.index"?"active":"" }}">
                        <a href="{{ route("commission.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-user-nurse"></i>

                            <span class="nk-menu-text">کمیسیون </span>
                        </a>
                    </li>
                    @endrole


                    @role("admin|manager")
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="doctor.index"?"active":"" }}">
                        <a href="{{ route("doctor.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-user-nurse"></i>

                            <span class="nk-menu-text">پزشکان </span>
                        </a>
                    </li>
                    {{-- <li class="nk-menu-item   {{ Route::currentRouteName()=="collection.index"?"active":"" }}">
                        <a href="{{ route("collection.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-hotel"></i>

                            <span class="nk-menu-text">مجموعه ها </span>
                        </a>
                    </li> --}}
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="provincialSupervisor.index"?"active":""
                        }}">
                        <a href="{{ route("provincialSupervisor.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-eye"></i>
                            <span class="nk-menu-text"> ناظر استانی </span>
                        </a>
                    </li>
                    <li class="nk-menu-item   {{ Route::currentRouteName()=="provincialAgent.index"?"active":"" }}">
                        <a href="{{ route("provincialAgent.index") }}" class="nk-menu-link  ">
                            <i class="fas fa-user-tie"></i>

                            <span class="nk-menu-text"> نماینده استانی </span>
                        </a>
                    </li>
                    @endrole

                    <li class="nk-menu-item   {{ Route::currentRouteName()=="reports"?"active":"" }}">
                        <a href="{{ route("reports",['type'=>"t1"]) }}" class="nk-menu-link ">
                            <i class="fas fa-chart-line"></i>

                            <span class="nk-menu-text">گزارشات </span>
                        </a>
                    </li>
                    {{-- <li class="nk-menu-item   {{ Route::currentRouteName()=="profile"?"active":"" }}">
                        <a href="{{ route("profile") }}" class="nk-menu-link  ">
                            <i class="fas fa-user-edit"></i>
                            <span class="nk-menu-text"> پروفایل </span>
                        </a>
                    </li> --}}
                    {{-- <li class="nk-menu-item   {{ Route::currentRouteName()=="logout"?"active":"" }}">
                        <a href="{{ route("logout") }}" class="nk-menu-link  text text-danger">
                            <span class="nk-menu-icon  text text-danger"><i
                                    class="fas fa-sign-out-alt  text text-danger"></i></span>
                            <span class="nk-menu-text">خروج </span>
                        </a>
                    </li> --}}
                </ul>
                <!-- .nk-menu -->
            </div>
            <!-- .nk-header-menu -->
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle no_link me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img src="{{ auth()->user()->avatar() }}" alt="">
                                </div>
                                <div class="user-info d-none d-xl-block">
                                    {{-- <div class="user-status user-status-unverified">
                                        تایید نشده
                                    </div> --}}
                                    <div class="user-name dropdown-indicator">
                                        {{ auth()->user()->name }}
                                        {{ auth()->user()->family }}
                                        {{ __("role.".auth()->user()->role)}}
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
                                        <span class="lead-text"> {{ auth()->user()->name }}
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

                                        <a class="dark-switch no_link"  href="#" id="dark-mode"><em
                                                class="icon ni ni-moon"></em><span>حالت تاریک</span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route("profile") }}"><em
                                                class="icon ni ni-activity-alt"></em><span> پروفایل</span></a>
                                    </li>
                                    {{-- <li>
                                        <a href="{{ route("logout") }}"><em class="icon ni ni-activity-alt"></em><span>
                                                خروج</span></a>
                                    </li> --}}



                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li>
                                        <a href="{{ route("logout") }}"><em
                                                class="icon ni ni-signout"></em><span>خروج</span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- .nk-header-tools -->
        </div>
        <!-- .nk-header-wrap -->
    </div>
    <!-- .container-fliud -->
</div>
