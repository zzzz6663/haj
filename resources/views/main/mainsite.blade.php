<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <title>@yield('title')

        مجموعه شهید همّت کربلا
        1و2
    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--  <meta name="description" content="مجموعه شهید همّت کربلا 1و2">  --}}
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/fs.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/an.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.mmenu.all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.mmenu.positioning.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl crousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl crousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/aos.css') }}">
    @vite('resources/css/site.css')


</head>

<body class="" dir="rtl">
    @php
    $settings=
    App\Models\Setting::whereIn("name",["bg_site","site_name","deactive_warning","turn_off_treserve","call1","call2","address1","dinar_price"])->get();
    foreach ($settings as $setting) {
    ${$setting->name} = $setting->val;
    }
    $lan="32.6194323";
    $lat="44.0339704";
    @endphp



    @include('site.header')
    @yield('site')

    @include('site.footer')

    <script src="{{ asset('/site/js/bundle.js') }}"></script>
    <script src="{{ asset('/site/js/scripts.js') }}"></script>
    <script src="{{ asset('/js/jquery.mmenu.min.all.js') }}"></script>
    <script src="{{ asset('/js/owl crousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/js/aos.js') }}"></script>
    <script src="{{ asset('/js/practice.js') }}"></script>
<script>
    AOS.init({
      offset: 1,
      duration: 1000, // مدت زمان انیمیشن
      easing: 'ease', // نوع انیمیشن
    });
    window.addEventListener('scroll', () => {
      AOS.refresh();
    });

  </script>

    @vite( 'resources/js/app.js')


    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    @include('sweetalert::alert')
    @yield('script')
</body>

</html>
