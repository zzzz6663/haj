<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    use Sortable;
    //
    protected $fillable=[
        'BuildName',
        'Address',
        'GroupNo',
    ];
}
