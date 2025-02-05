<div class="col-lg-12 mb-2">
    <h5>
        Physical Examination

    </h5>
    <div class="row mb-1">
        <div class="col-lg-4">
            <span class="title">
                Blood Presure Sys:
            </span>
            <span class="content">
                {{$Blood_Presure_Sys}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Blood Presure(Dis)
            </span>
            <span class="content">
                {{$Blood_Presure_Dis}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Height(CM):
            </span>
            <span class="content">
                {{$Height}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Weight(Kg):
            </span>
            <span class="content">
                {{$Weight}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                bmi:
            </span>
            <span class="content">
                {{$bmi}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Pulse Rate:
            </span>
            <span class="content">
                {{$PulseRate}}
            </span>
        </div>
    </div>
</div>


<div class="col-lg-12 mb-2">
    <h5>
        Paraclinical Test

    </h5>
    <div class="row mb-1">
        <div class="col-lg-4">
            <span class="title">
                Hb:
            </span>
            <span class="content">
                {{$Hb}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Bun:
            </span>
            <span class="content">
                {{$bun}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                FBS:
            </span>
            <span class="content">
                {{$FBS}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                PLT:
            </span>
            <span class="content">
                {{$PLT}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Cr:
            </span>
            <span class="content">
                {{$Cr}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                HbA1C:
            </span>
            <span class="content">
                {{$HbA1C}}
            </span>
        </div>

        <div class="col-lg-4">
            <span class="title">
                MMSE:
            </span>
            <span class="content">
                {{$MMSE}}
            </span>
        </div>
    </div>
</div>


<div class="col-lg-12 mb-2">
    <h5>
        Paracinical Test - Continue
    </h5>
    <div class="row mb-1">
        <div class="col-lg-4">
            <span class="title">
                EKG:
            </span>
            <span class="content">
                {{$EKG}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Opium Test:
            </span>
            <span class="content">
                {{$Opium_Test}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                CXR:
            </span>
            <span class="content">
                {{$CXR}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                HBS-Ag:
            </span>
            <span class="content">
                {{$HBS_Ag}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Second Opium Test:
            </span>
            <span class="content">
                {{$SecondOpiumTest}}
            </span>
        </div>
        <div class="col-lg-4">
            <span class="title">
                Occult Blood:
            </span>
            <span class="content">
                {{$Occult_Blood}}
            </span>
        </div>
    </div>
</div>

<div class="col-lg-12 mb-2">
    <h5>
        بیماری ها
    </h5>
    <div class="row mb-1">
       @isset($CHF )
       @if($CHF)
        <div class="col-lg-3" >
            <span class="title">
                CHF:
            </span>
        </div>
        @endif
       @endisset

       @isset($IHD )
       @if($IHD)

       <div class="col-lg-3" >
           <span class="title">
               IHD:
           </span>
       </div>
       @endif
      @endisset

      @isset($HTN2 )
      @if($HTN2)

      <div class="col-lg-3" >
          <span class="title">
              HTN2:
          </span>
      </div>
      @endif
     @endisset

     @isset($MI )
     @if($MI)

     <div class="col-lg-3" >
         <span class="title">
             MI:
         </span>
     </div>
     @endif
    @endisset



    @isset($Arrhythmia )
    @if($Arrhythmia)

    <div class="col-lg-3" >
        <span class="title">
            Arrhythmia:
        </span>
    </div>
    @endif
   @endisset
   @isset($DVT )
   @if($DVT)

   <div class="col-lg-3" >
       <span class="title">
           DVT:
       </span>
   </div>
   @endif
  @endisset


    @isset($CABG )
    @if($CABG)

    <div class="col-lg-3" >
        <span class="title">
            CABG:
        </span>
    </div>
    @endif
   @endisset
   @isset($Cardiac_arrhythmia )
   @if($Cardiac_arrhythmia)

   <div class="col-lg-3" >
       <span class="title">
           Cardiac_arrhythmia:
       </span>
   </div>
   @endif
  @endisset


    @isset($Angioplasty )
    @if($Angioplasty)

    <div class="col-lg-3" >
        <span class="title">
            Angioplasty:
        </span>
    </div>
    @endif
   @endisset
   @isset($Psoriasis )
   @if($Psoriasis)

   <div class="col-lg-3" >
       <span class="title">
           Psoriasis:
       </span>
   </div>
   @endif
  @endisset


    @isset($Mycoses )
    @if($Mycoses)

    <div class="col-lg-3" >
        <span class="title">
            Mycoses:
        </span>
    </div>
    @endif
   @endisset
   @isset($skin_fungus )
   @if($skin_fungus)

   <div class="col-lg-3" >
       <span class="title">
           skin_fungus:
       </span>
   </div>
   @endif
  @endisset


    @isset($Acne )
    @if($Acne)

    <div class="col-lg-3" >
        <span class="title">
            Acne:
        </span>
    </div>
    @endif
   @endisset
   @isset($Shingles )
   @if($Shingles)

   <div class="col-lg-3" >
       <span class="title">
           Shingles:
       </span>
   </div>
   @endif
  @endisset


    @isset($Graves)
    @if($Graves)
    )
    <div class="col-lg-3" >
        <span class="title">
            Graves :
        </span>
    </div>
    @endif
   @endisset
   @isset($rheumatoid_arthritis )
   @if($rheumatoid_arthritis)

   <div class="col-lg-3" >
       <span class="title">
           rheumatoid_arthritis:
       </span>
   </div>
   @endif
  @endisset


    @isset($Celiac )
    @if($Celiac)

    <div class="col-lg-3" >
        <span class="title">
            Celiac:
        </span>
    </div>
    @endif
   @endisset
   @isset($Hashimoto_thyroiditis )
   @if($Hashimoto_thyroiditis)

   <div class="col-lg-3" >
       <span class="title">
           Hashimoto_thyroiditis:
       </span>
   </div>
   @endif
  @endisset


    @isset($MultipleSclerosis )
    @if($MultipleSclerosis)

    <div class="col-lg-3" >
        <span class="title">
            MultipleSclerosis:
        </span>
    </div>
    @endif
   @endisset
   @isset($CVA )
   @if($CVA)

   <div class="col-lg-3" >
       <span class="title">
           CVA:
       </span>
   </div>
   @endif
  @endisset


    @isset($TIA )
    @if($TIA)

    <div class="col-lg-3" >
        <span class="title">
            TIA:
        </span>
    </div>
    @endif
   @endisset
   @isset($Epilepsy )
   @if($Epilepsy)

   <div class="col-lg-3" >
       <span class="title">
           Epilepsy:
       </span>
   </div>
   @endif
  @endisset


    @isset($Alzheimer )
    @if($Alzheimer)

    <div class="col-lg-3" >
        <span class="title">
            Alzheimer:
        </span>
    </div>
    @endif
   @endisset
   @isset($DM )
   @if($DM)

   <div class="col-lg-3" >
       <span class="title">
           DM:
       </span>
   </div>
   @endif
  @endisset


    @isset($HyperThyroidism )
    @if($HyperThyroidism)

    <div class="col-lg-3" >
        <span class="title">
            HyperThyroidism:
        </span>
    </div>
    @endif
   @endisset
   @isset($HypoThyroidism )
   @if($HypoThyroidism)

   <div class="col-lg-3" >
       <span class="title">
           HypoThyroidism:
       </span>
   </div>
   @endif
  @endisset


    @isset($Hyperlipidemia )
    @if($Hyperlipidemia)

    <div class="col-lg-3" >
        <span class="title">
            Hyperlipidemia:
        </span>
    </div>
    @endif
   @endisset
   @isset($TB )
   @if($TB)

   <div class="col-lg-3" >
       <span class="title">
           TB:
       </span>
   </div>
   @endif
  @endisset


    @isset($PTSD )
    @if($PTSD)

    <div class="col-lg-3" >
        <span class="title">
            PTSD:
        </span>
    </div>
    @endif
   @endisset
   @isset($PersonalityDisorder )
   @if($PersonalityDisorder)

   <div class="col-lg-3" >
       <span class="title">
           PersonalityDisorder:
       </span>
   </div>
   @endif
  @endisset


    @isset($MoodDisorder )
    @if($MoodDisorder)

    <div class="col-lg-3" >
        <span class="title">
            MoodDisorder:
        </span>
    </div>
    @endif
   @endisset
   @isset($Substance_Use_Disorder )
   @if($Substance_Use_Disorder)

   <div class="col-lg-3" >
       <span class="title">
           Substance_Use_Disorder:
       </span>
   </div>
   @endif
  @endisset


    @isset($Depresseion )
    @if($Depresseion)

    <div class="col-lg-3" >
        <span class="title">
            Depresseion:
        </span>
    </div>
    @endif
   @endisset
   @isset($Mania )
   @if($Mania)

   <div class="col-lg-3" >
       <span class="title">
           Mania:
       </span>
   </div>
   @endif
  @endisset


    @isset($Dementia )
    @if($Dementia)

    <div class="col-lg-3" >
        <span class="title">
            Dementia:
        </span>
    </div>
    @endif
   @endisset
   @isset($OCD )
   @if($OCD)

   <div class="col-lg-3" >
       <span class="title">
           OCD:
       </span>
   </div>
   @endif
  @endisset


    @isset($SleepDisorder )
    @if($SleepDisorder)

    <div class="col-lg-3" >
        <span class="title">
            SleepDisorder:
        </span>
    </div>
    @endif
   @endisset
   @isset($Psychosis )
   @if($Psychosis)

   <div class="col-lg-3" >
       <span class="title">
           Psychosis:
       </span>
   </div>
   @endif
  @endisset
   @isset($Hematology_Oncology )
   @if($Hematology_Oncology)

   <div class="col-lg-3" >
       <span class="title">
           Hematology_Oncology:
       </span>
   </div>
   @endif
  @endisset
   @isset($Anemia )
   @if($Anemia)

   <div class="col-lg-3" >
       <span class="title">
           Anemia:
       </span>
   </div>
   @endif
  @endisset
   @isset($Thalassemia )
   @if($Thalassemia)

   <div class="col-lg-3" >
       <span class="title">
           Thalassemia:
       </span>
   </div>
   @endif
  @endisset
   @isset($Malignancy )
   @if($Malignancy)

   <div class="col-lg-3" >
       <span class="title">
           Malignancy:
       </span>
   </div>
   @endif
  @endisset
   @isset($Hepatits )
   @if($Hepatits)

   <div class="col-lg-3" >
       <span class="title">
           Hepatits:
       </span>
   </div>
   @endif
  @endisset
   @isset($IBS )
   @if($IBS)

   <div class="col-lg-3" >
       <span class="title">
           IBS:
       </span>
   </div>
   @endif
  @endisset
   @isset($IBD )
   @if($IBD)

   <div class="col-lg-3" >
       <span class="title">
           IBD:
       </span>
   </div>
   @endif
  @endisset
   @isset($PhysicalDisability )
   @if($PhysicalDisability)

   <div class="col-lg-3" >
       <span class="title">
           PhysicalDisability:
       </span>
   </div>
   @endif
  @endisset
   @isset($COPD )
   @if($COPD)

   <div class="col-lg-3" >
       <span class="title">
           COPD:
       </span>
   </div>
   @endif
  @endisset
   @isset($Asthma )
   @if($Asthma)

   <div class="col-lg-3" >
       <span class="title">
           Asthma:
       </span>
   </div>
   @endif
  @endisset
   @isset($SurgeryBackground )
   @if($SurgeryBackground)

   <div class="col-lg-3" >
       <span class="title">
           SurgeryBackground:
       </span>
   </div>
   @endif
  @endisset
   @isset($DIALYSIS )
   @if($DIALYSIS)

   <div class="col-lg-3" >
       <span class="title">
           DIALYSIS:
       </span>
   </div>
   @endif
  @endisset
   @isset($HBSAntiGen )
   @if($HBSAntiGen)

   <div class="col-lg-3" >
       <span class="title">
           HBSAntiGen:
       </span>
   </div>
   @endif
  @endisset
   @isset($HBSAntiBodies )
   @if($HBSAntiBodies)

   <div class="col-lg-3" >
       <span class="title">
           HBSAntiBodies:
       </span>
   </div>
   @endif
  @endisset
   @isset($HIV1_2 )
   @if($HIV1_2)

   <div class="col-lg-3" >
       <span class="title">
           HIV1_2:
       </span>
   </div>
   @endif
  @endisset
   @isset($HCV )
   @if($HCV)

   <div class="col-lg-3" >
       <span class="title">
           HCV:
       </span>
   </div>
   @endif
  @endisset
   @isset($WeeklyNumberOfDialysis )
   @if($WeeklyNumberOfDialysis)

   <div class="col-lg-3" >
       <span class="title">
           WeeklyNumberOfDialysis:
       </span>
   </div>
   @endif
  @endisset
   @isset($CRF )
   @if($CRF)

   <div class="col-lg-3" >
       <span class="title">
           CRF:
       </span>
   </div>
   @endif
  @endisset
    </div>
</div>



<div class="col-lg-12 mb-2">
    <h5>
        سایر
    </h5>
    <div class="row">
        @isset($Blind )
        @if($Blind)
         <div class="col-lg-3" >
             <span class="title">
                نابینا:
             </span>
         </div>
         @endif
        @endisset

        @isset($Cane )
        @if($Cane)
         <div class="col-lg-3" >
             <span class="title">
                حرکت با عصا:
             </span>
         </div>
         @endif
        @endisset

        @isset($HearingAids )
        @if($HearingAids)
         <div class="col-lg-3" >
             <span class="title">
                سمعک:
             </span>
         </div>
         @endif
        @endisset


        @isset($WheelChair )
        @if($WheelChair)
         <div class="col-lg-3" >
             <span class="title">
                ویلچر:
             </span>
         </div>
         @endif
        @endisset


        @isset($Chorus )
        @if($Chorus)
         <div class="col-lg-3" >
             <span class="title">
                کر:
             </span>
         </div>
         @endif
        @endisset


        @isset($Dumb )
        @if($Dumb)
         <div class="col-lg-3" >
             <span class="title">
                لال:
             </span>
         </div>
         @endif
        @endisset

        @isset($Denture )
        @if($Denture)
         <div class="col-lg-3" >
             <span class="title">
                دارای دندان مصنوعی:
             </span>
         </div>
         @endif
        @endisset

        @isset($Glasses )
        @if($Glasses)
         <div class="col-lg-3" >
             <span class="title">
                دارای عینک:
             </span>
         </div>
         @endif
        @endisset

        @isset($Glasses )
        @if($Glasses)
         <div class="col-lg-6" >
             <span class="title">

                توانایی انجام فعالیت های خود را ندارد:
             </span>
         </div>
         @endif
        @endisset


    </div>
</div>



<div class="col-lg-12 mb-2" >
    <h5>
        اطلاعات دارویی
     </h5>
   @include("admin.passenger.drug_list")

</div>
