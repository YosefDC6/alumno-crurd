<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Career extends Model
{
    protected $fillable = ['nombre'];

    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}

