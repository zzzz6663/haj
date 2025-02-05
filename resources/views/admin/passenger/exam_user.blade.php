@extends('main.manager')
@section('content')

@php
$DialysisFile="null";
$attach_EKG="null";
foreach ($attrs as $key=>$val) {
${$key} = $val; // ایجاد متغیر دینامیک
}
@endphp
<div class="row" id="exam_u">
    <div class="col-md-12 rtl_sec">
        <div class="card mb-2">
            <h6 class="card-header">
                روند معاینه زائر
                <span class="text  text-success">
                    {{ $user->name }}
                    {{ $user->family }}
                </span>


                <i class="ti ti-edit"></i>
            </h6>

            <div class="card-body">
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
                            شماره کاروان   :
                        </span>
                        <span class="content small">
                            {{ $user->KarevanID }}

                        </span>
                    </div>












                </div>

            </div>
        </div>
    </div>

    <div class="col-md-6  ">
        <div class="card mb-2">
            <h6 class="card-header bg-primary  ">
                <span class="text  text-white">
                    Paraclinical Test
                </span>
                <i class="ti ti-edit"></i>
            </h6>
            <div class="card-body" >
                <form action="" class="ph_form">
                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <div class="form-group w-100 ">
                                <label class="form-label fs-4" for="Hb">
                              <h6 class="text text-primary  ">
                                Hb
                              </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req" name="Hb" min="6.3" max="25"
                                        step="0.01" data-min="11" data-max="17" id="Hb" placeholder="min:6.3  max:25"
                                        value="{{$Hb??""}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group w-100">
                                <label class="form-label fs-4" for="bun">
                                    <h6 class="text text-primary  ">
                                        bun
                                    </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req" name="bun" min="5" max="60"  placeholder="min:5  max:60"
                                        data-min="6" data-max="30" id="bun" value="{{$bun??""}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group w-100">
                                <label class="form-label fs-4" for="FBS">
                                <h6 class="text text-primary  ">
                                    FBS
                                </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req" name="FBS" min="70" max="400"
                                        data-min="80" data-max="120" id="FBS" value="{{$FBS??""}}"  placeholder="min:70  max:400">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group w-100">
                                <label class="form-label fs-4" for="PLT">
                                    <h6 class="text text-primary  ">
                                        PLT
                                    </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req" name="PLT" min="100" max="650"  placeholder="min:100  max:650"
                                        data-min="150" data-max="450" id="PLT" value="{{$PLT??""}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="form-group w-100">
                                <label class="form-label fs-4" for="Cr">
                                   <h6 class="text text-primary  ">
                                    Cr
                                   </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req" name="Cr" min="0.6" max="3.5"
                                        step="0.01" data-min="0.7" data-max="1.3" id="Cr"   placeholder="min:0.6  max:3.5"
                                        value="{{$Cr??""}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 mb-2">
                            <div class="form-group w-100">
                                <label class="form-label fs-4" for="HbA1C">
                                   <h6 class="text text-primary  ">
                                    HbA1C
                                   </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req" name="HbA1C" min="4.5" max="13"
                                        step="0.01" data-min="5" data-max="8.5" id="HbA1C" placeholder="min:4.5  max:13"
                                        value="{{$HbA1C??""}}">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 ">
                            <div class="form-group w-100">
                                <label class="form-label fs-4" for="MMSE">
                                    <h6 class="text text-primary  ">
                                        MMSE
                                    </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control mmse {{$user->BirthDate()>65?"req":""}} " name="MMSE" min="1" max="30"
                                        data-min="24" data-max="30" id="MMSE" value="{{$MMSE??""}}" placeholder="min:1  max:23">
                                </div>
                            </div>
                        </div>
{{--
                        @if($user->BirthDate()>50)

                        @endif  --}}


                    </div>


                    <div id="scr">
                        @include("admin.passenger.save")
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-6    ">
        <div class="card mb-2">
            <h6 class="card-header bg-primary  ">
                <span class="text  text-white">
                    Physical Examination
                </span>
                <i class="ti ti-edit"></i>
            </h6>
            <div class="card-body">
                <form action="" class="ph_form">
                    <div class="row mb-1">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Blood_Presure_Sys">
                                   <h6 class="text text-primary  ">
                                    Blood Presure(Sys)
                                   </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req req_blue" name="Blood_Presure_Sys" min="70"
                                        max="250" data-min="110" data-max="130" id="Blood_Presure_Sys" placeholder="min:70  max:250"
                                        value="{{$Blood_Presure_Sys??""}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Blood_Presure_Dis">
                                  <h6 class="text text-primary  ">
                                    Blood Presure(Dis)
                                  </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req req_blue" name="Blood_Presure_Dis" min="50"
                                        max="120" data-min="75" data-max="90" id="Blood_Presure_Dis" placeholder="min:50  max:120"
                                        value="{{$Blood_Presure_Dis??""}}">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Height">
                                 <h6 class="text text-primary  ">
                                    Height(CM)
                                 </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control bmi req req_blue " name="Height" min="20" max="100"
                                        data-min="60" data-max="80" id="Height" placeholder="cm"
                                        value="{{$Height??""}}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label fs-4" for="Weight">
                                    <h6 class="text text-primary  ">
                                        Weight(Kg)
                                    </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control bmi req req_blue" name="Weight" min="20" max="100"
                                        data-min="60" data-max="80" id="Weight" placeholder="Kg"
                                        value="{{$Weight??""}}">
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label fs-4" for="s">
                                   <h6 class="text text-primary  ">
                                    BMI
                                   </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control req req_blue " value="{{$bmi??""}}" name="bmi"
                                        id="BMI">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-label fs-4" for="PulseRate">
                                   <h6 class="text text-primary  ">
                                    Pulse Rate
                                   </h6>
                                </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control ragne req req_blue" name="PulseRate" min="20" max="100" placeholder="min:20  max:100"
                                        data-min="60" data-max="80" id="PulseRate" value="{{$PulseRate??""}}">
                                </div>
                            </div>
                        </div>

                    </div>


                    @include("admin.passenger.save")
                </form>
            </div>
        </div>
    </div>





    <div class="col-md-12 pari_s radio_sec" id="para_c_test">
        <div class="card mb-2">
            <h6 class="card-header bg-warning  ">
                <span class="text  text-white">
                    Paracinical Test - Continue
                </span>
                <i class="ti ti-edit"></i>
            </h6>
            <div class="card-body">
                <form action="" class="ph_form">
                    <div class="row ">
                        <div class="col-lg-4 mb-2">
                            <div class="form-group">
                                <h6 class="text text-warning">
                                    EKG
                                </h6>
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio"  class="custom-control-input requis req" name="EKG"
                                                {{(isset($EKG)&&$EKG=="normal" )?"checked":""}} id="EKG1"
                                                value="normal">
                                            <label class="custom-control-label" for="EKG1">
                                                طبیعی</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio"  class="custom-control-input  requis req " name="EKG"
                                                {{(isset($EKG)&&$EKG=="Abnormal" )?"checked":""}} id="EKG2"
                                                value="Abnormal">
                                            <label class="custom-control-label" for="EKG2">
                                                غیر طبیعی</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                            <input type="radio"   class="custom-control-input  requis req" name="EKG"
                                                {{(isset($EKG)&&$EKG=="Didnot_do_it" )?"checked":""}} id="EKG3"
                                                value="Didnot_do_it">
                                            <label class="custom-control-label" for="EKG3">
                                                انجام نداده</label>
                                        </div>
                                    </li>
                                    <li style="display: {{isset($EKG)&&$EKG =="Abnormal"?"":"none"}}" id="EKG_attach">
                                        <div class="form-group">
                                            <div class="form-control-wrap d-flex justify-content-between">
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input" name="attach_EKG"
                                                        id="customFile" accept="image/*">
                                                    <label class="form-file-label" for="customFile">انتخاب فایل</label>
                                                </div>
                                                <div class="mr-2 pr-2">
                                                    <a href="{{ $user->attr_attach($attach_EKG) }}"
                                                        data-lightbox="gallery-{{ $user->id }}" class="">
                                                        تصویر
                                                    </a>
                                                </div>
                                            </div>


                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @if ($user->Sex==2 && $user->BirthDate()<50)
                         <div class="col-lg-4 mb-2">
                            <div class="form-group">
                                <h6 class="text text-warning">
                                    PregnencyTest
                                </h6>
                                <ul class="custom-control-group">
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio"  class="custom-control-input requis req" name="PregnencyTest"
                                                {{(isset($PregnencyTest)&&$PregnencyTest=="positive" )?"checked":""}}
                                                id="PregnencyTest1" value="positive">
                                            <label class="custom-control-label" for="PregnencyTest1">

                                                مثبت </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                            <input type="radio"  class="custom-control-input requis req" name="PregnencyTest"
                                                {{(isset($PregnencyTest)&&$PregnencyTest=="Negative" )?"checked":""}}
                                                id="PregnencyTest2" value="Negative">
                                            <label class="custom-control-label" for="PregnencyTest2">
                                                منفی</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div
                                            class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                            <input type="radio"   class="custom-control-input requis req" name="PregnencyTest"
                                                {{(isset($PregnencyTest)&&$PregnencyTest=="Didnot_do_it"
                                                )?"checked":""}} id="PregnencyTest3" value="Didnot_do_it">
                                            <label class="custom-control-label" for="PregnencyTest3">
                                                انجام نداده</label>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                    </div>
                    @endif


                    <div class="col-lg-4 mb-2">
                        <div class="form-group">
                            <h6 class="text text-warning">
                                Opium Test
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="Opium_Test"
                                            {{(isset($Opium_Test)&&$Opium_Test=="positive" )?"checked":""}}
                                            id="Opium_Test1" value="positive">
                                        <label class="custom-control-label" for="Opium_Test1">

                                            مثبت </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="Opium_Test"
                                            {{(isset($Opium_Test)&&$Opium_Test=="Negative" )?"checked":""}} id="Opium_Test2"
                                            value="Negative">
                                        <label class="custom-control-label" for="Opium_Test2">
                                            منفی</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                        <input type="radio"  class="custom-control-input requis req" name="Opium_Test"
                                            {{(isset($Opium_Test)&&$Opium_Test=="Didnot_do_it" )?"checked":""}}
                                            id="Opium_Test3" value="Didnot_do_it">
                                        <label class="custom-control-label" for="Opium_Test3">
                                            انجام نداده</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>



                    <div class="col-lg-4 mb-2">
                        <div class="form-group">
                            <h6 class="text text-warning">
                                CXR
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="CXR"
                                            {{(isset($CXR)&&$CXR=="normal" )?"checked":""}} id="CXR1" value="normal">
                                        <label class="custom-control-label" for="CXR1">
                                            طبیعی</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="CXR"
                                            {{(isset($CXR)&&$CXR=="Abnormal" )?"checked":""}} id="CXR2"
                                            value="Abnormal">
                                        <label class="custom-control-label" for="CXR2">
                                            غیر طبیعی</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                        <input type="radio"  class="custom-control-input requis req" name="CXR"
                                            {{(isset($CXR)&&$CXR=="Didnot_do_it" )?"checked":""}} id="CXR3"
                                            value="Didnot_do_it">
                                        <label class="custom-control-label" for="CXR3">
                                            انجام نداده</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>




                    <div class="col-lg-4 mb-2">
                        <div class="form-group">
                            <h6 class="text text-warning">
                                HBS-Ag
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="HBS_Ag"
                                            {{(isset($HBS_Ag)&&$HBS_Ag=="positive" )?"checked":""}} id="HBS_Ag1"
                                            value="positive">
                                        <label class="custom-control-label positive" for="HBS_Ag1">
                                            مثبت</label>
                                    </div>
                                </li>
                                <li style="margin-left: 10px">
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="HBS_Ag"
                                            {{(isset($HBS_Ag)&&$HBS_Ag=="Negative" )?"checked":""}} id="HBS_Ag2"
                                            value="Negative">
                                        <label class="custom-control-label Negative" for="HBS_Ag2">
                                            منفی</label>
                                    </div>
                                </li>
                                <li style="margin-left: 30px">
                                    <div
                                        class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                        <input type="radio"  class="custom-control-input requis req" name="HBS_Ag"
                                            {{(isset($HBS_Ag)&&$HBS_Ag=="Didnot_do_it" )?"checked":""}} id="HBS_Ag3"
                                            value="Didnot_do_it">
                                        <label class="custom-control-label" for="HBS_Ag3">
                                            انجام نداده</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-4 ">
                        <div class="form-group">
                            <h6 class="text text-warning">
                                Second Opium Test
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="SecondOpiumTest"
                                            {{(isset($SecondOpiumTest)&&$SecondOpiumTest=="positive" )?"checked":""}}
                                            id="SecondOpiumTest1" value="positive">
                                        <label class="custom-control-label positive" for="SecondOpiumTest1">
                                            مثبت</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="SecondOpiumTest"
                                            {{(isset($SecondOpiumTest)&&$SecondOpiumTest=="Negative" )?"checked":""}}
                                            id="SecondOpiumTest2" value="Negative">
                                        <label class="custom-control-label Negative" for="SecondOpiumTest2">
                                            منفی</label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="custom-control custom-control-sm custom-radio custom-control-pro checked">
                                        <input type="radio"  class="custom-control-input requis req" name="SecondOpiumTest"
                                            {{(isset($SecondOpiumTest)&&$SecondOpiumTest=="Didnot_do_it"
                                            )?"checked":""}} id="SecondOpiumTest3" value="Didnot_do_it">
                                        <label class="custom-control-label" for="SecondOpiumTest3">
                                            انجام نداده</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4 mb-2">
                        <div class="form-group">
                            <h6 class="text text-warning">
                                Occult Blood
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="Occult_Blood"
                                            {{(isset($Occult_Blood)&&$Occult_Blood=="positive" )?"checked":""}}
                                            id="Occult_Blood1" value="positive">
                                        <label class="custom-control-label positive" for="Occult_Blood1">
                                            مثبت</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio"  class="custom-control-input requis req" name="Occult_Blood"
                                            {{(isset($Occult_Blood)&&$Occult_Blood=="Negative" )?"checked":""}}
                                            id="Occult_Blood2" value="Negative">
                                        <label class="custom-control-label Negative" for="Occult_Blood2">
                                            منفی</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro ">
                                        <input type="radio"  {{(isset($Occult_Blood)&&$Occult_Blood=="Didnot_do_it"
                                            )?"checked":""}} class="custom-control-input requis req" name="Occult_Blood"
                                            id="Occult_Blood3" value="Didnot_do_it">
                                        <label class="custom-control-label" for="Occult_Blood3">
                                            انجام نداده</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>




            </div>
            @include("admin.passenger.save")
            </form>
        </div>
    </div>
