<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageBanner extends Model
{
    protected $fillable = [
        'page_key',
        'title',
        'description',
        'image',
    ];

    public function scopeSearch($query)
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('page_key', 'like', '%' . request('search') . '%');
        }

        return $query;
    }
}
