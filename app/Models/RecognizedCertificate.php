<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecognizedCertificate extends Model
{
    protected $fillable = [
        'title',
        'description',
        'certificate',
        'status',
    ];

    public function scopeSearch($query)
    {
        if (request('search')) {
            $query->where('title', 'like', '%' . request('search') . '%');
        }

        return $query;
    }
}
