<?php

namespace App\Exports;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;

class PassengerExport implements FromCollection
{

    public $users;

    public function __construct($users)
    {

        $this->users = $users;
    }



    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $data[] = [
            "کدزائر	",
            "شماره کاروان",
            "	نام ",
            "سن",
            "وضعیت",
        ];



        foreach ($this->users as $user) {


            $data[] = [
                'PassengerCode' => $user->PassengerCode,
                'KarevanID' => $user->KarevanID,
                'name' => $user->name." ".$user->family,
                'BirthDate' => $user->BirthDate(),
                'status' => __("status.". $user->status),

            ];
        }


        return new Collection($data);
    }
}
