<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'pdf',
        'library_id',
        'title',
        'author',
        'image'
    ];

    protected $appends = ['photo'];

    /**
     * @return string
     */
    public function getPhotoAttribute() : string
    {
        if ($this->image && file_exists(public_path($this->image))) {
            return asset($this->image);
        }
        return 'https://images.unsplash.com/photo-1543002588-bfa74002ed7e?auto=format&fit=crop&q=80&w=400';
    }


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
            if (request()->input('library_id')) {
            	$q = $q->where('library_id', '=', request()->get('library_id'));
            }
            return $q;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function library()
    {
        return $this->belongsTo(Library::class);
    }
}
