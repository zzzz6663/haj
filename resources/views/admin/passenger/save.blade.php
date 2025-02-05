@role("admin|doctor")
@if($user->status=="un_review"||$user->status=="under_review")
<div class="row">
    <div class="col-lg-12 mb-2">
        <div class="form-group">
            <span class="btn btn-primary save_attr" data-id="{{$user->id}}">
                ذخیره
            </span>
        </div>
    </div>
</div>
@endif
@endrole
