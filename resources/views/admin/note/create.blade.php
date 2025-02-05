@extends('main.manager')
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">
            <h5 class="card-header">تعریف یادداشت جدید
                <i class="ti ti-user-plus"></i>
            </h5>
            <div class="card-body">
                @include('master.error')
                <form action="{{ route("note.store") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">

                        <div class="col-lg-6">

                            <div class="mb-3">
                                <label class="form-label" for="title">نام
                                </label>
                                <input name="title" class="form-control" id="title" placeholder=" " type="text" value="{{ old("title") }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="info">توضیحات
                                </label>
                                <textarea name="info" id="" class="form-control" cols="5" rows="5">{{ old("info") }}</textarea>
                            </div>


                        </div>



                    </div>



                    {{-- <div class="mb-3">
                        <label class="form-label" for="region_id">منطقه</label>
                        <select class="form-select" id="region_id" name="region_id">
                            <option value="">انتخاب کنید </option>
                            @foreach (App\Models\Region::withoutTrashed()->get() as $region )
                            <option {{ old("region_id")==$region->id?"selected":"" }} value="{{ $region->id }}">{{ $region->name }}</option>
                    @endforeach
                    </select>
            </div> --}}

            <div class="mb-3">
                <a href="{{ route("note.index") }}" class="btn btn-warning">
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
