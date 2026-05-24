<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Publication extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'content',
        'author',
        'price',
        'category_id',
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
            if (request()->has('search')){
                return $q->where('name', 'LIKE', "%" . request()->input('search') . "%");
            }
            return $q;
        });
    }

    public function setSlugAttribute($value){
        $slug = Str::slug($this->attributes['name'] ?? $value);
        $publication = $this->newQuery()->where('slug','LIKE', "$slug%")->get();
        if (!$publication->isEmpty()) {
            $slug .= '-'.count($publication);
        }
        $this->attributes['slug'] = $slug;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
