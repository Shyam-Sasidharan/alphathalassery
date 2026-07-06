<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryFolder extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $appends = ['cover_photo'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'gallery_folder_id');
    }

    public function getCoverPhotoAttribute()
    {
        $gallery = $this->galleries()->latest()->first();

        return $gallery ? $gallery->photo : asset('front/images/gallery-placeholder.svg');
    }

    public function scopeSearch($query)
    {
        return $query->where(function ($q) {
            if (request()->has('search')) {
                return $q->where('name', 'LIKE', '%' . request()->input('search') . '%');
            }

            return $q;
        });
    }
}
