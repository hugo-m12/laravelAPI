<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function students(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
