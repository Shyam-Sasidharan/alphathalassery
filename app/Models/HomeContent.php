<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = [
        'section_key',
        'title',
        'description',
    ];

    public function scopeSearch($query)
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('section_key', 'like', '%' . request('search') . '%');
        }

        return $query;
    }
}
