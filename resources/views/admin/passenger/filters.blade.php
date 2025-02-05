<div id="more_filter" style="display: {{request("_token")?'':""}}">
    <div class="row">
        <div class="form-inline  gx-3">

            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="BirthDate44min" class="text text-danger text-10">
                        <span class="fs-10">
                           سن

                        </span>
                        min

                    </label>
                    <input type="number" name="BirthDate44min" value="{{ request("BirthDate44min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="BirthDate44max" class="text text-success text-10">
                        <span class="fs-10">
                            سن

                        </span>
                        max
                    </label>
                    <input type="number" name="BirthDate44max" value="{{ request("BirthDate44max") }}" class="form-control ">
                </div>
            </div>

            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="Blood_Presure_Sys__min" class="text text-danger text-10">
                        <span class="fs-10">
                            B P Dis
                        </span>
                        min

                    </label>
                    <input type="text" name="Blood_Presure_Dis___min" value="{{ request("Blood_Presure_Dis___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="Blood_Presure_Dis__max" class="text text-success text-10">
                        <span class="fs-10">
                            B P Dis
                        </span>
                        max
                    </label>
                    <input type="text" name="Blood_Presure_Dis___max" value="{{ request("Blood_Presure_Dis___max") }}" class="form-control ">
                </div>
            </div>
            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="Blood_Presure_Sys___min" class="text text-danger text-10">
                        <span class="fs-10">
                            B P Sys
                        </span>
                        min
                        {{--  @dd(request("Blood_Presure_Sys___min") )  --}}

                    </label>
                    <input type="text" name="Blood_Presure_Sys___min" value="{{ request("Blood_Presure_Sys___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="Blood_Presure_Sys___max" class="text text-success text-10">
                        <span class="fs-10">
                            B P Sys
                        </span>
                        max
                    </label>
                    <input type="text" name="Blood_Presure_Sys___max" value="{{ request("Blood_Presure_Sys___max") }}" class="form-control ">
                </div>
            </div>


            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="bmi__min" class="text text-danger text-10">
                        <span class="fs-10">
                          BMI
                        </span>
                        min
                    </label>
                    <input type="text" name="bmi___min" value="{{ request("bmi___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="bmi__max" class="text text-success text-10">
                        <span class="fs-10">
                          BMI
                        </span>
                        max
                    </label>
                    <input type="text" name="bmi___max" value="{{ request("bmi___max") }}" class="form-control ">
                </div>
            </div>



            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="PulseRate__min" class="text text-danger text-10">
                        <span class="fs-10">
                          Pulse Rate
                        </span>
                        min
                    </label>
                    <input type="text" name="PulseRate___min" value="{{ request("PulseRate___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="PulseRate__max" class="text text-success text-10">
                        <span class="fs-10">
                          Pulse Rate
                        </span>
                        max
                    </label>
                    <input type="text" name="PulseRate___max" value="{{ request("PulseRate___max") }}" class="form-control ">
                </div>
            </div>

            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="bun__min" class="text text-danger text-10">
                        <span class="fs-10">
                            bun
                        </span>
                        min
                    </label>
                    <input type="text" name="bun___min" value="{{ request("bun___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="bun__max" class="text text-success text-10">
                        <span class="fs-10">
                            bun
                        </span>
                        max
                    </label>
                    <input type="text" name="bun___max" value="{{ request("bun___max") }}" class="form-control ">
                </div>
            </div>





            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="Hb___min" class="text text-danger text-10">
                        <span class="fs-10">
                            Hb(5-30)
                        </span>
                        min

                    </label>
                    <input type="text" name="Hb___min" value="{{ request(" Hb___min") }}"
                        class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="Hb___max" class="text text-success text-10">
                        <span class="fs-10">
                            Hb(5-30)
                        </span>
                        max
                    </label>
                    <input type="text" name="Hb___max" value="{{ request(" Hb___max") }}"
                        class="form-control ">
                </div>
            </div>


            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="Cr___min" class="text text-danger text-10">
                        <span class="fs-10">
                            Cr(0.2-20)
                        </span>
                        min

                    </label>
                    <input type="text" name="Cr___min" value="{{ request(" Cr___min") }}"
                        class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="Cr___max" class="text text-success text-10">
                        <span class="fs-10">
                            Cr(0.2-20)
                        </span>
                        max
                    </label>
                    <input type="text" name="Cr___max" value="{{ request(" Cr___max") }}"
                        class="form-control ">
                </div>
            </div>


            <div class="d-flex">
                <div class="form-wrap  w-110px">
                    <label for="FBS___min" class="text text-danger text-10">
                        <span class="fs-10">
                            FBS(50-600)

                        </span>
                        min

                    </label>
                    <input type="text" name="FBS___min" value="{{ request(" FBS___min") }}"
                        class="form-control ">
                </div>
                <div class="form-wrap  w-110px">
                    <label for="FBS___max" class="text text-success text-10">
                        <span class="fs-10">
                            FBS(50-600)

                        </span>
                        max
                    </label>
                    <input type="text" name="FBS___max" value="{{ request(" FBS___max") }}"
                        class="form-control ">
                </div>
            </div>

            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="HbA1C__min" class="text text-danger text-10">
                        <span class="fs-10">
                            HbA1C
                        </span>
                        min
                    </label>
                    <input type="text" name="HbA1C___min" value="{{ request("HbA1C___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="HbA1C__max" class="text text-success text-10">
                        <span class="fs-10">
                            HbA1C
                        </span>
                        max
                    </label>
                    <input type="text" name="HbA1C___max" value="{{ request("HbA1C___max") }}" class="form-control ">
                </div>
            </div>


            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="MMSE__min" class="text text-danger text-10">
                        <span class="fs-10">
                            MMSE
                        </span>
                        min
                    </label>
                    <input type="text" name="MMSE___min" value="{{ request("MMSE___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="MMSE__max" class="text text-success text-10">
                        <span class="fs-10">
                            MMSE
                        </span>
                        max
                    </label>
                    <input type="text" name="MMSE___max" value="{{ request("MMSE___max") }}" class="form-control ">
                </div>
            </div>





            <div class="d-flex">
                <div class="form-wrap  w-100px">
                    <label for="PLT__min" class="text text-danger text-10">
                        <span class="fs-10">
                            PLT
                        </span>
                        min
                    </label>
                    <input type="text" name="PLT___min" value="{{ request("PLT___min") }}" class="form-control ">
                </div>
                <div class="form-wrap  w-100px">
                    <label for="PLT__max" class="text text-success text-10">
                        <span class="fs-10">
                            PLT
                        </span>
                        max
                    </label>
                    <input type="text" name="PLT___max" value="{{ request("PLT___max") }}" class="form-control ">
                </div>
            </div>









        </div>
    </div>



    <div class="row ">
        <div class="col-lg-4 mb-2 mt-2">
            <ul class="custom-control-group border border-warning rounded-3">
                <li>
                    <h6 class="text text-warning">
                        EKG
                    </h6>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("EKG")=="normal" ?"checked":""}} name="EKG" id="EKG1"
                            value="normal">
                        <label class="custom-control-label" for="EKG1">
                            طبیعی</label>
                    </div>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("EKG")=="Abnormal" ?"checked":""}} name="EKG"
                            id="EKG2" value="Abnormal">
                        <label class="custom-control-label" for="EKG2">
                            غیر طبیعی</label>
                    </div>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("EKG")=="Didnot_do_it" ?"checked":""}} name="EKG"
                            id="EKG3" value="Didnot_do_it">
                        <label class="custom-control-label" for="EKG3">
                            انجام نداده</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 mb-2 mt-2">
            <ul class="custom-control-group border border-warning rounded-3">
                <li>
                    <h6 class="text text-warning">
                        Opium Test
                    </h6>
                </li>


                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("Opium_Test")==1?"checked":""}} name="Opium_Test"
                            {{request("Opium_Test")=="positive" ?"checked":""}}
                            id="Opium_Test1" value="positive">
                        <label class="custom-control-label" for="Opium_Test1">

                            مثبت </label>
                    </div>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("Opium_Test")==1?"checked":""}} name="Opium_Test"
                            {{request("Opium_Test")=="Negative" ?"checked":""}}
                            id="Opium_Test2" value="Negative">
                        <label class="custom-control-label" for="Opium_Test2">
                            منفی</label>
                    </div>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("Opium_Test")==1?"checked":""}} name="Opium_Test"
                            {{request("Opium_Test")=="Didnot_do_it" ?"checked":""}}
                            id="Opium_Test3" value="Didnot_do_it">
                        <label class="custom-control-label" for="Opium_Test3">
                            انجام نداده</label>
                    </div>
                </li>

            </ul>
        </div>
        <div class="col-lg-4 mb-2 mt-2">
            <ul class="custom-control-group border border-warning rounded-3">
                <li>
                    <h6 class="text text-warning">
                        CXR
                    </h6>
                </li>

                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("CXR")==1?"checked":""}} name="CXR"
                            {{request("CXR")=="normal" ?"checked":""}} id="CXR1"
                            value="normal">
                        <label class="custom-control-label" for="CXR1">
                            طبیعی</label>
                    </div>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("CXR")==1?"checked":""}} name="CXR"
                            {{request("CXR")=="Abnormal" ?"checked":""}} id="CXR2"
                            value="Abnormal">
                        <label class="custom-control-label" for="CXR2">
                            غیر طبیعی</label>
                    </div>
                </li>
                <li>
                    <div
                        class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="radio" class="custom-control-input form_action"
                            {{request("CXR")==1?"checked":""}} name="CXR"
                            {{request("CXR")=="Didnot_do_it" ?"checked":""}} id="CXR3"
                            value="Didnot_do_it">
                        <label class="custom-control-label" for="CXR3">
                            انجام نداده</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-2 mt-2">



            <ul class="custom-control-group border border-info rounded-3">
                <li>
                    <h6 class="text text-warning">
                        Autoimmune disease
                    </h6>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="text" hidden value="0" name="Graves ">
                        <input type="checkbox" class="custom-control-input form_action" {{(request("Graves")=="1" )?"checked":""}} name="Graves " id="Graves 2" value="1">
                        <label class="custom-control-label" for="Graves 2">
                            Graves </label>
                    </div>
                </li>


                <li>
                    <div class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="text" hidden value="0" name="rheumatoid_arthritis">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{(request("rheumatoid_arthritis")=="1" )?"checked":""}}
                            name="rheumatoid_arthritis" id="rheumatoid_arthritis2" value="1">
                        <label class="custom-control-label" for="rheumatoid_arthritis2"> rheumatoid
                            arthritis</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="text" hidden value="0" name="Celiac">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{(request("Celiac")=="1" )?"checked":""}} name="Celiac" id="Celiac2"
                            value="1">
                        <label class="custom-control-label" for="Celiac2"> Celiac</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-control-sm custom-radio custom-switch checked">
                        <input type="text" hidden value="0" name="Hashimoto_thyroiditis">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{(request("Hashimoto_thyroiditis")=="1"
                            )?"checked":""}} name="Hashimoto_thyroiditis" id="Hashimoto_thyroiditis2"
                            value="1">
                        <label class="custom-control-label" for="Hashimoto_thyroiditis2"> Hashimoto s
                            thyroiditis</label>
                    </div>
                </li>

            </ul>
        </div>

        <div class="col-lg-8 mb-2 mt-2">
            <div class="form-group  ml-5 " style="   ">

                <ul class="custom-control-group border border-info rounded-3 ">
                    <li>
                        <h6>
                            dermatology
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch   checked">
                            <input type="text" hidden value="0" name="Psoriasis">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Psoriasis")=="1" )?"checked":""}} name="Psoriasis"
                                id="Psoriasis2" value="1">
                            <label class="custom-control-label" for="Psoriasis2">
                                Psoriasis</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch   checked">
                            <input type="text" hidden value="0" name="Mycoses">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Mycoses")=="1" )?"checked":""}} name="Mycoses"
                                id="Mycoses2" value="1">
                            <label class="custom-control-label" for="Mycoses2"> Mycoses</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch   checked">
                            <input type="text" hidden value="0" name="skin_fungus">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("skin_fungus")=="1" )?"checked":""}}
                                name="skin_fungus" id="skin_fungus2" value="1">
                            <label class="custom-control-label" for="skin_fungus2"> skin fungus</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch   checked">
                            <input type="text" hidden value="0" name="Acne">
                            <input type="checkbox" class="custom-control-input form_action" {{(request("Acne")=="1"
                                )?"checked":""}} name="Acne" id="Acne2" value="1">
                            <label class="custom-control-label" for="Acne2"> Acne</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch   checked">
                            <input type="text" hidden value="0" name="Shingles">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Shingles")=="1" )?"checked":""}} name="Shingles"
                                id="Shingles2" value="1">
                            <label class="custom-control-label" for="Shingles2"> Shingles</label>
                        </div>
                    </li>


                    {{--  <li>
                        <div class="custom-control custom-checkbox custom-switch   checked">
                            <input type="text" hidden value="0" name="Shingles">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Shingles")=="1" )?"checked":""}} name="Shingles"
                                id="Shingles2" value="1">
                            <label class="custom-control-label" for="Shingles2"> Shingles</label>
                        </div>
                    </li>  --}}


                </ul>
            </div>
        </div>




        <div class="col-lg-8  mb-2 mt-2">
            <ul class="custom-control-group border border-info rounded-3 ">
                <li>
                    <h6>
                        Cardio Vascular
                    </h6>
                </li>
                <li>
                    <div
                        class="custom-control custom-checkbox custom-switch no-control checked">

                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("CHF")==1?'checked':""}} name="CHF" id="CHF2"
                            value="1">
                        <label class="custom-control-label" for="CHF2"> CHF</label>
                    </div>
                </li>


                <li>
                    <div class="custom-control custom-checkbox custom-switch   checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("IHD")==1?'checked':""}} name="IHD" id="IHD2"
                            value="1">
                        <label class="custom-control-label" for="IHD2"> IHD</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-checkbox custom-switch   checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("HTN")==1?'checked':""}} name="HTN" id="HTN2"
                            value="1">
                        <label class="custom-control-label" for="HTN2"> HTN</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox custom-switch   checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("MI")==1?'checked':""}} name="MI" id="MI2" value="1">
                        <label class="custom-control-label" for="MI2"> MI</label>
                    </div>
                </li>


                <li>
                    <div class="custom-control custom-checkbox custom-switch   checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("Arrhythmia")==1?'checked':""}} name="Arrhythmia"
                            id="Arrhythmia2" value="1">
                        <label class="custom-control-label" for="Arrhythmia2">Arrhythmia</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox custom-switch   checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("DVT")==1?'checked':""}} name="DVT" id="DVT2"
                            value="1">
                        <label class="custom-control-label" for="DVT2"> DVT</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox custom-switch   checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("CABG")==1?'checked':""}} name="CABG" id="CABG2"
                            value="1">
                        <label class="custom-control-label" for="CABG2"> CABG</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-4  mb-2 mt-2 mt-2">
            <ul class="custom-control-group border border-info rounded-3">
                <li>
                    <h6>
                        UROLOGY
                    </h6>
                </li>
                <li>
                    <div class="custom-control custom-checkbox  custom-switch checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("DIALYSIS")==1?'checked':""}} name="DIALYSIS"
                            id="DIALYSIS2" value="1">
                        <label class="custom-control-label" for="DIALYSIS2">
                            DIALYSIS</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox  custom-switch checked">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("CRF")==1?'checked':""}} name="CRF" id="CRF2"
                            value="1">
                        <label class="custom-control-label" for="CRF2"> CRF</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-6  mb-2 mt-2">
            <ul class="custom-control-group border border-info rounded-3">
                <li>
                    <h6>
                        Hormone
                    </h6>
                </li>
                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("DM")==1?'checked':""}} name="DM" id="DM2" value="1">
                        <label class="custom-control-label" for="DM2"> DM</label>
                    </div>
                </li>


                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("HyperThyroidism")==1?'checked':""}}
                            name="HyperThyroidism" id="HyperThyroidism2" value="1">
                        <label class="custom-control-label" for="HyperThyroidism2">
                            HyperThyroidism</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("HypoThyroidism")==1?'checked':""}}
                            name="HypoThyroidism" id="HypoThyroidism2" value="1">
                        <label class="custom-control-label" for="HypoThyroidism2">
                            HypoThyroidism</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox  custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                            {{request("Hyperlipidemia")==1?'checked':""}}
                            name="Hyperlipidemia" id="Hyperlipidemia2" value="1">
                        <label class="custom-control-label" for="Hyperlipidemia2">
                            Hyperlipidemia</label>
                    </div>
                </li>

            </ul>
        </div>


        <div class="col-lg-6  mb-2 mt-2">
            <div class="form-group">

                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Nerurology
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("MultipleSclerosis")==1?"checked":""}}
                                name="MultipleSclerosis" id="MultipleSclerosis2" value="1">
                            <label class="custom-control-label" for="MultipleSclerosis2">
                                MultipleSclerosis</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("CVA")==1?"checked":""}} name="CVA" id="CVA2"
                                value="1">
                            <label class="custom-control-label" for="CVA2"> CVA</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("TIA")==1?"checked":""}} name="TIA" id="TIA2"
                                value="1">
                            <label class="custom-control-label" for="TIA2"> TIA</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Epilepsy")==1?"checked":""}} name="Epilepsy"
                                id="Epilepsy2" value="1">
                            <label class="custom-control-label" for="Epilepsy2">
                                Epilepsy</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <div class="col-lg-12  mb-2 mt-2">
            <div class="form-group">

                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Psychiatry
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="PTSD">
                            <input type="checkbox" class="custom-control-input form_action" {{(request("PTSD")=="1"
                                )?"checked":""}} name="PTSD" id="PTSD2" value="1">
                            <label class="custom-control-label" for="PTSD2"> PTSD</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="PersonalityDisorder">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("PersonalityDisorder")=="1" )?"checked":""}}
                                name="PersonalityDisorder" id="PersonalityDisorder2" value="1">
                            <label class="custom-control-label" for="PersonalityDisorder2">
                                PersonalityDisorder</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="MoodDisorder">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("MoodDisorder")=="1" )?"checked":""}}
                                name="MoodDisorder" id="MoodDisorder2" value="1">
                            <label class="custom-control-label" for="MoodDisorder2">
                                MoodDisorder</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="Substance_Use_Disorder">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Substance_Use_Disorder")=="1"
                                )?"checked":""}} name="Substance_Use_Disorder" id="Substance_Use_Disorder2"
                                value="1">
                            <label class="custom-control-label" for="Substance_Use_Disorder2"> Substance
                                Use Disorder(Addiction) </label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="Depresseion">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Depresseion")=="1" )?"checked":""}}
                                name="Depresseion" id="Depresseion2" value="1">
                            <label class="custom-control-label" for="Depresseion2"> Depresseion</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="Mania">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Mania")=="1" )?"checked":""}} name="Mania" id="Mania2"
                                value="1">
                            <label class="custom-control-label" for="Mania2"> Mania</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="Dementia">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Dementia")=="1" )?"checked":""}} name="Dementia"
                                id="Dementia2" value="1">
                            <label class="custom-control-label" for="Dementia2"> Dementia</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="OCD">
                            <input type="checkbox" class="custom-control-input form_action" {{(request("OCD")=="1"
                                )?"checked":""}} name="OCD" id="OCD2" value="1">
                            <label class="custom-control-label" for="OCD2"> OCD</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="SleepDisorder">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("SleepDisorder")=="1" )?"checked":""}}
                                name="SleepDisorder" id="SleepDisorder2" value="1">
                            <label class="custom-control-label" for="SleepDisorder2">
                                SleepDisorder</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="Psychosis">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Psychosis")=="1" )?"checked":""}} name="Psychosis"
                                id="Psychosis2" value="1">
                            <label class="custom-control-label" for="Psychosis2"> Psychosis</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="text" hidden value="0" name="Hematology_Oncology">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{(request("Hematology_Oncology")=="1" )?"checked":""}}
                                name="Hematology_Oncology" id="Hematology_Oncology2" value="1">
                            <label class="custom-control-label" for="Hematology_Oncology2">
                                Anxiety(Panic, GAD, ...)
                                Hematology&Oncology</label>
                        </div>
                    </li>



