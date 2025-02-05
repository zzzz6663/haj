<table class="table table-sm" id="exam_listes">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">تصویر </th>
            <th scope="col">تاریخ </th>
            @role("admin|doctor|manager")
            <th scope="col">اقدام </th>
            @endrole
        </tr>
    </thead>
    <tbody>
        @foreach ($user->testimages()->where("year",Jdate()->format("Y"))->get() as $testimage )

        <tr class="exam_listes">
            <th scope="row">{{$loop->iteration}}</th>

            <td>

                <a href="{{ $testimage->image() }}" data-lightbox="testimage-" class="">
                    <img src="{{ $testimage->image() }}" width="70px" alt="">
                </a>
            </td>
            <td>
                {{jdate($testimage->created_at)->format("Y-m-d")}}
            </td>
            @role("admin|doctor|manager")

            <td>
                @if($user->status=="un_review"||$user->status=="under_review")
                <i data-user="{{$user->id}}" data-testimage="{{$testimage->id}}"
                    class="fas fa-trash-alt text text-danger remove_testimage"></i>
                    @endif
            </td>
            @endrole

        </tr>
        @endforeach

    </tbody>
</table>
