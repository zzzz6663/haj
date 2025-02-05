@foreach ($drugs as $drug )
<option value="{{$drug->id}}">
    {{$drug->brand_en}}-
    {{$drug->brand_fa}}-
    {{$drug->name}}-
    {{$drug->generic}}-
</option>
@endforeach
