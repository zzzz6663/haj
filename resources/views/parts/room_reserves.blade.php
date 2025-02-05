<h5 class="title mb-3">لیست رزروها
هم پوشان
{{--  {{$date}}  --}}
ـــــــــ
<span class="text text-info">
    {{$reserves->count()}}
    مورد
</span>

</h5>
<div class="row">
    <div class="col-12">
        <div class="nk-stepper-step active">


            <ul class="row g-3">
                @foreach ($reserves as  $reserve)
                <div class="col-lg-6 mb-3">
                    <div class="boc">

                        @include('admin.reserve.reserve_detail')
                    </div>
                </div>
                @endforeach

            </ul>
        </div>
    </div>

</div>
