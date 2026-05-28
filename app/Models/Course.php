<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Course extends Model
{
    protected $fillable = [
        'name',
        'home_content',
        'content',
        'duration',
        'mode',
        'type',
        'intake',
        'fee',
        'slug',
        'image',
        'heading',
        'pdf'
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
        return 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&q=80&w=800';
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
        $course = $this->newQuery()->where('slug','LIKE', "$slug%")->get();
        if (!$course->isEmpty()) {
            $slug .= '-'.count($course);
        }
        $this->attributes['slug'] = $slug;
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function projects()
    // {
    //     return $this->hasMany(Project::class);
    // }
    public function semester()
    {
        return $this->hasMany(Semester::class, 'course_id');
    }
}
