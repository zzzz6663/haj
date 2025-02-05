
<div class="col-md-12 mt-5">
    <div class="card mb-2">
        <h5 class="card-header bg-dark text-white">
            مراجعات
            <span class="text  text-">
                {{ $karevan->IDS }}
                @if($karevan->province)
                {{ $karevan->province->name }}

                @endif
            </span>
            <i class="ti ti-edit"></i>
        </h5>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">ادمین</th>
                        <th scope="col">پزشک قبل  </th>
                        <th scope="col">پزشک  بعد</th>
                        <th scope="col">تاریخ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karevan->logs as $log )
                    @php
                        $before=App\Models\User::find( $log->before);
                        $after=App\Models\User::find( $log->after);
                    @endphp
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>
                            {{$log->user->name}}
                            {{$log->user->family}}
                        </td>
                        <td>
                           @if( $before)
                            {{ $before->name}}
                            {{ $before->family}}
                           @endif
                        </td>
                        <td>
                            @if( $after)
                            {{ $after->name}}
                            {{ $after->family}}
                           @endif
                        </td>
                        <td>
                            {{Jdate($log->created_at)->format("Y-m-d H:i:s")}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