{{--
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("PersonalityDisorder")==1?"checked":""}}
                                name="PersonalityDisorder" id="PersonalityDisorder2"
                                value="1">
                            <label class="custom-control-label" for="PersonalityDisorder2">
                                PersonalityDisorder</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("MoodDisorder")==1?"checked":""}}
                                name="MoodDisorder" id="MoodDisorder2" value="1">
                            <label class="custom-control-label" for="MoodDisorder2">
                                MoodDisorder</label>
                        </div>
                    </li>

                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Substance_Use_Disorder")==1?"checked":""}}
                                name="Substance_Use_Disorder" id="Substance_Use_Disorder2"
                                value="1">
                            <label class="custom-control-label"
                                for="Substance_Use_Disorder2"> Substance
                                Disorder(Addiction) </label>
                        </div>
                    </li>  --}}



                </ul>
            </div>
        </div>


        <div class="col-lg-6  mb-2 mt-2">
            <div class="form-group">

                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Hematology&amp;Oncology
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Anemia")==1?"checked":""}} name="Anemia"
                                id="Anemia2" value="1">
                            <label class="custom-control-label" for="Anemia2">
                                Anemia</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Thalassemia")==1?"checked":""}}
                                name="Thalassemia" id="Thalassemia2" value="1">
                            <label class="custom-control-label" for="Thalassemia2">
                                Thalassemia</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Malignancy")==1?"checked":""}} name="Malignancy"
                                id="Malignancy2" value="1">
                            <label class="custom-control-label" for="Malignancy2">
                                Malignancy</label>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
        <div class="col-lg-4  mb-2 mt-2">
            <div class="form-group">
                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Gastroenterology
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Hepatits")==1?"checked":""}} name="Hepatits"
                                id="Hepatits2" value="1">
                            <label class="custom-control-label" for="Hepatits2">
                                Hepatits</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("IBS")==1?"checked":""}} name="IBS" id="IBS2"
                                value="1">
                            <label class="custom-control-label" for="IBS2"> IBS</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("IBD")==1?"checked":""}} name="IBD" id="IBD2"
                                value="1">
                            <label class="custom-control-label" for="IBD2"> IBD</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4  mb-2 mt-2">
            <div class="form-group">
                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Musculoskeletal
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("PhysicalDisability")==1?"checked":""}}
                                name="PhysicalDisability" id="PhysicalDisability2"
                                value="1">
                            <label class="custom-control-label" for="PhysicalDisability2">
                                PhysicalDisability</label>
                        </div>
                    </li>


                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Amputation")==1?"checked":""}} name="Amputation"
                                id="Amputation2" value="1">
                            <label class="custom-control-label" for="Amputation2">
                                Amputation</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <div class="col-lg-4  mb-2 mt-2">
            <div class="form-group">

                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Infectious
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("TB")==1?"checked":""}} name="TB" id="TB2"
                                value="1">
                            <label class="custom-control-label" for="TB2"> TB</label>
                        </div>
                    </li>



                </ul>
            </div>
        </div>
        <div class="col-lg-4  mb-2 mt-2">
            <div class="form-group">

                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            pulmonary
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("COPD")==1?"checked":""}} name="COPD" id="COPD2"
                                value="1">
                            <label class="custom-control-label" for="COPD2"> COPD</label>
                        </div>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("Asthma")==1?"checked":""}} name="Asthma"
                                id="Asthma2" value="1">
                            <label class="custom-control-label" for="Asthma2">
                                Amputation</label>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
        <div class="col-lg-4  mb-2 mt-2">
            <div class="form-group">

                <ul class="custom-control-group border border-info rounded-3">
                    <li>
                        <h6 class="text text-dark">
                            Other
                        </h6>
                    </li>
                    <li>
                        <div class="custom-control custom-checkbox custom-switch">
                            <input type="checkbox" class="custom-control-input form_action"
                                {{request("SurgeryBackground")==1?"checked":""}}
                                name="SurgeryBackground" id="SurgeryBackground2" value="1">
                            <label class="custom-control-label" for="SurgeryBackground2">
                                SurgeryBackground</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-lg-9 mb-2 mt-2">
            <ul class="custom-control-group border border-info rounded-3">
                <li>
                    <h6>
                        Other Info
                    </h6>
                </li>
                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action  {{request("Blind")==1?"checked":""}} "  name="Blind"
                            id="Blind2" value="1">
                        <label class="custom-control-label" for="Blind2"> نابینا</label>
                    </div>
                </li>


                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action  {{request("Cane")==1?"checked":""}} " name="Cane"
                            id="Cane2" value="1">
                        <label class="custom-control-label" for="Cane2"> حرکت با عصا</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                              {{request("ability_work")==1?"checked":""}} name="ability_work" id="ability_work2" value="1">
                        <label class="custom-control-label" for="ability_work2">

                            توانایی انجام فعالیت های خود را دارد
                        </label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                              {{request("HearingAids")==1?"checked":""}} name="HearingAids" id="HearingAids2" value="1">
                        <label class="custom-control-label" for="HearingAids2">
                            سمعک</label>
                    </div>
                </li>

                <li>
                    <div class="custom-control custom-checkbox custom-switch">
                        <input type="checkbox" class="custom-control-input form_action"
                              {{request("WheelChair")==1?"checked":""}} name="WheelChair" id="WheelChair2" value="1">
                        <label class="custom-control-label" for="WheelChair2">
                            ویلچر</label>
                    </div>
                </li>
            </ul>
        </div>

        <div class="col-lg-4 mb-2 mt-2">

            <ul class="custom-control-group border border-warning rounded-3">
                <li>
                    <h6 class="text">
                        HighRisk
                    </h6>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch">
                        <input type="radio" class="custom-control-input form_action"  {{request("HighRisk")=="Yes"?"checked":""}}  name="HighRisk"
                            id="HighRisk1" value="Yes">
                        <label class="custom-control-label Yes" for="HighRisk1">
                            Yes</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch checked">
                        <input type="radio" class="custom-control-input form_action"  {{request("HighRisk")=="No"?"checked":""}}  name="HighRisk"
                            id="HighRisk2" value="No">
                        <label class="custom-control-label No" for="HighRisk2">
                            No</label>
                    </div>
                </li>
            </ul>
        </div>
        <div class="col-lg-6 mb-2 mt-2">
            <ul class="custom-control-group border border-warning rounded-3">
                <li>
                    <h6>
                        Diet Food

                    </h6>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch">
                        <input type="radio" class="custom-control-input form_action" name="Ordinary"  {{request("Ordinary")=="Ordinary"?"checked":""}}  id="Ordinary" value="Ordinary">
                        <label class="custom-control-label Ordinary" for="Ordinary">
                            معمولی</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch ">
                        <input type="checkbox" class="custom-control-input form_action" name="Low_in_salt"  {{request("Low_in_salt")=="Low_in_salt"?"checked":""}}  id="Low_in_salt" value="Low_in_salt">
                        <label class="custom-control-label Low_in_salt" for="Low_in_salt">
                            کم نمک</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch">
                        <input type="checkbox" class="custom-control-input form_action" name="Lowfat"  {{request("Lowfat")=="Lowfat"?"checked":""}}  id="Lowfat" value="Lowfat">
                        <label class="custom-control-label Lowfat" for="Lowfat">
                            کم چرب</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch">
                        <input type="checkbox" class="custom-control-input form_action" name="Whitemeat"  {{request("checkbox")=="Whitemeat"?"checked":""}}  id="Whitemeat" value="Whitemeat">
                        <label class="custom-control-label No" for="Whitemeat">

                            گوشت سفید</label>
                    </div>
                </li>
                <li>
                    <div class="custom-control custom-control-sm custom-switch">
                        <input type="checkbox" class="custom-control-input form_action" name="diabet"  {{request("checkbox")=="diabet"?"checked":""}}  id="diabet" value="diabet">
                        <label class="custom-control-label No" for="diabet">

                            دیابت</label>
                    </div>
                </li>
            </ul>
        </div>
    </div>

</div>
