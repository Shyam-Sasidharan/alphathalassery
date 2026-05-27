<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    //
    protected $fillable = [
            'college',
            'course',
            'centre',
            'language',
            'name',
            'phone',
            'email',
            'dob',
            'sex',
            'nationality',
            'marital',
            'diocese',
            'parish',
            'qualification',
            'occupation',
            'address',
            'certificate',
            'photo',
            'fee'
    ];

}
