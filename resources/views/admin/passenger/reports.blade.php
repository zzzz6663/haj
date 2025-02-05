@extends('main.manager')
@section('content')



<div class="card card-bordered card-preview">
    <div class="card-inner">
        <ul class="nav nav-tabs mt-n3" >
            <li class="nav-item" role="presentation">
                <a class="nav-link {{request("type")=="t1"?" active ":""}}" href="{{route("reports",['type'=>"t1"])}}"  >جامع</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{request("type")=="t2"?" active ":""}}" href="{{route("reports",['type'=>"t2"])}}"  >استانی</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{request("type")=="t3"?" active ":""}}" href="{{route("reports",['type'=>"t3"])}}"  >نمودار</a>
            </li>
            {{--  <li class="nav-item" role="presentation">
                <a class="nav-link {{request("type")=="t3"?" active ":""}}" href="{{route("reports",['type'=>"t3"])}}"  >اطلاع رسانی ها</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link {{request("type")=="t4"?" active ":""}} " href="{{route("reports",['type'=>"t4"])}}" >اتصال</a>
            </li>  --}}
        </ul>
        <div class="tab-content">

            @if(request("type")=="t1")
            <div class="tab-pane  {{request("type")=="t1"?" active show":""}}" id="tabItem1" role="tabpanel">
                @include("admin.passenger.t1")
              </div>
            @endif
            @if(request("type")=="t2")
            <div class="tab-pane {{request("type")=="t2"?" active show":""}}" id="tabItem2" role="tabpanel">
                @include("admin.passenger.t2")
              </div>
            @endif

            @if(request("type")=="t3")
            <div class="tab-pane {{request("type")=="t3"?" active show":""}}" id="tabItem2" role="tabpanel">
                @include("admin.passenger.t3")
              </div>
            @endif
            {{--  @if(request("type")=="t3")
            <div class="tab-pane {{request("type")=="t3"?" active show":""}} " id="tabItem3" role="tabpanel">
                t3
            </div>
            @endif
            @if(request("type")=="t4")
            <div class="tab-pane {{request("type")=="t5"?" active show":""}}" id="tabItem4" role="tabpanel">
                t4
             </div>
            @endif  --}}



        </div>
    </div>
</div>




@endsection
