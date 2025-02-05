@extends('main.manager')
@section('content')
@php
$DialysisFile="null";
$attach_EKG="null";
foreach ($attrs as $key=>$val) {
${$key} = $val; // ایجاد متغیر دینامیک
}
@endphp
<div id="info_p">

<div class="content-page wide-md m-auto">
    <div class="nk-block-head nk-block-head-lg wide-xs mx-auto">
        <div class="nk-block-head-content text-center info_p">

        </div>
    </div>
    <!-- .nk-block-head -->
    <div class="nk-block">
        <div class="card info_p">

            <div class="card-body">
            <h2 class="nk-block-title fw-normal">مختصات مسافر </h2>

                <div class="row">
                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            نام:
                        </span>
                        <span class="content small">
                            {{ $user->name }}
                        </span>
                    </div>
                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            نام خانوادگی:
                        </span>
                        <span class="content small">
                            {{ $user->family }}

                        </span>
                    </div>

                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            تاریخ تولد :
                        </span>
                        <span class="content small">
                            {{ $user->BirthDate }}
                        </span>
                    </div>

                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            نام پدر
                            :
                        </span>
                        <span class="content small">
                            {{ $user->fathername }}

                        </span>
                    </div>
                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            کد ملی:
                        </span>
                        <span class="content small">
                            {{ $user->ssn }}

                        </span>
                    </div>

                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            سن:
                        </span>
                        <span class="content small">
                            {{ $user->BirthDate() }}

                        </span>
                    </div>



                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            شماره ی همراه:
                        </span>
                        <span class="content small">
                            {{ $user->cell }}

                        </span>
                    </div>



                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            جنسیت:
                        </span>
                        <span class="content small">
                            {{ $user->Sex() }}

                        </span>
                    </div>

                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            محل تولد:
                        </span>
                        <span class="content small">
                            {{ $user->birthplace }}

                        </span>
                    </div>



                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            وضعیت تاهل:
                        </span>
                        <span class="content small">
                            {{ $user->MarriageStatus() }}

                        </span>
                    </div>

                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            کد زائر:
                        </span>
                        <span class="content small">
                            {{ $user->PassengerCode }}

                        </span>
                    </div>


                    <div class="col-lg-3 col-xsm-6">
                        <span class="title small">
                            شماره کاروان :
                        </span>
                        <span class="content small">
                            {{ $user->KarevanID }}

                        </span>
                    </div>
                </div>

            </div>
        </div>

        <div class="card">
            <div class="card-inner card-inner-xl">
                <div class="row">
                    <div class="col-md-6    ">
                        <div class="card mb-2">
                            <h6 class="card-header bg-primary  ">
                                <span class="text  text-white">
                                    Physical Examination
                                </span>
                                <i class="ti ti-edit"></i>
                            </h6>
                            <div class="card-body">
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Blood Presure Sys:
                                        </span>
                                        <span class="content">
                                            {{$Blood_Presure_Sys}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Blood Presure(Dis)
                                        </span>
                                        <span class="content">
                                            {{$Blood_Presure_Dis}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Height(CM):
                                        </span>
                                        <span class="content">
                                            {{$Height}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Weight(Kg):
                                        </span>
                                        <span class="content">
                                            {{$Weight}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            bmi:
                                        </span>
                                        <span class="content">
                                            {{$bmi}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Pulse Rate:
                                        </span>
                                        <span class="content">
                                            {{$PulseRate}}
                                        </span>
                                    </div>
                                    {{--  <div class="col-lg-6">
                                        <span class="title">
                                            ssssss:
                                        </span>
                                        <span class="content">
                                            {{$Blood_Presure_Sys}}
                                        </span>
                                    </div>  --}}

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6    ">
                        <div class="card mb-2">
                            <h6 class="card-header bg-primary  ">
                                <span class="text  text-white">
                                    Paraclinical Test
                                </span>
                                <i class="ti ti-edit"></i>
                            </h6>
                            <div class="card-body">
                                <div class="row mb-1">
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Hb:
                                        </span>
                                        <span class="content">
                                            {{$Hb}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            bun:
                                        </span>
                                        <span class="content">
                                            {{$bun}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            FBS:
                                        </span>
                                        <span class="content">
                                            {{$FBS}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            PLT:
                                        </span>
                                        <span class="content">
                                            {{$PLT}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            Cr:
                                        </span>
                                        <span class="content">
                                            {{$Cr}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            HbA1C:
                                        </span>
                                        <span class="content">
                                            {{$HbA1C}}
                                        </span>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="title">
                                            MMSE:
                                        </span>
                                        <span class="content">
                                            {{$MMSE}}
                                        </span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card mb-2">
                            <h6 class="card-header  bg-gray ">
                                <span class="text  text-dark">
                                    Other files (include Consultant Physician files)

                                </span>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div id="testimage_list">
                                @include("admin.passenger.testimage_list")
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card mb-2">
                            <h6 class="card-header bg-success  ">
                                <span class="text  text-white">
                                    اطلاعات دارویی
                                </span>
                            </h6>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive" id="drug_list">
                                            @include("admin.passenger.drug_list")
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- .nk-block -->
</div>
</div>

@endsection
