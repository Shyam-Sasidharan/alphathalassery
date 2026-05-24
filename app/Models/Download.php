<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'title',
        'content',
        'doc',
        'download_category_id'
    ];


    protected $appends = ['photo'];

    /**
     * @return string
     */
    public function getPhotoAttribute() : string
    {
        if ($this->doc && file_exists(public_path($this->doc))) {
            return asset($this->doc);
        }
        return '';
    }


    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearch($query)
    {
        return $query->where(function ($q) {
            if (request()->has('search')){
                return $q->where('title', 'LIKE', "%" . request()->input('search') . "%");
            }
            return $q;
        });
    }

    public function download_category()
    {
        return $this->belongsTo(DownloadCategory::class);
    }
}
