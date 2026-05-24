<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'semester',
        'syllabus',
        'course_id'
    ];


    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearch($query)
    {
        return $query->where(function ($q) {
            if (request()->input('search')){
                $q = $q->where('semester', 'LIKE', "%" . request()->input('search') . "%");
            }
            if (request()->input('course_id')) {
            	$q = $q->where('course_id', '=', request()->get('course_id'));
            }
            return $q;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
