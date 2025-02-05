 <div class="nk-sidebar nk-sidebar-fixed is-light" data-content="sidebarMenu">
     <div class="nk-sidebar-element nk-sidebar-head">
         <div class="nk-sidebar-brand">
             <a href="{{ route("login") }}" class="logo-link nk-sidebar-logo ">
                 {{-- <img class="logo-light logo-img" src="./images/logo.png" srcset="./images/logo2x.png 2x" alt="لوگو">
                <img class="logo-dark logo-img" src="./images/logo-dark.png" srcset="./images/logo-dark2x.png 2x" alt="لوگوی تاریک">
                <img class="logo-small logo-img logo-img-small" src="./images/logo-small.png" srcset="./images/logo-small2x.png 2x" alt="لوگوی کوچک">  --}}
                 {{--  <img class=" logo-small logo-img logo_side" src="{{ asset("/site/images/plogo.png") }}">  --}}
             </a>
         </div>
         <div class="nk-menu-trigger me-n2">
             <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none no_link" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
             <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex no_link" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
         </div>
     </div>
     <!-- .nk-sidebar-element -->
     <div class="nk-sidebar-element">
         <div class="nk-sidebar-content">
             <div class="nk-sidebar-menu" data-simplebar="init">
                 <div class="simplebar-wrapper" style="margin: -16px 0px -40px;">
                     <div class="simplebar-height-auto-observer-wrapper">
                         <div class="simplebar-height-auto-observer"></div>
                     </div>
                     <div class="simplebar-mask">
                         <div class="simplebar-offset" style="left: 0px; bottom: 0px;">
                             <div class="simplebar-content-wrapper" tabindex="0" role="region" aria-label="scrollable content" style="height: 100%; overflow: hidden scroll;">
                                 <div class="simplebar-content" style="padding: 16px 0px 40px;">
                                     <ul class="nk-menu">
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="passenger.index"?"active":"" }}">
                                            <a href="{{ route("passenger.index") }}" class="nk-menu-link  ">
                                                <i class="fas fa-users"></i>

                                                <span class="nk-menu-text">زائرین   </span>
                                            </a>
                                        </li>

                                         @role('admin|provincialSupervisor')
                                         <li class="nk-menu-item   {{ Route::currentRouteName()=="dashboard.admin"?"active":"" }}">
                                            <a href="{{ route("dashboard.admin") }}" class="nk-menu-link  ">
                                                <i class="fas fa-tachometer-alt"></i>
                                                <span class="nk-menu-text">داشبورد  </span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="imports"?"active":"" }}">
                                            <a href="{{ route("imports") }}" class="nk-menu-link  ">
                                                <i class="fas fa-sign-in-alt"></i>

                                                <span class="nk-menu-text">ورود اطلاعات   </span>
                                            </a>
                                        </li>
                                        {{--  <li class="nk-menu-item   {{ Route::currentRouteName()=="imports"?"active":"" }}">
                                            <a href="{{ route("imports") }}" class="nk-menu-link  ">
                                                <span class="nk-menu-icon">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                                <span class="nk-menu-text">ورود اطلاعات   </span>
                                            </a>
                                        </li>  --}}


                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="karevan.index"?"active":"" }}">
                                            <a href="{{ route("karevan.index") }}" class="nk-menu-link  ">

                                                <i class="fas fa-caravan"></i>

                                                <span class="nk-menu-text">کاروان   </span>
                                            </a>
                                        </li>


                                        @endrole
                                        @role("admin|manager")
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="doctor.index"?"active":"" }}">
                                            <a href="{{ route("doctor.index") }}" class="nk-menu-link  ">
                                                <i class="fas fa-user-nurse"></i>

                                                <span class="nk-menu-text">پزشکان    </span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="collection.index"?"active":"" }}">
                                            <a href="{{ route("collection.index") }}" class="nk-menu-link  ">
                                                <i class="fas fa-hotel"></i>

                                                <span class="nk-menu-text">مجموعه ها     </span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="provincialSupervisor.index"?"active":"" }}">
                                            <a href="{{ route("provincialSupervisor.index") }}" class="nk-menu-link  ">
                                                <i class="fas fa-eye"></i>
                                                <span class="nk-menu-text">  ناظر استانی      </span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="provincialAgent.index"?"active":"" }}">
                                            <a href="{{ route("provincialAgent.index") }}" class="nk-menu-link  ">
                                                <i class="fas fa-user-tie"></i>

                                                <span class="nk-menu-text">  نماینده استانی      </span>
                                            </a>
                                        </li>
                                        @endrole
                                        <li class="nk-menu-item   {{ Route::currentRouteName()=="profile"?"active":"" }}">
                                            <a href="{{ route("profile") }}" class="nk-menu-link  ">
                                                <i class="fas fa-user-edit"></i>
                                                <span class="nk-menu-text">  پروفایل       </span>
                                            </a>
                                        </li>
                                         <li class="nk-menu-item   {{ Route::currentRouteName()=="logout"?"active":"" }}">
                                             <a href="{{ route("logout") }}" class="nk-menu-link  text text-danger">
                                                 <span class="nk-menu-icon  text text-danger"><i class="fas fa-sign-out-alt  text text-danger"></i></span>
                                                 <span class="nk-menu-text">خروج </span>
                                             </a>
                                         </li>
                                     </ul>
                                     <!-- .nk-menu -->
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="simplebar-placeholder" style="width: auto; height: 1678px;"></div>
                 </div>
                 <div class="simplebar-track simplebar-horizontal" style="visibility: hidden;">
                     <div class="simplebar-scrollbar" style="width: 0px; display: none;"></div>
                 </div>
                 <div class="simplebar-track simplebar-vertical" style="visibility: visible;">
                     <div class="simplebar-scrollbar" style="height: 131px; transform: translate3d(0px, 58px, 0px); display: block;"></div>
                 </div>
             </div>
             <!-- .nk-sidebar-menu -->
         </div>
         <!-- .nk-sidebar-content -->
     </div>
     <!-- .nk-sidebar-element -->
 </div>