</div>







<div class="col-md-12 pari_s" id="checl_boxy">
    <div class="card mb-2">
        <h6 class="card-header bg-danger ">
            <span class="text  text-white">
                Positive Medical History
            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            <form action="" class="ph_form">
                <div class="row ">
                    <div class="col-lg-8   mb-2">
                        <div class="form-group ">
                            <h6 class="text text-danger cheky">
                                Cardio Vascular
                            </h6>
                            <ul class=" border border-danger p-2 mb-2   custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="CHF">
                                        <input type="checkbox" class="custom-control-input" {{(isset($CHF)&&$CHF=="1"
                                            )?"checked":""}} name="CHF" id="CHF2" value="1">
                                        <label class="custom-control-label" for="CHF2"> CHF</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="IHD">
                                        <input type="checkbox" class="custom-control-input" {{(isset($IHD)&&$IHD=="1"
                                            )?"checked":""}} name="IHD" id="IHD2" value="1">
                                        <label class="custom-control-label" for="IHD2"> IHD</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HTN">
                                        <input type="checkbox" class="custom-control-input" {{(isset($HTN)&&$HTN=="1"
                                            )?"checked":""}} name="HTN" id="HTN2" value="1">
                                        <label class="custom-control-label" for="HTN2"> HTN</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="MI">
                                        <input type="checkbox" class="custom-control-input" {{(isset($MI)&&$MI=="1"
                                            )?"checked":""}} name="MI" id="MI2" value="1">
                                        <label class="custom-control-label" for="MI2"> MI</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Arrhythmia">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Arrhythmia)&&$Arrhythmia=="1" )?"checked":""}} name="Arrhythmia"
                                            id="Arrhythmia2" value="1">
                                        <label class="custom-control-label" for="Arrhythmia2"> Arrhythmia</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="DVT">
                                        <input type="checkbox" class="custom-control-input" {{(isset($DVT)&&$DVT=="1"
                                            )?"checked":""}} name="DVT" id="DVT2" value="1">
                                        <label class="custom-control-label" for="DVT2"> DVT</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="CABG">
                                        <input type="checkbox" class="custom-control-input" {{(isset($CABG)&&$CABG=="1"
                                            )?"checked":""}} name="CABG" id="CABG2" value="1">
                                        <label class="custom-control-label" for="CABG2"> CABG</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Cardiac_arrhythmia">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Cardiac_arrhythmia)&&$Cardiac_arrhythmia=="1" )?"checked":""}}
                                            name="Cardiac_arrhythmia" id="Cardiac_arrhythmia2" value="1">
                                        <label class="custom-control-label" for="Cardiac_arrhythmia2"> Cardiac
                                            arrhythmia</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Angioplasty ">
                                        <input type="checkbox" class="custom-control-input" {{(isset($Angioplasty
                                            )&&$Angioplasty=="1" )?"checked":""}} name="Angioplasty " id="Angioplasty 2"
                                            value="1">
                                        <label class="custom-control-label" for="Angioplasty 2"> Angioplasty </label>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-4 mb-2">
                        <div class="form-group  ml-5 " style="   ">
                            <h6 class="text text-danger cheky">
                                dermatology
                            </h6>
                            <ul class="border border-danger p-2 mb-2  custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Psoriasis">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Psoriasis)&&$Psoriasis=="1" )?"checked":""}} name="Psoriasis"
                                            id="Psoriasis2" value="1">
                                        <label class="custom-control-label" for="Psoriasis2">
                                            Psoriasis</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Mycoses">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Mycoses)&&$Mycoses=="1" )?"checked":""}} name="Mycoses"
                                            id="Mycoses2" value="1">
                                        <label class="custom-control-label" for="Mycoses2"> Mycoses</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="skin_fungus">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($skin_fungus)&&$skin_fungus=="1" )?"checked":""}}
                                            name="skin_fungus" id="skin_fungus2" value="1">
                                        <label class="custom-control-label" for="skin_fungus2"> skin fungus</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Acne">
                                        <input type="checkbox" class="custom-control-input" {{(isset($Acne)&&$Acne=="1"
                                            )?"checked":""}} name="Acne" id="Acne2" value="1">
                                        <label class="custom-control-label" for="Acne2"> Acne</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Shingles">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Shingles)&&$Shingles=="1" )?"checked":""}} name="Shingles"
                                            id="Shingles2" value="1">
                                        <label class="custom-control-label" for="Shingles2"> Shingles</label>
                                    </div>
                                </li>


                                {{--  <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Shingles">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Shingles)&&$Shingles=="1" )?"checked":""}} name="Shingles"
                                            id="Shingles2" value="1">
                                        <label class="custom-control-label" for="Shingles2"> Shingles</label>
                                    </div>
                                </li>  --}}


                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-4   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Autoimmune disease
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Graves ">
                                        <input type="checkbox" class="custom-control-input" {{(isset($Graves
                                            )&&$Graves=="1" )?"checked":""}} name="Graves " id="Graves 2" value="1">
                                        <label class="custom-control-label" for="Graves 2">
                                            Graves </label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="rheumatoid_arthritis">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($rheumatoid_arthritis)&&$rheumatoid_arthritis=="1" )?"checked":""}}
                                            name="rheumatoid_arthritis" id="rheumatoid_arthritis2" value="1">
                                        <label class="custom-control-label" for="rheumatoid_arthritis2"> rheumatoid
                                            arthritis</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Celiac">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Celiac)&&$Celiac=="1" )?"checked":""}} name="Celiac" id="Celiac2"
                                            value="1">
                                        <label class="custom-control-label" for="Celiac2"> Celiac</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Hashimoto_thyroiditis">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Hashimoto_thyroiditis)&&$Hashimoto_thyroiditis=="1"
                                            )?"checked":""}} name="Hashimoto_thyroiditis" id="Hashimoto_thyroiditis2"
                                            value="1">
                                        <label class="custom-control-label" for="Hashimoto_thyroiditis2"> Hashimoto s
                                            thyroiditis</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Nerurology
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="MultipleSclerosis">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($MultipleSclerosis)&&$MultipleSclerosis=="1" )?"checked":""}}
                                            name="MultipleSclerosis" id="MultipleSclerosis2" value="1">
                                        <label class="custom-control-label" for="MultipleSclerosis2">
                                            MultipleSclerosis</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="CVA">
                                        <input type="checkbox" class="custom-control-input" {{(isset($CVA)&&$CVA=="1"
                                            )?"checked":""}} name="CVA" id="CVA2" value="1">
                                        <label class="custom-control-label" for="CVA2"> CVA</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="TIA">
                                        <input type="checkbox" class="custom-control-input" {{(isset($TIA)&&$TIA=="1"
                                            )?"checked":""}} name="TIA" id="TIA2" value="1">
                                        <label class="custom-control-label" for="TIA2"> TIA</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Epilepsy">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Epilepsy)&&$Epilepsy=="1" )?"checked":""}} name="Epilepsy"
                                            id="Epilepsy2" value="1">
                                        <label class="custom-control-label" for="Epilepsy2"> Epilepsy</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Alzheimer">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Alzheimer)&&$Alzheimer=="1" )?"checked":""}} name="Alzheimer"
                                            id="Alzheimer2" value="1">
                                        <label class="custom-control-label" for="Alzheimer2"> Alzheimer</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 mb-2">

                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Hormone
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="DM">
                                        <input type="checkbox" class="custom-control-input" {{(isset($DM)&&$DM=="1"
                                            )?"checked":""}} name="DM" id="DM2" value="1">
                                        <label class="custom-control-label" for="DM2"> DM</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HyperThyroidism">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($HyperThyroidism)&&$HyperThyroidism=="1" )?"checked":""}}
                                            name="HyperThyroidism" id="HyperThyroidism2" value="1">
                                        <label class="custom-control-label" for="HyperThyroidism2">
                                            HyperThyroidism</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HypoThyroidism">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($HypoThyroidism)&&$HypoThyroidism=="1" )?"checked":""}}
                                            name="HypoThyroidism" id="HypoThyroidism2" value="1">
                                        <label class="custom-control-label" for="HypoThyroidism2">
                                            HypoThyroidism</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Hyperlipidemia">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Hyperlipidemia)&&$Hyperlipidemia=="1" )?"checked":""}}
                                            name="Hyperlipidemia" id="Hyperlipidemia2" value="1">
                                        <label class="custom-control-label" for="Hyperlipidemia2">
                                            Hyperlipidemia</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Infectious
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="TB">
                                        <input type="checkbox" class="custom-control-input" {{(isset($TB)&&$TB=="1"
                                            )?"checked":""}} name="TB" id="TB2" value="1">
                                        <label class="custom-control-label" for="TB2"> TB</label>
                                    </div>
                                </li>



                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Psychiatry
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="PTSD">
                                        <input type="checkbox" class="custom-control-input" {{(isset($PTSD)&&$PTSD=="1"
                                            )?"checked":""}} name="PTSD" id="PTSD2" value="1">
                                        <label class="custom-control-label" for="PTSD2"> PTSD</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="PersonalityDisorder">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($PersonalityDisorder)&&$PersonalityDisorder=="1" )?"checked":""}}
                                            name="PersonalityDisorder" id="PersonalityDisorder2" value="1">
                                        <label class="custom-control-label" for="PersonalityDisorder2">
                                            PersonalityDisorder</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="MoodDisorder">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($MoodDisorder)&&$MoodDisorder=="1" )?"checked":""}}
                                            name="MoodDisorder" id="MoodDisorder2" value="1">
                                        <label class="custom-control-label" for="MoodDisorder2">
                                            MoodDisorder</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Substance_Use_Disorder">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Substance_Use_Disorder)&&$Substance_Use_Disorder=="1"
                                            )?"checked":""}} name="Substance_Use_Disorder" id="Substance_Use_Disorder2"
                                            value="1">
                                        <label class="custom-control-label" for="Substance_Use_Disorder2"> Substance
                                            Use_Disorder(Addiction) </label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Depresseion">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Depresseion)&&$Depresseion=="1" )?"checked":""}}
                                            name="Depresseion" id="Depresseion2" value="1">
                                        <label class="custom-control-label" for="Depresseion2"> Depresseion</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Mania">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Mania)&&$Mania=="1" )?"checked":""}} name="Mania" id="Mania2"
                                            value="1">
                                        <label class="custom-control-label" for="Mania2"> Mania</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Dementia">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Dementia)&&$Dementia=="1" )?"checked":""}} name="Dementia"
                                            id="Dementia2" value="1">
                                        <label class="custom-control-label" for="Dementia2"> Dementia</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="OCD">
                                        <input type="checkbox" class="custom-control-input" {{(isset($OCD)&&$OCD=="1"
                                            )?"checked":""}} name="OCD" id="OCD2" value="1">
                                        <label class="custom-control-label" for="OCD2"> OCD</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="SleepDisorder">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($SleepDisorder)&&$SleepDisorder=="1" )?"checked":""}}
                                            name="SleepDisorder" id="SleepDisorder2" value="1">
                                        <label class="custom-control-label" for="SleepDisorder2">
                                            SleepDisorder</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Psychosis">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Psychosis)&&$Psychosis=="1" )?"checked":""}} name="Psychosis"
                                            id="Psychosis2" value="1">
                                        <label class="custom-control-label" for="Psychosis2"> Psychosis</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Hematology_Oncology">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Hematology_Oncology)&&$Hematology_Oncology=="1" )?"checked":""}}
                                            name="Hematology_Oncology" id="Hematology_Oncology2" value="1">
                                        <label class="custom-control-label" for="Hematology_Oncology2">
                                            Anxiety(Panic, GAD, ...)
                                            Hematology&Oncology</label>
                                    </div>
                                </li>



                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Hematology&Oncology
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Anemia">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Anemia)&&$Anemia=="1" )?"checked":""}} name="Anemia" id="Anemia2"
                                            value="1">
                                        <label class="custom-control-label" for="Anemia2"> Anemia</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Thalassemia">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Thalassemia)&&$Thalassemia=="1" )?"checked":""}}
                                            name="Thalassemia" id="Thalassemia2" value="1">
                                        <label class="custom-control-label" for="Thalassemia2"> Thalassemia</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Malignancy">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Malignancy)&&$Malignancy=="1" )?"checked":""}} name="Malignancy"
                                            id="Malignancy2" value="1">
                                        <label class="custom-control-label" for="Malignancy2"> Malignancy</label>
                                    </div>
                                </li>



                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Gastroenterology
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Hepatits">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Hepatits)&&$Hepatits=="1" )?"checked":""}} name="Hepatits"
                                            id="Hepatits2" value="1">
                                        <label class="custom-control-label" for="Hepatits2"> Hepatits</label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="IBS">
                                        <input type="checkbox" class="custom-control-input" {{(isset($IBS)&&$IBS=="1"
                                            )?"checked":""}} name="IBS" id="IBS2" value="1">
                                        <label class="custom-control-label" for="IBS2"> IBS</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="IBD">
                                        <input type="checkbox" class="custom-control-input" {{(isset($IBD)&&$IBD=="1"
                                            )?"checked":""}} name="IBD" id="IBD2" value="1">
                                        <label class="custom-control-label" for="IBD2"> IBD</label>
                                    </div>
                                </li>
                            </ul>
                        </div>


                    </div>

                    <div class="col-lg-2   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Musculoskeletal
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="PhysicalDisability">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($PhysicalDisability)&&$PhysicalDisability=="1" )?"checked":""}}
                                            name="PhysicalDisability" id="PhysicalDisability2" value="1">
                                        <label class="custom-control-label" for="PhysicalDisability2">
                                            PhysicalDisability</label>
                                    </div>
                                </li>

                                {{--
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Amputation">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Amputation)&&$Amputation=="1" )?"checked":""}} name="Amputation"
                                            id="Amputation2" value="1">
                                        <label class="custom-control-label" for="Amputation2"> Amputation</label>
                                    </div>
                                </li> --}}

                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-3   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                pulmonary
                            </h6>

                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="COPD">
                                        <input type="checkbox" class="custom-control-input" {{(isset($COPD)&&$COPD=="1"
                                            )?"checked":""}} name="COPD" id="COPD2" value="1">
                                        <label class="custom-control-label" for="COPD2"> COPD</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Asthma">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Asthma)&&$Asthma=="1" )?"checked":""}} name="Asthma" id="Asthma2"
                                            value="1">
                                        <label class="custom-control-label" for="Asthma2"> Amputation</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>


                    <div class="col-lg-3 mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                Other
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="SurgeryBackground">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($SurgeryBackground)&&$SurgeryBackground=="1" )?"checked":""}}
                                            name="SurgeryBackground" id="SurgeryBackground2" value="1">
                                        <label class="custom-control-label" for="SurgeryBackground2">
                                            SurgeryBackground</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9   mb-2">
                        <div class="form-group">
                            <h6 class="text text-danger cheky">
                                UROLOGY/Nephrology
                            </h6>
                            <ul class="border border-danger p-2 mb-2 custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="DIALYSIS">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($DIALYSIS)&&$DIALYSIS=="1" )?"checked":""}} name="DIALYSIS"
                                            id="DIALYSIS2" value="1">
                                        <label class="custom-control-label" for="DIALYSIS2"> DIALYSIS</label>
                                    </div>
                                </li>
                                <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HBSAntiGen">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($HBSAntiGen)&&$HBSAntiGen=="1" )?"checked":""}} name="HBSAntiGen"
                                            id="HBSAntiGen2" value="1">
                                        <label class="custom-control-label" for="HBSAntiGen2"> HBSAntiGen</label>
                                    </div>
                                </li>
                                <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HBSAntiBodies">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($HBSAntiBodies)&&$HBSAntiBodies=="1" )?"checked":""}}
                                            name="HBSAntiBodies" id="HBSAntiBodies2" value="1">
                                        <label class="custom-control-label" for="HBSAntiBodies2">
                                            HBSAntiBodies</label>
                                    </div>
                                </li>




                                <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HIV1_2">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($HIV1_2)&&$HIV1_2=="1" )?"checked":""}} name="HIV1_2" id="HIV1_22"
                                            value="1">
                                        <label class="custom-control-label" for="HIV1_22"> HIV1&2</label>
                                    </div>
                                </li>




                                <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HCV">
                                        <input type="checkbox" class="custom-control-input" {{(isset($HCV)&&$HCV=="1"
                                            )?"checked":""}} name="HCV" id="HCV2" value="1">
                                        <label class="custom-control-label" for="HCV2"> HCV</label>
                                    </div>
                                </li>



                                <li class="more_dia" id="dia_sc" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="form-group rtl_sec">
                                        <div class="form-control-wrap d-flex justify-content-between ">
                                            <div class="form-file">
                                                <input type="file" class="form-file-input" name="DialysisFile"
                                                    id="DialysisFile">
                                                <label class="form-file-label" for="DialysisFile">انتخاب
                                                    فایل</label>
                                            </div>
                                            <div class="mr-2 pr-2">
                                                <a href="{{ $user->attr_attach($DialysisFile) }}"
                                                    data-lightbox="gallery-33" class="">
                                                    تصویر
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>


                                {{--  <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="form-group">
                                        <label class="form-label fs-4" for="CR">
                                            CR
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control ragne req" name="CR" min="80"
                                                data-min="70" max="120" data-max="140" id="CR" placeholder="0.2 20"
                                                value="{{$CR??""}}">
                                        </div>
                                    </div>
                                </li>  --}}

                                <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="form-group">
                                        <label class="form-label fs-4" for="WeeklyNumberOfDialysis">
                                            WeeklyNumberOfDialysis
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control ragne "
                                                name="WeeklyNumberOfDialysis" min="80" data-min="70" max="120"
                                                data-max="140" id="WeeklyNumberOfDialysis" placeholder=""
                                                value="{{$WeeklyNumberOfDialysis??""}}">
                                        </div>
                                    </div>
                                </li>
                                {{--
                                <li class="more_dia" style="display: {{isset($DIALYSIS)&&$DIALYSIS =="1"?"":"none"}}">
                                    <div class="form-group">
                                        <label class="form-label fs-4" for="Bun">
                                            Bun
                                        </label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control ragne req" name="Bun" min="80"
                                                data-min="70" max="120" data-max="140" id="Bun" placeholder=""
                                                value="{{$Bun??""}}">
                                        </div>
                                    </div>
                                </li>
                                --}}



                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="CRF">
                                        <input type="checkbox" class="custom-control-input" {{(isset($CRF)&&$CRF=="1"
                                            )?"checked":""}} name="CRF" id="CRF2" value="1">
                                        <label class="custom-control-label mt4-4" for="CRF2">
                                            CRF</label>
                                    </div>
                                </li>





                            </ul>
                        </div>
                    </div>


                </div>





                @include("admin.passenger.save")
            </form>
        </div>
    </div>
