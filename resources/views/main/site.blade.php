<!DOCTYPE html>
<html dir="rtl" lang="fa" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
    <!-- Start Meta -->

    <title>@yield('title')

        مجموعه های شهید همت
            </title>
            <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="Creative, Digital, multipage, landing, freelancer template">
    <meta name="author" content="ThemeOri">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--  <meta name="description" content="مجموعه های شهید همت">  --}}
    <link rel="stylesheet" href="{{ asset('/site/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('/site/css/main.css') }}">
    {{--  <link rel="stylesheet" href="{{ asset('/common/modal-loading.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/lightbox.min.css') }}">  --}}
    <link rel="stylesheet" href="{{ asset('/site/css/rtl.css') }}">
    {{--  <link rel="stylesheet" href="{{ asset('/common/persian_calander.css') }}">  --}}

    <meta charset="utf-8" />
    {{--  <script src="{{ asset('/js/jq.js') }}"></script>  --}}
    {{--  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>  --}}


    <link rel="stylesheet" href="{{ asset('/css/fs.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/an.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.mmenu.all.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/jquery.mmenu.positioning.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl crousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/owl crousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">





    <script src="{{ asset('/js/jq.js') }}"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')



    <title>GoTrip</title>


</head>

<body>


    {{--  @yield('login')
    @if (Request::url() != route('admin.login'))
    @endif  --}}

    <div class="preloader js-preloader">
        <div class="preloader__wrap">
            <div class="preloader__icon">
                <svg width="38" height="37" viewBox="0 0 38 37" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1_41)">
                        <path
                            d="M32.9675 13.9422C32.9675 6.25436 26.7129 0 19.0251 0C11.3372 0 5.08289 6.25436 5.08289 13.9422C5.08289 17.1322 7.32025 21.6568 11.7327 27.3906C13.0538 29.1071 14.3656 30.6662 15.4621 31.9166V35.8212C15.4621 36.4279 15.9539 36.92 16.561 36.92H21.4895C22.0965 36.92 22.5883 36.4279 22.5883 35.8212V31.9166C23.6849 30.6662 24.9966 29.1071 26.3177 27.3906C30.7302 21.6568 32.9675 17.1322 32.9675 13.9422V13.9422ZM30.7699 13.9422C30.7699 16.9956 27.9286 21.6204 24.8175 25.7245H23.4375C25.1039 20.7174 25.9484 16.7575 25.9484 13.9422C25.9484 10.3587 25.3079 6.97207 24.1445 4.40684C23.9229 3.91841 23.6857 3.46886 23.4347 3.05761C27.732 4.80457 30.7699 9.02494 30.7699 13.9422ZM20.3906 34.7224H17.6598V32.5991H20.3906V34.7224ZM21.0007 30.4014H17.0587C16.4167 29.6679 15.7024 28.8305 14.9602 27.9224H16.1398C16.1429 27.9224 16.146 27.9227 16.1489 27.9227C16.152 27.9227 23.0902 27.9224 23.0902 27.9224C22.3725 28.8049 21.6658 29.6398 21.0007 30.4014ZM19.0251 2.19765C20.1084 2.19765 21.2447 3.33365 22.1429 5.3144C23.1798 7.60078 23.7508 10.6649 23.7508 13.9422C23.7508 16.6099 22.8415 20.6748 21.1185 25.7245H16.9322C15.2086 20.6743 14.2994 16.6108 14.2994 13.9422C14.2994 10.6649 14.8706 7.60078 15.9075 5.3144C16.8057 3.33365 17.942 2.19765 19.0251 2.19765V2.19765ZM7.28053 13.9422C7.28053 9.02494 10.3184 4.80457 14.6157 3.05761C14.3647 3.46886 14.1273 3.91841 13.9059 4.40684C12.7425 6.97207 12.102 10.3587 12.102 13.9422C12.102 16.7584 12.9462 20.7176 14.6126 25.7245H13.2259C9.33565 20.6126 7.28053 16.5429 7.28053 13.9422Z"
                            fill="#3554D1" />
                    </g>

                    <defs>
                        <clipPath id="clip0_1_41">
                            <rect width="36.92" height="36.92" fill="white" transform="translate(0.540039)" />
                        </clipPath>
                    </defs>
                </svg>
            </div>
        </div>

        <div class="preloader__title">

            مجموعه هتل های شهید همّت (کربلا)
        </div>
    </div>
    @include('main.header')
    <main>
        @yield('content')
    </main>
    @include('main.footer')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM"></script>
    {{--

    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>  --}}

    <script src="{{ asset('/common/modal-loading.js') }}"></script>
    <script src="{{ asset('/common/persian_calander.js') }}"></script>

    <script src="{{ asset('/site/js/vendors.js') }}"></script>
    <script src="{{ asset('/site/js/main.js') }}"></script>
    {{--  <script src="{{ asset('/js/lightbox.min.js') }}"></script>  --}}

    {{--  <script src="/site/libs/persian-date.js"></script>
    <script src="/site/libs/persian-datepicker.js"></script>
    <script src="/site/libs/modal-loading.js"></script>
    <script src="/site/libs/persian_number.js"></script>
    <script src="/site/libs/select2.js"></script>
    <script src="/site/libs/tooltipster.bundle.min.js"></script>
    <script src="/site/libs/persian-datepicker.js"></script>
    <script src="/common/tooltipster.bundle.min.js"></script>  --}}
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment-jalaali/2.2.0/moment-jalaali.min.js"></script>  --}}

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>  --}}
    @vite('resources/js/app.js')

    @yield('script')
</body>
@include('sweetalert::alert')

</html>
