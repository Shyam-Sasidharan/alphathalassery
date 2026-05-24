<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    protected $fillable = [
        'name',
        'content',
        'image'
    ];


    protected $appends = ['photo'];

    public function getPhotoAttribute() : string
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&rounded=true&background=6d9c40&color=fff&size=40';
    }
    
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
    
}