</div>


















<div class="col-md-12 pari_s">
    <div class="card mb-2">
        <h6 class="card-header bg-secondary  ">
            <span class="text  text-white">
                Other Info

            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            <form action="" class="ph_form">


                <div class="row ">
                    <div class="col-lg-9 mb-2">
                        <div class="form-group">

                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Blind">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Blind)&&$Blind=="1" )?"checked":""}} name="Blind" id="Blind2"
                                            value="1">
                                        <label class="custom-control-label" for="Blind2"> نابینا </label>
                                    </div>
                                </li>


                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Cane">
                                        <input type="checkbox" class="custom-control-input" {{(isset($Cane)&&$Cane=="1"
                                            )?"checked":""}} name="Cane" id="Cane2" value="1">
                                        <label class="custom-control-label" for="Cane2"> حرکت با عصا </label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="HearingAids">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($HearingAids)&&$HearingAids=="1" )?"checked":""}}
                                            name="HearingAids" id="HearingAids2" value="1">
                                        <label class="custom-control-label" for="HearingAids2"> سمعک</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="WheelChair">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($WheelChair)&&$WheelChair=="1" )?"checked":""}} name="WheelChair"
                                            id="WheelChair2" value="1">
                                        <label class="custom-control-label" for="WheelChair2"> ویلچر</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Chorus">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Chorus)&&$Chorus=="1" )?"checked":""}} name="Chorus" id="Chorus2"
                                            value="1">
                                        <label class="custom-control-label" for="Chorus2"> کر</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Dumb">
                                        <input type="checkbox" class="custom-control-input" {{(isset($Dumb)&&$Dumb=="1"
                                            )?"checked":""}} name="Dumb" id="Dumb2" value="1">
                                        <label class="custom-control-label" for="Dumb2"> لال</label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Denture">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Denture)&&$Denture=="1" )?"checked":""}} name="Denture"
                                            id="Denture2" value="1">
                                        <label class="custom-control-label" for="Denture2"> دارای دندان مصنوعی </label>
                                    </div>
                                </li>

                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Glasses">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Glasses)&&$Glasses=="1" )?"checked":""}} name="Glasses"
                                            id="Glasses2" value="1">
                                        <label class="custom-control-label" for="Glasses2"> دارای عینک </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="ability_work">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($ability_work)&&$ability_work=="1" )?"checked":""}}
                                            name="ability_work" id="ability_work2" value="1">
                                        <label class="custom-control-label" for="ability_work2">

                                            توانایی انجام فعالیت های خود را ندارد
                                        </label>
                                    </div>
                                </li>

                                {{-- <li>
                                    <div class="custom-control custom-checkbox custom-control-pro no-control checked">
                                        <input type="text" hidden value="0" name="Red_Crescent">
                                        <input type="checkbox" class="custom-control-input"
                                            {{(isset($Red_Crescent)&&$Red_Crescent=="1" )?"checked":""}}
                                            name="Red_Crescent" id="Red_Crescent2" value="1">
                                        <label class="custom-control-label" for="Red_Crescent2">
                                            آمادگی همکاری با هلال احمر را دارم
                                        </label>
                                    </div>
                                </li> --}}



                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h2 class="text text-secondary">
                            HighRisk
                        </h2>
                        <ul class="custom-control-group">
                            <li>
                                <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                    <input type="radio" class="custom-control-input req" name="HighRisk"
                                        {{(isset($HighRisk)&&$HighRisk=="Yes" )?"checked":""}} id="HighRisk1"
                                        value="Yes">
                                    <label class="custom-control-label Yes" for="HighRisk1">
                                        Yes</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                    <input type="radio" class="custom-control-input req" name="HighRisk"
                                        {{(isset($HighRisk)&&$HighRisk=="No" )?"checked":""}} id="HighRisk2" value="No">
                                    <label class="custom-control-label No" for="HighRisk2">
                                        No</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>



                @include("admin.passenger.save")
            </form>
        </div>
    </div>
