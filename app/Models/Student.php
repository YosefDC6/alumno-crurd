<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = ['nombre','correo','career_id','semestre'];

    public function career(): BelongsTo
    {
        return $this->belongsTo(Career::class);
    }
}

