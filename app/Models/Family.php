<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }
}