</div>



<div class="col-md-12">
    <div class="card mb-2">
        <h6 class="card-header  bg-gray ">
            <span class="text  text-dark">
                Other files (include Consultant Physician files)

            </span>
            <i class="ti ti-edit"></i>
        </h6>

        <div class="card-body">
            <p class="alewarning  rt alert-warning">
                پسوند های قابل قبول :jpg , png , pdf
                حجم فایل بیشتر از 5 مگابایت نباشد
            </p>
            <form action="" class="ph_form">
                <div class="row">
                    <div class="col-lg-6  mb-3">
                        <div class="form-group">
                            <div class="form-control-wrap d-flex justify-content-between">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="file_attach" id="file_attach">
                                    <label class="form-file-label" for="file_attach">انتخاب
                                        فایل</label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        @role("admin|doctor")
                        @if($user->status=="un_review" ||$user->status=="under_review")
                        <div class="mb-1">
                            <span class="btn btn-success add_new_test_image2" data-id="{{$user->id}}">آپلود فایل
                            </span>
                        </div>
                        @endif
                        @endrole
                    </div>
                    <div class="row">
                        <div id="progressWrapper" style="display: none;">
                            <progress id="progressBar" value="0" max="100" style="width: 100%;"></progress>
                            <span id="progressPercent">0%</span>
                        </div>
                    </div>
                </div>
            </form>
            <br>
            <div id="testimage_list">
                @include("admin.passenger.testimage_list")
            </div>


        </div>
    </div>
