@extends('main.pdf', ['header_name' => 'داشبورد'])
@section('content')
<div class="card-inner table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">کدزائر </th>
                <th scope="col">شماره کاروان </th>
                <th scope="col">@sortablelink('name',"نام") </th>
                <th scope="col">سن </th>
                <th scope="col">وضعیت </th>

            </tr>
            {{-- --}}
        </thead>
        <tbody>
            @foreach ($users as $user )

            <tr>
                <td scope="row"> {{ $loop->iteration }}</td>
                <td>
                    {{ $user->PassengerCode }}
                </td>
                <td>
                    {{ $user->KarevanID }}
                </td>
                <td>
                    {{ $user->name }}
                    {{ $user->family }}
                </td>
                <td>
                    {{ $user->BirthDate() }}
                </td>


                <td>
                    <span class="text text-{{$user->status_color()}}">
                        {{__("status.". $user->status) }}
                    </span>
                </td>



            </tr>
            @endforeach

        </tbody>
    </table>
    <div>

    </div>
</div>

@endsection
