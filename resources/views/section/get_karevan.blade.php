
<option value="">همه موارد </option>

@foreach ($province->karevans as $karevan )
<option value="{{$karevan->id}}">
    {{$karevan->IDS}}
</option>
@endforeach