</div>



















































<div class="col-lg-12">
    <div class="card mb-2">
        <h6 class="card-header bg-success  ">
            <span class="text  text-white">
                اطلاعات دارویی
                {{ $user->name }}
                {{ $user->family }}
            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-7">
                    <div class="mb-1">
                        <label class="form-label" for="mobile">انتخاب دارو </label>
                        <select class=" form-control select2 " name="" id="select_drug" required>
                            <option value="">انتخاب کنید </option>
                            {{-- @foreach ($drugs as $dug )
                            <option value="{{$drug->id}}">
                                {{$drug->brand_en}}-
                                {{$drug->brand_fa}}-
                                {{$drug->name}}-
                                {{$drug->generic}}-
                            </option>
                            @endforeach --}}
                        </select>
                    </div>

                </div>
                <div class="col-lg-3">
                    <div class="mb-1">
                        <label class="form-label" for="mobile">  طریقه مصرف </label>
                        <select class="form-control select4" id="dose" name="dose">
                            <option value=""></option>
                            <option value="daily">daily</option>
                            <option value="BID">BID</option>
                            <option value="TDS">TDS</option>
                            <option value="QID">QID</option>
                        </select>
                    </div>
                </div>
                @role('admin|doctor')
                @if($user->status=="un_review"||$user->status=="under_review")
                <div class="col-lg-2">
                    <div class="mb-1 mt-4">
                        <span class="btn btn-success add_drug" data-id="{{ $user->id }}">اضافه کن </span>
                    </div>
                </div>
                @endif
                @endrole
            </div>
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


