@extends('main.manager')
@section('content')

<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">داشبورد</h3>

        </div>
        <!-- .nk-block-head-content -->



    </div>
</div>
<div class="nk-block">
    <div class="nk-block-head-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="card is-dark h-100">
                    <div class="card-inner bg-warning text-white rounded-16">
                        <h6>
                            تعداد کل زائرین
                        </h6>
                        <p>
                            {{App\Models\User::whereRole("passenger")->count()}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card is-dark h-100">
                    <div class="card-inner bg-success text-white rounded-16">
                        <h6>
                            تعداد کاروان ها
                        </h6>
                        <p>
                            {{App\Models\Karevan::count()}}

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card is-dark h-100">
                    <div class="card-inner bg-info text-white rounded-16">
                        <h6>
                            تعداد کل مجموعه ها
                        </h6>
                        <p>
                            {{App\Models\Collection::count()}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card is-dark h-100">
                    <div class="card-inner bg-primary text-white rounded-16">
                        <h6>
                            تعداد کل پزشک
                        </h6>
                        <p>
                            {{App\Models\User::whereRole("doctor")->count()}}
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
