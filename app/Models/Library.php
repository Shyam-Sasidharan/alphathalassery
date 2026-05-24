<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Library extends Model
{
    protected $fillable = [
        'name',
        'content',
        'slug'
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
     public function setSlugAttribute($value){
        $slug = Str::slug($this->attributes['name'] ?? $value);
        $category = $this->newQuery()->where('slug','LIKE', "$slug%")->get();
        if (!$category->isEmpty()) {
            $slug .= '-'.count($category);
        }
        $this->attributes['slug'] = $slug;
    }

    public function items()
    {
        return $this->hasMany(Book::class, 'library_id');
    }
}
