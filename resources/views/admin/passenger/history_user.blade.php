
<div class="col-md-12 mt-5">
    <div class="card mb-2">
        <h5 class="card-header bg-dark text-white">
            مراجعات
            <span class="text  text-">
                {{ $passenger->name }}
                {{ $passenger->family }}
            </span>
            <i class="ti ti-edit"></i>
        </h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">پزشک</th>
                        <th scope="col">وضعیت قبل </th>
                        <th scope="col">وضعیت بعد</th>

                        <th scope="col">نوع </th>
                        <th scope="col">بیشتر  </th>
                        <th scope="col">تاریخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($passenger->histories as $history )
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>
                            {{$history->doctor->name}}
                            {{$history->doctor->family}}
                        </td>
                        <td>
                            @if($history->status_before)
                            {{__("status.". $history->status_before)}}
                            @endif
                        </td>
                        <td>
                            @if($history->status_before)
                            {{__("status.". $history->status_after)}}
                            @endif
                        </td>
                        <td>
                            {{__("history_type.".$history->type)}}
                        </td>
                        <td>
                            {{$history->info}}
                        </td>
                        <td>
                            {{Jdate($history->created_at)->format("Y-m-d H:i:s")}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
