@role("admin")
@foreach($province->cities()->whereActive(1)->get() as $citei)
    <option value="{{$citei->id}}">{{$citei->name}}</option>
@endforeach
@endrole
@role("seller|customer|leader")
@foreach($province->cities as $citei)
    <option value="{{$citei->id}}">{{$citei->name}}</option>
@endforeach
@endrole
