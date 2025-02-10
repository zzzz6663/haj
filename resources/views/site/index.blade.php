
@extends('main.manager')

@section('empty')
<div class="p-5 m-auto content-page">
    <div class="mx-auto nk-block-head nk-block-head-lg">
        <div class="text-center nk-block-head-content">
            {{-- <h1 class="nk-block-title fw-normal">
                سامانه جامع مرکز پزشکی حج و زیارت جمعیت هلال‌احمر            </h1> --}}
        </div>
    </div>
    <!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card">
            <div class="card-inner card-inner-xl">
                    <div class="row">
                        @foreach (__("list") as $key => $value)
                        <div class="mb-2 col-lg-12">
                            <div class="p-2 border bo" style="min-height: ">
                                <h4>
                                        {{  $value['title'] }}
                                </h4>
                                 <p class="text-justify " style="text-align:justify">
                                    {{  $value['content'] }}
                                 </p>
                                 @if($value['link'])
                                 <a href="{{ route("admin.login") }}" class="btn btn-primary">
                                    ورود به سامانه
                                 </a>
                                 @else
                                 <a href="{{ route("update.page") }}" class="btn btn-primary ">
                                    ورود به سامانه
                                 </a>
                                 @endif

                            </div>
                        </div>
                        @endforeach

                    </div>
            </div>
        </div>
    </div>
    <!-- .nk-block -->
</div>
@endsection
