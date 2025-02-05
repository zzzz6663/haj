@extends('main.manager')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            <h5 class="card-header">تعریف



                کمیسیون

                جدید
                <i class="ti ti-user-plus"></i>
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("new.user.commission",$commission->id) }}" method="post" enctype="multipart/form-data">
                    @csrf 
                    @method('post')
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label class="form-label" for="name">نام
                                </label>
                                <input name="name" class="form-control" id="name" placeholder="مثلا ناصر" type="text" value="{{ old("name") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="family">نام خانوادگی
                                </label>
                                <input name="family" class="form-control" id="family" placeholder="مثلا جعفری" type="text" value="{{ old("family") }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="expert">تخصص
                                </label>
                                <input name="expert" class="form-control" id="expert" placeholder="مثلا قلب و عروق" type="text" value="{{ old("expert") }}">
                            </div>

                        </div>

                    </div>




            <div class="mb-3">
                <a href="{{ route("commission.index") }}" class="btn btn-warning">
                    برگشت
                    <i class="fas fa-long-arrow-alt-left"></i>
                    <i class="ti ti-arrow-narrow-left"></i>
                </a>
                <button class="btn btn-success"> ذخیره
                    <i class="ti ti-plus"></i>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>




@endsection
