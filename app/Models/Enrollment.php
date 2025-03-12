<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    public function courses()
    {
        return $this->belongsTo(Course::class);
    }

    public function students()
    {
        return $this->belongsTo(Student::class);
    }
}
