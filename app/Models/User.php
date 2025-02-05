<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use NumberFormatter;
use Illuminate\Support\Str;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Support\Facades\Crypt;
use function PHPUnit\Framework\isNull;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasRoles, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'ids',
        'name',
        'email',
        'password',
        'family',
        'role',
        'username',
        'expert',
        'active',
        'province_id',
        'city_id',
        'gender',
        'avatar',
        "KarevanID",
        "PassengerCode",
        "PassengerTypeID",
        "name",
        "family",
        "fathername",
        "OldFamily",
        "MarriageStatus",
        "idno",
        "BirthDate",
        "birthplace",
        "JobID",
        "JobTitle",
        "EducationID",
        "Religion",
        "HajCount",
        "HajTypeID",
        "RelationID",
        "Sex",
        "telcode",
        "tel",
        "cell",
        "Address",
        "JobTel",
        "JobAddress",
        "PostalCode",
        "RelatedPassengerCode",
        "UserID",
        "PassengerStepID",
        "ssn",
        "MarjaaID",
        "serialno",
        "email",
        "Nationality",
        "EsarID",
        "Description",
        "InsertDateTime",
        "persiandate",
        "Disease",
        "BirthDate_ENG",
        "BirthPlace_ENG",
        "Family_ENG",
        "FatherName_ENG",
        "ExpDate",
        "Name_ENG",
        "IssueDate",
        "PassNo",
        "EducationTitle",
        "VisaNo",
        "NezamCode",
        "mobile",
        "status",
        "commission_reason",
        "commission_id",
        "commission_reslut",//قایل نتیجه کم$سیون
        "commission_in",//رفتن به کیمسیون
        "commission_status",//ر نظر کمیسون
        "reset_reason",//ر   دلیل تغییر وضعیت 
    ];
    public $sortable = [
        'name',
        'family',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }




    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Crypt::encryptString($value);
    }

    // رمزگشایی خودکار هنگام بازیابی
    public function getPasswordAttribute($value)
    {
        return Crypt::decryptString($value);
    }
    public function pasenger_Count()
    {
        $karevans = $this->karevans;
        if ($karevans->isEmpty()) {
            return 0; // اگر هیچ کاروانی وجود ندارد، تعداد مریض‌ها صفر است
        }
        return $karevans->flatMap(function ($karevans) {
            return $karevans->users;
        })->count();
        $karevans = $this->karevans()->with('users')->get();

        if ($karevans->isEmpty()) {
            return 0; // اگر هیچ کاروانی وجود نداشت، تعداد مریض‌ها صفر است
        }
    }
    public function attrs()
    {
        return  $this->hasMany(Attr::class);;
    }
    public function logs(){
        return $this->hasMany(Log::class);
    }
    public function sms($mobile,$text)
    {
        $sms_client = new \SoapClient('http://api.payamak-panel.com/post/send.asmx?wsdl', array('encoding'=>'UTF-8'));

$parameters['username'] = "hmc";
$parameters['password'] = "hmc@IT1400";
$parameters['to'] = $mobile;
$parameters['from'] = "10007778";
$parameters['text'] =$text;
$parameters['isflash'] =false;

return $sms_client->SendSimpleSMS2($parameters)->SendSimpleSMS2Result;
    }


    public function histories()
    {
        return  $this->hasMany(History::class);;
    }
    public function testimages()
    {
        return  $this->hasMany(TestImage::class);;
    }

    public function karevans()
    {
        return  $this->hasMany(Karevan::class,"doctor_id");;
    }
    public function Karevan()
    {
        // return  Karevan::where('KarevanNo', $this->karevanID)->first();
    //   return    $this->belongsTo(Karevan::class,"KarevanID","KarevanNo");;
      return    $this->belongsTo(Karevan::class,"KarevanID","IDS");;
    //     return  $this->belongsTo(Karevan::class,"KarevanNo","karevanID");;
    }
    public function provinces()
    {
        return  $this->belongsToMany(Province::class);;
    }

    public function province()
    {
        return  $this->belongsTo(Province::class);;
    }


    public function commission()
    {
        return  $this->belongsTo(Commission::class);;
    }

    public function drugs()
    {
        return $this->belongsToMany(Drug::class)->withPivot(['year', "dose", "count", "info"]);
    }

    public function BirthDate()
    {
        if ($this->BirthDate) {
            return   Jdate()->getYear() - substr($this->BirthDate, 0, 4);
        }
    }
    public function avatar()
    {
        if ($this->avatar) {
            return asset("/media/users/avatar/" . $this->avatar);
        }
        return false;
    }
    public function commission_reslut()
    {
        if ($this->commission_reslut) {
            return asset("/media/commission_reslut/" . $this->commission_reslut);
        }
        return false;
    }

    public function check_file_ex($fileName)
{
    // دریافت پسوند فایل
    $extension = Str::lower(pathinfo($fileName, PATHINFO_EXTENSION));

    // بررسی نوع فایل از روی پسوند
    if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp'])) {
        return 'image';
    }

    if ($extension === 'pdf') {
        return 'pdf';
    }

    return 'unknown';
}
    public function attr_attach($name)
    {
            return asset("/media/passenger/attach/" . $name);
    }
    public function save_or_update($name, $val,$type="attr")
    {
        $atr = $this->attrs()->whereName($name)->first();
        if ($atr) {
                $atr->update([
                    "value" => $val,
                    "type"=>$type
                ]);
        } else {
            $this->attrs()->create(
                [
                    "name" => $name,
                    "value" => $val,
                    "type"=>$type
                ]
            );
        }
    }
    public function status_color()
    {
        $color = "";
        switch ($this->status) {
            case "rejected":
                $color = "danger";
                break;
            case "under_review":
                $color = "warning";
                break;
            case "approved":
                $color = "success";
                break;
            case "medical_commission":
                $color = "secondary";
                break;
        }
        return $color;
    }



    public function Sex()
    {
        return$this->Sex==1?"مرد ":"زن";

    }

    public function MarriageStatus()
    {
        return$this->MarriageStatus==1?"مجرد ":"متاهل";

    }

    public function convert_date3($from, $sep = '/')
    {
        if($from){
            $date = explode($sep, $from);

            return  $date[0].$date[1].$date[2];
        }
        return null;

    }


















}
