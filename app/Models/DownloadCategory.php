<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DownloadCategory extends Model
{
    protected $fillable = [
        'name'
    ];


    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearch($query)
    {
        return $query->where(function ($q) {
            if (request()->has('search')){
                return $q->where('name', 'LIKE', "%" . request()->input('search') . "%");
            }
            return $q;
        });
    }
    

    public function items()
    {
        return $this->hasMany(Download::class, 'download_category_id');
    }
}
