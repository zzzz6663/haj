
<header data-add-bg="bg-dark-1" class="header {{Route::currentRouteName()=="home"?"":"bg-dark-3"}}  bg-green js-header" data-x="header" data-x-toggle="is-menu-opened">
    <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="row justify-between items-center">

            <div class="col-auto">
                <div class="d-flex items-center">
                    <a href="{{ route('home') }}" class="header-logo mr-20" data-x="header-logo"
                        data-x-toggle="is-logo-dark">
                        <img src="/site/img/general/logo-light.svg" alt="logo icon">
                        <img src="/site/img/general/logo-dark.svg" alt="logo icon">
                    </a>


                    <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                        <div class="mobile-overlay"></div>
                        <div class="header-menu__content">
                            <div class="mobile-bg js-mobile-bg"></div>
                            <div class="menu js-navList">
                                <ul class="menu__nav text-white -is-active">
                                    <li class="">
                                        <a data-barba href="{{route("home")}}">
                                            <span class="mr-10">خانه</span>
                                        </a>
                                    </li>
                                     <li class="menu-item-has-children">
                                        <a data-barba href="">

                                            <span class="mr-10">مجموعه ها</span>
                                            <i class="icon icon-chevron-sm-down"></i>
                                        </a>
                                        <ul class="subnav">

                                            @foreach (App\Models\Unit::all() as $uni)
                                            <li><a href="{{route("single.unit",$uni->id)}}">{{$uni->name}}</a></li>

                                            @endforeach

                                          </ul>
                                    </li>
                                    <li class="">
                                        <a  href="{{route("about")}}">
                                            <span class="mr-10">درباره ما </span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a  href="{{route("contact")}}">
                                            <span class="mr-10">تماس با ما </span>
                                        </a>
                                    </li>
                             </div>
                            <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-auto">
                <div class="d-flex items-center">

                    {{--  <div class="row x-gap-20 items-center xxl:d-none">
                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-white" data-x-click="currency">
                                <span class="js-currencyMenu-mainTitle">USD</span>
                                <i class="icon-chevron-sm-down text-7 ml-10"></i>
                            </button>
                        </div>

                        <div class="col-auto">
                            <div class="w-1 h-20 bg-white-20"></div>
                        </div>

                        <div class="col-auto">
                            <button class="d-flex items-center text-14 text-white" data-x-click="lang">
                                <img src="/site/img/general/lang.png" alt="image" class="rounded-full mr-10">
                                <span class="js-language-mainTitle">United Kingdom</span>
                                <i class="icon-chevron-sm-down text-7 ml-15"></i>
                            </button>
                        </div>
                    </div>
  --}}
                 @if(isset($turn_off_treserve)&& $turn_off_treserve->val)
                    <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                        <a href="{{route("login")}}" class="button px-30 fw-400 text-14 -white bg-white h-50 text-dark-1">ورود
                            </a>

                    </div>
                    @endif
                    {{--  <div class="d-none xl:d-flex x-gap-20 items-center pl-30 text-white" data-x="header-mobile-icons"
                        data-x-toggle="text-white">
                        <div><a href="login.html" class="d-flex items-center icon-user text-inherit text-22"></a>
                        </div>
                        <div><button class="d-flex items-center icon-menu text-inherit text-20"
                                data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button>
                        </div>
                    </div>  --}}
                </div>
            </div>

        </div>
    </div>
</header>
