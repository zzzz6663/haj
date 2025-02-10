<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="/admin/assets/" data-template="vertical-menu-template-no-customizer">

<head>
    <title>@yield('title')
        سامانه پزشکی
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="سازمان حج و زیارت">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/libs/fontawesome-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/libs/themify-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/libs/bootstrap-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/dashlite.rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/theme.css') }}" />
    <link rel="stylesheet" href="{{ asset('/common/persian-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('/common/modal-loading.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/common/light.css') }}">

    <link rel="stylesheet" href="{{ asset('/common/persian_calander.css') }}">
    {{-- <script src="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.all.min.js
    "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/sweetalert2@11.15.10/dist/sweetalert2.min.css
    " rel="stylesheet"> --}}
    <script src="{{ asset('/js/jq.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.1.js"></script> --}}


    @vite('resources/css/app.css')

    <style>
        .form-label {
            margin-top: 5px;
            margin-bottom: 0;
        }

    </style>

</head>

@auth

<body class=" {{ auth()->user()->dark?" dark1-mode":"" }}has-rtl nk-body npc-invest bg-lighter has-touch nk-nio-theme">
    @endauth
    @guest
    <body class=" has-rtl nk-body bg-lighter npc-default has-sidebar no-touch nk-nio-theme">
        @endguest
        <div class="nk-app-root">
            @if (Request::is('admin/*') || Request::is('passenger_info/*')
            || Request::is('note/*') || Request::is('note')
            )

            {{-- @includeWhen(empty($sidebar), 'admin.section.sidebar')  --}}
            <div class="nk-wrap">
                @auth
                @includeWhen(empty($sidebar), 'admin.section.navbar2')
                @endauth
                <div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content">
                    @yield('empty')
                </div>
            </div>
            @endif


        </div>

        {{-- @if (Request::is('admin/*'))
        <div class="flex-wrap app align-content-stretch d-flex">

            <div class="app-container">
                <div class="app-content">
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            @includeWhen(empty($header), 'admin.parts.header')
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        --}}
        <div class="nk-app-root fffffffffffff">
            <!-- main @s -->
            <div class="nk-main">
                @yield('site')
            </div>
        </div>


        {{-- <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>  --}}

        {{-- <script src="{{ asset('/js/driver.js') }}"></script> --}}
        {{-- <script src="{{ asset('/js/driver.js') }}"></script> --}}

        <script src="{{ asset('/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('/common/select2.js') }}"></script>
        <script src="{{ asset('/common/persian_number.js') }}"></script>
        <script src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/common/modal-loading.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/common/anim.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/browser-image-compression.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/common/valde.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/common/light.js') }}"></script>
        <script src="{{ asset('/admin/assets/js/bundle.js') }}"></script>
        <script src="{{ asset('/admin/assets/js/scripts.js') }}"></script>
        <script src="{{ asset('/admin/assets/js/jdate.js') }}"></script>
        <script src="{{ asset('/admin/assets/js/example-chart.js') }}"></script>
        <script src="{{ asset('/common/persian_calander.js') }}"></script>

        <script src="{{ asset('/common/persian-date.min.js') }}"></script>
        <script src="{{ asset('/common/persian-datepicker.min.js') }}"></script>
        <script src="{{ asset('/common/html2pdf.js') }}"></script>
        <script src="{{ asset('/common/izo_top.js') }}"></script>
        <script src="{{ asset('/js/moment1.js') }}"></script>





        @if (Request::is('note/*') || Request::is('note'))
        {{-- @vite( 'resources/js/pwa.js') --}}
        @else
        @vite( 'resources/js/app.js')
        @endif
        @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
        @include('sweetalert::alert')
        @yield('script')
    </body>

</html>
