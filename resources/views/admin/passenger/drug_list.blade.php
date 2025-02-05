
{{ $user->drugs()->count() }}
<table class="table table-sm">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">نام دارو </th>
            <th scope="col">طریقه مصرف </th>
            @role("admin|doctor|manager")
            <th scope="col">اقدام </th>
            @endrole
        </tr>
    </thead>
    <tbody>

        @foreach ($user->drugs as $drug )

        <tr>
            <th scope="row">{{$loop->iteration}}</th>
            <td>
                {{$drug->brand_en}}-
                {{$drug->name}}
            </td>
            <td> {{$drug->pivot->dose}}</td>
            @role("admin|doctor|manager")
            @if($user->status=="un_review"||$user->status=="under_review")
            <td>
                <i data-id="{{$user->id}}" data-drug="{{$drug->id}}"
                    class="fas fa-trash-alt text text-danger remove_drug"></i>
            </td>
            @endif
            @endrole
        </tr>
        @endforeach

    </tbody>
</table>
