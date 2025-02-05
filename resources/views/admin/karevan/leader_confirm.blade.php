@extends('main.manager')
@section('content')


<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">
                وضعیت

                راهنما
                {{ $user->name }}
                {{ $user->family }}
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("leader.confirm",$user->id) }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    @method('post')
                   <div class="row">
                    <div class="col-lg-6">

                        <div class="mb-3">
                            <label class="form-label" for="register_deadline">نوع
                            </label>
                            <select name="confirm" class="form-control" id="">
                                <option value="">انتخاب کنید</option>
                                <option value="1">تایید</option>
                                <option value="">رد</option>
                            </select>
                        </div>
                        {{--  <div class="mb-3">
                            <label class="form-label" for="reason">
                                توضیحات
                                تایید یا رد
                            </label>
                            <textarea name="reason" id="reason" class="form-control" cols="30" rows="3">{{ old("reason",$user->reason) }}</textarea>
                        </div>  --}}
                    </div>

                   </div>
                    <div class="mb-3">
                        <a href="{{ route("tour.index") }}" class="btn btn-warning">
                            برگشت
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
