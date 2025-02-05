@extends('main.manager')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">تعریف



                کمیسیون

                جدید
                <i class="ti ti-user-plus"></i>
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("commission.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label" for="name">نام
                                </label>
                                <input name="name" class="form-control" id="name" placeholder="" type="text" value="{{ old("name", "کیمسیون پزشکی  استان ".$user->province->name) }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="mobile">استان</label>
                                <select class=" form-control select2" name="province_id" id="province_id" required>
                                    <option value="">انتخاب  کنید </option>
                                    <option value="{{$user->province->id}}" selected>{{$user->province->name}}</option>
                                </select>
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
