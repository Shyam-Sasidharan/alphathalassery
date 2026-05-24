<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $fillable = [
        'question',
        'answer'
    ];


    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearch($query)
    {
        return $query->where(function ($q) {
            if (request()->input('search')){
                $q = $q->where('title', 'LIKE', "%" . request()->input('search') . "%");
            }
            return $q;
        });
    }

}