<div class="col-md-12 pari_s">
    <div class="card mb-2">
        <h6 class="card-header  bg-light ">
            <span class="text  text-dark">
                Diet Food
            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            <form action="" class="ph_form">
                <div class="row mb-2">
                    <ul class="custom-control-group">
                        <li>
                            <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                <input type="text" hidden value="0" name="Ordinary">
                                <input type="checkbox" class="custom-control-input" name="Ordinary"
                                {{(isset($Ordinary)&&$Ordinary=="Ordinary" )?"checked":""}}
                                    {{--  {{(isset($Ordinary)&&$Ordinary=="Ordinary" )?"checked":""}}

                                    {{
                                        (isset($Low_in_salt)&&$Low_in_salt!="Low_in_salt" &&
                                        isset($Lowfat)&&$Lowfat!="Lowfat" &&
                                        isset($Whitemeat)&&$Whitemeat!="Whitemeat" &&
                                        isset($diabet)&&$diabet!="diabet" )?"":"checked"
                                    }}  --}}

                                     id="Ordinary1"
                                    value="Ordinary">
                                <label class="custom-control-label Ordinary" for="Ordinary1">
                                    معمولی</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                <input type="text" hidden value="0" name="Low_in_salt">
                                <input type="checkbox" class="custom-control-input diet_more"     {{(isset($Ordinary)&&$Ordinary=="Ordinary" )?"disabled":""}}  name="Low_in_salt"
                                    {{( (isset($Ordinary)&&$Ordinary!="Ordinary" ) &&     isset($Low_in_salt)&&$Low_in_salt=="Low_in_salt" )?"checked":""}}
                                    id="Low_in_salt2" value="Low_in_salt">
                                <label class="custom-control-label Low_in_salt" for="Low_in_salt2">
                                    کم نمک</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                <input type="text" hidden value="0" name="Lowfat">
                                <input type="checkbox" class="custom-control-input diet_more"     {{(isset($Ordinary)&&$Ordinary=="Ordinary" )?"disabled":""}}  name="Lowfat"
                                    {{( (isset($Ordinary)&&$Ordinary!="Ordinary" ) &&     isset($Lowfat)&&$Lowfat=="Lowfat" )?"checked":""}} id="Lowfat3" value="Lowfat">
                                <label class="custom-control-label Lowfat" for="Lowfat3">
                                    کم چرب</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                <input type="text" hidden value="0" name="Whitemeat">
                                <input type="checkbox" class="custom-control-input diet_more"     {{(isset($Ordinary)&&$Ordinary=="Ordinary" )?"disabled":""}}  name="Whitemeat"
                                    {{( (isset($Ordinary)&&$Ordinary!="Ordinary" ) &&     isset($Whitemeat)&&$Whitemeat=="Whitemeat" )?"checked":""}} id="Whitemeat4"
                                    value="Whitemeat">
                                <label class="custom-control-label No" for="Whitemeat4">

                                    گوشت سفید</label>
                            </div>
                        </li>
                        <li>
                            <div class="custom-control custom-control-sm custom-checkbox custom-control-pro">
                                <input type="text" hidden value="0" name="diabet">
                                <input type="checkbox" class="custom-control-input diet_more"     {{(isset($Ordinary)&&$Ordinary=="Ordinary" )?"disabled":""}}  name="diabet"
                                    {{( (isset($Ordinary)&&$Ordinary!="Ordinary" ) &&     isset($diabet)&&$diabet=="diabet" )?"checked":""}} id="diabet4"
                                    value="diabet">
                                <label class="custom-control-label No" for="diabet4">

                                    دیابتی</label>
                            </div>
                        </li>

                    </ul>
                </div>



                @include("admin.passenger.save")
            </form>
        </div>
    </div>
