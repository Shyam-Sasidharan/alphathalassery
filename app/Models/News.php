<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = [
        'title',
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
            if (request()->input('search')){
                $q = $q->where('title', 'LIKE', "%" . request()->input('search') . "%");
            }
            return $q;
        });
    }

    public function setSlugAttribute($value){
        $slug = Str::slug($this->attributes['title'] ?? $value);
        $news = $this->newQuery()->where('slug','LIKE', "$slug%")->get();
        if (!$news->isEmpty()) {
            $slug .= '-'.count($news);
        }
        $this->attributes['slug'] = $slug;
    }

}
