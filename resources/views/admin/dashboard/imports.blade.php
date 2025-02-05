@extends('main.manager')
@section('content')
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">ورود اطلاعات </h3>
            <div class="nk-block-des text-soft">
            </div>
        </div>
        <!-- .nk-block-head-content -->
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                        class="icon ni ni-menu-alt-r"></em></a>

            </div>
            <!-- .toggle-wrap -->
        </div>
        <!-- .nk-block-head-content -->
    </div>
    <!-- .nk-block-between -->
</div>
<div class="nk-block">

    <div class="card">
        <div class="card-inner">
            <form action="{{route("imports")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-file-excel ionf ml-2 pl-4"></i>
                            آپلود فایل زائران
                        </label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" name="passenger" class="form-file-input"  accept=".xls,.xlsx" id="passenger">
                                <label class="form-file-label" for="passenger">انتخاب فایل</label>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">
                            آپلود
                        </button>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-file-excel ionf ml-2 pl-4"></i>
                            آپلود فایل کاروان
                        </label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" name="karevan" class="form-file-input"  accept=".xls,.xlsx" id="karevan">
                                <label class="form-file-label" for="karevan">انتخاب فایل</label>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">
                            آپلود
                        </button>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-file-excel ionf ml-2 pl-4"></i>
                            آپلود فایل پزشکان
                        </label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" name="doctor" class="form-file-input"  accept=".xls,.xlsx" id="doctor">
                                <label class="form-file-label" for="doctor">انتخاب فایل</label>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">
                            آپلود
                        </button>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-file-excel ionf ml-2 pl-4"></i>
                            آپلود فایل مجموعه
                        </label>
                        <div class="form-control-wrap">
                            <div class="form-file">
                                <input type="file" name="collection" class="form-file-input"  accept=".xls,.xlsx" id="collection">
                                <label class="form-file-label" for="collection">انتخاب فایل</label>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">
                            آپلود
                        </button>
                    </div>
                </div>


            </div>
        </form>

        </div>
    </div>
</div>
@endsection