</div>

@role("admin|manager|doctor|provincialSupervisor")
@if($user->status=="under_review" ||$user->status=="un_review" ||$user->status=="result_commission")
<div class="col-md-12">
    <div class="card mb-2">
        <h6 class="card-header bg-info text-white">
            وضعیت
            <span class="text  text-dark">
                {{ $user->name }}
                {{ $user->family }}
            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            @include('main.error')
            <form action="{{route("update.psssenger.status",$user->id)}}" id="examform" data-id="{{$user->id}}" method="post">
                @csrf
                @method('post')
                <div class="row">
                    @role("admin|manager|doctor")
                    <div class="col-lg-4">
                        @if($user->status=="result_commission")

                        <div class="mb-1">
                            <label for="vip">وضعیت </label>
                            <select class=" form-control select2 " name="status" id="status">
                                <option value="">انتخاب کنید </option>
                                <option value="rejected">عدم تایید </option>
                                <option value="approved">تایید </option>
                            </select>
                        </div>
                        @else
                        <div class="mb-1">
                            <label for="vip">وضعیت </label>
                            <select class=" form-control select2 " name="status" id="status">
                                <option value="">انتخاب کنید </option>
                                @foreach (__("status") as $key=>$val)
                                @if($key=="un_review"|| $key=="result_commission")
                                    @continue
                                @endif
                                <option {{$user->status==$key?"selected":""}} value="{{$key}}">{{$val}}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif

                    </div>
                    <div class="col-lg-4">
                        <label for="doctor_info">یادداشت پزشک درمورد بیمار</label>
                        <textarea name="doctor_info" class="form-control count_ch" id="doctor_info" cols="30"
                            rows="5">{{(isset($doctor_info) )?$doctor_info:""}}</textarea>
                        <div id="charCount">0 / 500</div>
                    </div>
                    @endrole
                    <div class="col-lg-4">
                      <h6>
                        وضعیت فعلی:
                        <span class="text text-danger">
                            {{__("status.".$user->status)}}
                        </span>
                      </h6>
                        @if($user->status=="result_commission")

                        @if($user->check_file_ex( $user->commission_reslut)!="pdf")
                        <a href="{{ $user->commission_reslut() }}" data-lightbox="gallery-{{ $user->id }}" class="">
                            {{-- <img src="{{$user->commission_reslut()}}" width="200px" alt=""> --}}
                            مشاهده
                            نتیجه کمسیون
                        </a>
                        @else
                        <a target="__blank" href="{{ $user->commission_reslut() }}">
                            <i class="fas fa-download"></i>
                            دانلود نتیجه کمسیون
                        </a>
                        @endif


                        <h4 class="alert alert-{{$user->commission_status=="approved"?"success":"danger"}}">  {{__("status.".$user->commission_status)}}</h4>
                        @else
                        <div class="" id="reason_c" style="display: none">
                            <h6>
                                دلیل ارجاع به کمیسیون
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio" class="custom-control-input" name="commission_reason"
                                            id="Heart" value="Heart">
                                        <label class="custom-control-label Ordinary" for="Heart">
                                            قلب
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro ">
                                        <input type="radio" class="custom-control-input" name="commission_reason"
                                            id="commission_reason2" value="Domestic">
                                        <label class="custom-control-label Low_in_salt" for="commission_reason2">
                                            داخلی</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio" class="custom-control-input" name="commission_reason"
                                            id="commission_reason3" value="Orthopedics">
                                        <label class="custom-control-label Lowfat" for="commission_reason3">
                                            ارتوپدی

                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio" class="custom-control-input" name="commission_reason"
                                            id="commission_reason4" value="Psychiatry">
                                        <label class="custom-control-label No" for="commission_reason4">
                                            روانپزشکی
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        @endif

                    </div>


                    <div class="col-lg-2">
                        <div class="mb-1 mt-4">
                            @role("admin|manager|doctor")
                            <span class="btn btn-info update_psssenger_status " data-id="{{$user->id}}">
                                ذخیره
                            </span>
                            <a href="{{route("passenger.index")}}" class="btn btn-danger">برگشت</a>
                            @endrole

                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endif
@endrole

@role("provincialAgent|admin")
@if($user->status=="medical_commission")
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<div class="col-md-12">
    <div class="card mb-2">
        <h6 class="card-header bg-warning text-white">
            اطلاعات کمیسیون
            <span class="text  text-dark">
                {{ $user->name }}
                {{ $user->family }}
            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            @include('main.error')
            <form action="{{route("psssenger.commission.reslut",$user->id)}}" method="post" >
                @csrf
                @method('post')
                <div class="row">
                    <div class="col-lg-6">
                        <h5>
                            یادداشت پزشک
                        </h5>
                        <p>
                            {{$user->doctor_info}}
                        </p>
                    </div>
                    <div class="col-lg-6 mb-5">
                       <div style="text-align: left;">
                        <h5 >
                            علت
                            ارجاع به کیمسیون
                        </h5>
                        <h5 style="text-align: center;color:red; width:200px">
                            {{__("sen.".$user->commission_reason)}}
                        </h5>
                       </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-1 mt-4">

                            <span id="get_pdf2" style="display: " class="btn btn-danger">
                                دانلود فرم کمیسیون
                            </span>

                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <br>
                        <div class="form-group">
                            <div class="form-control-wrap d-flex justify-content-between">
                                <div class="form-file">
                                    <input type="file" class="form-file-input" name="file_result" id="file_result">
                                    <label class="form-file-label" for="file_result">آپلود نتیجه فرم</label>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div id="progressWrapper2" style="display: none;">
                                <progress id="progressBar2" value="0" max="100" style="width: 100%;"></progress>
                                <span id="progressPercent2">0%</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 ">
                        <br>
                        <span class="btn btn-primary save_form_result" data-id="{{$user->id}}">
                            ارسال فرم نتیجه کمیسیون
                        </span>
                    </div>
                    <div class="col-lg-3"  style="text-align:left" >
                        <div class=""  style="">
                            <h6>
                                نظر نهایی کمیسیون
                            </h6>
                            <ul class="custom-control-group">
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro">
                                        <input type="radio" class="custom-control-input" name="commission_status" id="Heart_approved" value="approved">
                                        <label class="custom-control-label Ordinary" for="Heart_approved">
                                            تایید
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="custom-control custom-control-sm custom-radio custom-control-pro ">
                                        <input type="radio" class="custom-control-input" name="commission_status" id="rejected_co" value="rejected">
                                        <label class="custom-control-label Low_in_salt" for="rejected_co">
                                            عدم تایید</label>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2" style="text-align:left" >
                        <br>
                        <div class="mb-1 psssenger_pa"  style="display: {{$user->commission_reslut()?"":"none"}}">
                            <span  class="btn btn-success psssenger_commission_reslut" data-id="{{$user->id}}">
                                ارسال  نتیجه کمیسیون به پزشک
                            </span>
                        </div>
                    </div>

                </div>


                <p class="alert alert-warning">
                     ابتدا فرم کمیسیون  را دانلود نموده و بعد از پر کردن آن  در قسمت آپلود ، نتیجه را ارسال نمایید
                </p>
            </form>

        </div>
    </div>
</div>



