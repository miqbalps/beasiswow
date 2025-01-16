<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'nik',
        'type',
        'status',
        'full_name',
        'last_education',
        'job',
        'position',
        'income',
        'phone',
        'address',
    ];

    public function identity()
    {
        return $this->belongsTo(Identity::class);
    }

    public function families()
    {
        return $this->hasMany(Family::class);
    }
}
