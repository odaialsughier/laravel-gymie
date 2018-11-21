<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    //
    protected $fillable = ['name_en', 'name_ar', 'phone', 'status'  , 'deleted', 'deletion_date', 'deleted_by'];
}
