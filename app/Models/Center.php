<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'college',
        'location',
        'center',
        'address',
       	'coordinator',
       	'phone',
        'image'
    ];


    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearch($query)
    {
        return $query->where(function ($q) {
            if (request()->input('search')){
                $q = $q->where('location', 'LIKE', "%" . request()->input('search') . "%");
            }
            return $q;
        });
    }

}
