<h5 class="title mb-4">
    لیست تخفیف ها
</h5>

<ul class=" row">

    @foreach ( App\Models\Off::whereActive("1")->get() as $off)
    <li class="mb-3 col-lg-6">
        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
            <input type="radio" class="custom-control-input" name="off_id"
                {{old("off_id",$reserve->off_id)==$off->id?"checked":""}}
            data-p="{{ $off->price}}" id="btnRadio{{$off->id}}"
            value="{{$off->id}}">
            <label class="custom-control-label off_sec" for="btnRadio{{$off->id}}">
                <h6>
                    {{ $off->name}}
                </h6>
                <span class="text text-success text text-larg mr-4">
                    ({{number_format( $off->price)}}) %
                </span>
                <p class="text text-small">
                    {{ $off->info}}

                </p>
            </label>
        </div>
    </li>
    @endforeach
</ul>