<div class="col-lg-12">

    <div class="row" id="fom_p1" style="display: ">
        <div class="col-lg-4 mb-2">
            <img class="mt-5" src="{{asset(" images/lg.png")}}" alt="">
        </div>
        <div class="col-lg-4 mb-2 mt-5">
            <h6>
                بسمه تعالي
            </h6>

        </div>
        <div class="col-lg-4 mb-2">
            <div class="mt-5">
                <span class="ti">
                    تاریخ:
                </span>
                <span class="co">
                    {{Jdate()->format("d-m-Y")}}
                </span>
            </div>
            <div class="">
                <span class="ti">
                    استان:
                </span>
                <span class="co">
                    @if($user->karevan)
                    @if($user->karevan->province)
                    {{$user->karevan->province->name}}
                    @endif
                    @endif
                </span>
            </div>

        </div>
        <div class="col-lg-12 mb-2">
            <h6>
                فرم ارجاع متقاضيان حج به كميسيون مشورتي استان

            </h6>
        </div>
        <div class="col-lg-10">
            <div class="row mrf">
                <div class="col-lg-9 mb-2">
                    <span class="ti">
                        مشخصات متقاضی:
                    </span>
                    <span class="co">
                        {{$user->name}}
                        {{$user->family}}
                    </span>
                </div>
                <div class="col-lg-3 mb-2">
                    <span class="ti">
                        نام پدر:
                    </span>
                    <span class="co">
                        {{$user->fathername}}

                    </span>
                </div>
                <div class="col-lg-4 mb-2">
                    <span class="ti">
                        تاریخ تولد:
                    </span>
                    <span class="co">
                        {{$user->BirthDate}}
                    </span>

                </div>
                <div class="col-lg-4 mb-2">
                    <span class="ti">
                        کد ملی:
                    </span>
                    <span class="co">
                        {{$user->ssn}}
                    </span>

                </div>
                <div class="col-lg-4 mb-2">
                    <span class="ti">
                        شماره زائر :
                    </span>
                    <span class="co">
                        {{$user->PassengerCode}}
                    </span>

                </div>
                <div class="col-lg-4 mb-2">
                    <span class="ti">
                        شماره کاروان:
                    </span>
                    <span class="co">
                        {{$user->KarevanID}}
                    </span>

                </div>
                <div class="col-lg-4 mb-2">
                    <span class="ti">
                        مدیر کاروان:
                    </span>
                    <span class="co">
                        @if($user->Karevan)
                        {{$user->Karevan->ManagerName}}
                        {{$user->Karevan->ManagerFamily}}
                        @endif

                    </span>

                </div>
                <div class="col-lg-4 mb-5">
                    <span class="ti">
                        نام پزشک:
                    </span>
                    <span class="co">
                        @if($user->Karevan)
                        @if($user->Karevan->doctor_id)
                        {{$user->Karevan->doctor->name}}
                        {{$user->Karevan->doctor->family}}
                        @endif

                        @endif

                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <div class="boxf">
                محل
                <br>
                الصاق
                <br>
                عکس
                <br>
            </div>
        </div>
        <div class="col-lg-12 mb-2 mrf">
            <h6>
                نظرات پزشک حج تمتع

            </h6>
        </div>
        <div class="col-lg-12  mb-2 mrf">
            <h6 >
                علت كلي ارجاع به كميسيون
            </h6>
            <p>

            </p>
        </div>
        @include("admin.passenger.form_commision_info")




        <br>
        <br>
        <br>

        <div class="col-lg-12  mrl mb-2 ">
            <h6>
                 پزشک  :

            </h6>

        </div>


        <div class="col-lg-12">
            <table class="table tabless">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            نوع معاینه یا اقدام پاراکلینیک
                        </th>
                        <th class="ss">
                            <!-- جدول تودرتو -->
                            <table>
                                <tr>
                                    <td> نتیجه</td>
                                </tr>
                                <tr>
                                    <td>
                                        Pos
                                    </td>
                                    <td>
                                        Neg
                                    </td>
                                </tr>
                            </table>
                        </th>
                        <th>
                            توضیحات
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            <br>
                        </td>
                        <td> <br>
                        </td>
                        <td> <br>
                        </td>
                        <td> <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2
                        </td>
                        <td>
                            <br>
                        </td>
                        <td> <br></td>
                        <td> <br></td>
                        <td> <br></td>
                    </tr <tr>
                    <td>
                        3
                    </td>
                    <td>
                        <br>
                    </td>
                    <td> <br></td>
                    <td> <br></td>
                    <td> <br></td>
                    </tr <tr>
                    <td>
                        4
                    </td>
                    <td>
                        <br>
                    </td>
                    <td> <br></td>
                    <td> <br></td>
                    <td> <br></td>
                    </tr <tr>
                    <td>
                        5
                    </td>
                    <td>
                        <br>
                    </td>
                    <td> <br></td>
                    <td> <br></td>
                    <td> <br></td>
                    </tr </tbody>
            </table>

        </div>
        <br>
        <br>
        <div class="mrf">
            <h6 class="mrf">
                اعضا کمیسیون

            </h6>
        </div>

        <br>
        <br>
        <div class="col-lg-12">

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>
                            نام ونام خانوادگی
                        </th>
                        <th class="ss">
                            تخصص
                        </th>
                        <th class="ss">
                            مهر و امضا
                        </th>
                    </tr>

                </thead>
                <tbody>

                    @foreach ($commission->users as $doc )
                    <tr>
                        <td>
                            1
                        </td>
                        <td>
                            {{$doc->name}}
                            {{$doc->family}}
                        </td>
                        <td>
                            {{$doc->expert}}
                        </td>
                        <td>

                        </td>

                    </tr>

                    @endforeach

                </tbody>
            </table>




        </div>
        <div class="col-lg-12"></div>
        <div class="col-lg-12 mb-2  mb-2 mrl">
            <h6>
                فرم ارجاع متقاضيان حج به كميسيون مشورتي استان
            </h6>
        </div>
    </div>

</div>


@endif



@endrole



@if(in_array($user->status,["rejected","approved"]))


<div class="col-md-12">
    <div class="card mb-2">
        <h6 class="card-header bg-info text-white">
            وضعیت
            نهایی
            <span class="text  text-dark">
                {{ $user->name }}
                {{ $user->family }}
            </span>
            <i class="ti ti-edit"></i>
        </h6>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <span class="content small">
                        <h2 class="text  text-{{$user->status=="approved"?"success":"danger"}}">
                            {{ __("status.".$user->status) }}
                        </h2>
                    </span>
                </div>
                <div class="col-lg-3">
                    @if($user->commission_reslut())

                    <h6>
                        نتیجه کمیسیون
                    </h6>
                    <a href="{{ $user->commission_reslut() }}" data-lightbox="gallery-{{ $user->id }}" class="">
                        {{-- <img src="{{$user->commission_reslut()}}" width="200px" alt=""> --}}
                        مشاهده
                    </a>
                        <h4 class="alert alert-{{$user->commission_status=="approved"?"success":"danger"}}">  {{__("status.".$user->commission_status)}}</h4>
                        <br>
                    <a target="__blank" href="{{ $user->commission_reslut() }}">
                        <i class="fas fa-download"></i>
                    </a>

                    @endif

                </div>


            </div>

        </div>
    </div>
</div>
@endif


</div>
@if(request("back"))
<a href="{{route("reports",['type'=>"t1"])}}" class="floating-btn" >
    برگشت به فهرست
    </a>
    @else
    <a href="{{route("passenger.index")}}" class="floating-btn" >
        برگشت به فهرست
        </a>
@endif


@endsection
